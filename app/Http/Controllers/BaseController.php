<?php

namespace App\Http\Controllers;

use Midtrans;
use Midtrans\Snap;
use Carbon\Carbon;
use App\Models\Property;
use App\Models\Reservation;


use App\Models\Transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class BaseController extends Controller
{

    public function __construct()
    {
        Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function loadOld($page, Request $request)
    {
        $today = Carbon::today();
        $checkIn = $request->query('check_in') ? Carbon::parse($request->query('check_in')) : $today;
        $checkOut = $request->query('check_out') ? Carbon::parse($request->query('check_out')) : $today;

        $property = Property::whereDoesntHave('rooms.reservations', function ($query) use ($checkIn, $checkOut) {
            $query->whereHas('transaction', function ($transaction) {
                $transaction->where('status', 'success');
            })->where(function ($reservation) use ($checkIn, $checkOut) {
                $reservation->whereBetween('check_in', [$checkIn, $checkOut])
                  ->orWhereBetween('check_out', [$checkIn, $checkOut])
                  ->orWhere(function ($res2) use ($checkIn, $checkOut) {
                      $res2->where('check_in', '<=', $checkIn)
                         ->where('check_out', '>=', $checkOut);
                  });
            });
        });

        if($request->query('country') && $request->query('city') && $request->query('check_in') && $request->query('check_out') ) {
            $property->where('country', 'like', '%' .request('country') . '%')
                ->where('city', 'like', '%' .request('city') . '%');
        }

        $prop = $property->paginate(8, ['*'], 'page', $page);

        $properties = $prop->getCollection()->map(function ($property) use ($checkIn, $checkOut) {
            // hitung unit yang tersedia
            $property->unit_available = $property->rooms->sum('unit');
            // hitung unit di reservasi
            $property->unit_reserve = $property->rooms->sum(function ($room) use ($checkIn, $checkOut) {
                return $room->reservations->filter(function ($reservation) use ($checkIn, $checkOut) {
                    return ($reservation->check_in <= $checkOut && $reservation->check_out >= $checkIn);
                })->count();
            });

            $prices = $property->rooms->pluck('price');
            if($prices->min() !== $prices->max()){
                $property->price_range = [
                    $prices->min(),
                    $prices->max(),
                ];
            } else {
                $property->price_range = [
                    $prices->min()
                ];
            }
            return $property;
        });

        return $properties;
    }



    public function index(Request $request)
    {
        $today = Carbon::today();
        $checkIn = $request->query('check_in') ? Carbon::parse($request->query('check_in')) : $today;
        $checkOut = $request->query('check_out') ? Carbon::parse($request->query('check_out')) : $today;


        $page = $request->page ?? 1;
        $oldData = collect();

        if ($page > 1) {
            for ($i = 1; $i < $page; $i++) {
                $old = $this->loadOld($i, $request);
                $oldData = $oldData->merge($old);
            }
        }

        $property = Property::whereDoesntHave('rooms.reservations', function ($query) use ($checkIn, $checkOut) {
            $query->whereHas('transaction', function ($transaction) {
                $transaction->where('status', 'success');
            })->where(function ($reservation) use ($checkIn, $checkOut) {
                $reservation->whereBetween('check_in', [$checkIn, $checkOut])
                  ->orWhereBetween('check_out', [$checkIn, $checkOut])
                  ->orWhere(function ($res2) use ($checkIn, $checkOut) {
                      $res2->where('check_in', '<=', $checkIn)
                         ->where('check_out', '>=', $checkOut);
                  });
            });
        });

        if($request->query('country') && $request->query('city') && $request->query('check_in') && $request->query('check_out') ) {
            $property->where('country', 'like', '%' .request('country') . '%')
                ->where('city', 'like', '%' .request('city') . '%');
        }

        $prop = $property->paginate(8, ['*'], 'page', $page);

        $properties = $prop->getCollection()->map(function ($property) use ($checkIn, $checkOut) {
            // hitung unit yang tersedia
            $property->unit_available = $property->rooms->sum('unit');
            // hitung unit di reservasi
            $property->unit_reserve = $property->rooms->sum(function ($room) use ($checkIn, $checkOut) {
                return $room->reservations->filter(function ($reservation) use ($checkIn, $checkOut) {
                    return ($reservation->check_in <= $checkOut && $reservation->check_out >= $checkIn);
                })->count();
            });

            $prices = $property->rooms->pluck('price');
            if($prices->min() !== $prices->max()){
                $property->price_range = [
                    $prices->min(),
                    $prices->max(),
                ];
            } else {
                $property->price_range = [
                    $prices->min()
                ];
            }
            return $property;
        });



        $prop->setCollection($properties);

        if($oldData->isNotEmpty()) {
            $prop->setCollection($oldData->merge($prop->getCollection()));
        }


        return view('index', ['properties' => $prop]);
    }


    public function reservation(Request $request){

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $price = $request->room_price;

        $priceHour = $price / 24; // Fixed variable name from $room_price to $price
        $hour = $checkIn->diffInHours($checkOut);
        $amount = $priceHour * $hour;
        $user = Auth::user();

        return DB::transaction(function () use ($request, $amount, $hour, $user, $priceHour, $price) {
            $order_id = 'sandbox-'. uniqid();

            $reservation = Reservation::create([
                'user_id' => $user->id,
                'room_id' => $request->room_id,
                'check_in' => Carbon::parse($request->check_in),
                'check_out' => Carbon::parse($request->check_out),
            ]);

            $payload = [
                'transaction_details' => [
                    'order_id'      => $order_id,
                    'gross_amount'  => $amount,
                ],
                'customer_details' => [
                    'first_name'    => $user->name,
                    'email'         => $user->email,
                    'phone'         => $user->phone,
                ],
                'item_details' => [
                    [
                        'id'       => $request->room_id,
                        'price'    => $priceHour,
                        'quantity' => $hour,
                        'name'     => 'Hour '. $request->room_name. ' '. $request->property_name. ' '. $request->property_country. ','. $request->property_city,
                    ]
                ],
            ];

            $snapToken = Midtrans\Snap::getSnapToken($payload);

            $transaction = Transaction::create([
                'reservation_id' => $reservation->id,
                'status' => 'pending',
                'amount' => $amount,
                'snap_token' => $snapToken,
                'order_id' => $order_id,
            ]);

            return response()->json([
                'snap_token' => $snapToken,
                'order_id' => $order_id,
            ]);
        });
    }

    public function detail($id)
    {
        $now = Carbon::now();

        $property = Property::with(['rooms.facilities', 'facilities', 'rooms.reservations' => function ($query) use ($now) {
            $query->where('check_in', '<=', $now)
                  ->where('check_out', '>=', $now);
        }])->findOrFail($id);


        return view('detail', ['property' => $property]);
    }

    public function updateStatusPayment(Request $request)
    {
        $update = Transaction::where('order_id', $request->order_id)
            ->update([
                'status' => match ($request->transaction_status) {
                    'success' => 'success',
                    'pending' => 'pending',
                    'error' => 'failed',
                    default => 'expired',
                },
            ]);

            if ($update) {
                return response()->json(['message' => 'Status updated successfully']);
        }
        return response()->json(['message' => 'Transaction not found'], 404);

    }


}
