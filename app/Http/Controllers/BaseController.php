<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{

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

        $prop = $property->paginate(1, ['*'], 'page', $page);

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

        $prop = $property->paginate(1, ['*'], 'page', $page);

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

    public function detail($id)
    {
        $now = Carbon::now();

        $property = Property::with(['rooms.facilities', 'facilities', 'rooms.reservations' => function ($query) use ($now) {
            $query->where('check_in', '<=', $now)
                  ->where('check_out', '>=', $now);
        }])->findOrFail($id);
        // dd($property);

        return view('detail', ['property' => $property]);
    }

}
