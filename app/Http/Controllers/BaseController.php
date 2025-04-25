<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{

        // public function index(Request $request){
        //     $properties = Property::with('rooms')->paginate(8);

        //     if (request()->ajax()) {
        //         $view = view('data', compact('properties'))->render();
        //         return response()->json(['html' => $view]);
        //     }


        //     return view('index', compact('properties'));
        // }

        // public function loadMore(Request $request){
        //     $page = $request->page ?? 1;
        //     $properties = Property::with('rooms')->paginate(8, ['*'], 'page', $page);

        //     return view('data', ['properties' => $properties]);
        // }



    public function index(Request $request)
    {
        $today = Carbon::today();
        $paginator = Property::with('rooms')->paginate(8);

        $properties = $paginator->getCollection();

        // Manipulasi data
        $mapped = $properties->map(function ($property) use ($today) {
            $unitRoom = [];
            $rangePrice = [];

            foreach ($property->rooms->sortBy('price') as $room) {
                $price = $room->price;

                $activeReservations = DB::table('reservations')
                    ->where('room_id', $room->id)
                    ->whereDate('check_in', '<=', $today)
                    ->whereDate('check_out', '>', $today)
                    ->count();

                $countRoom = $room->unit - $activeReservations;
                $unitRoom[] = max($countRoom, 0);
                $rangePrice[] = $price;
            }

            $property->priceRange = count($rangePrice) > 1
                ? [ min($rangePrice), max($rangePrice)]
                : $rangePrice;

            $property->roomAvailable = array_sum($unitRoom);

            return $property;
        });

        // Buat paginator baru dengan collection yang sudah dimodifikasi
        $modifiedPaginator = new LengthAwarePaginator(
            $mapped,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
            ['path' => url()->current()]
        );

        return view('index', ['properties' => $modifiedPaginator]);
    }

    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->page ?? 1;

            $paginator = Property::with('rooms')->paginate(8, ['*'], 'page', $page);

            $properties = $paginator->getCollection();

            // Manipulasi data
            $today = Carbon::today();
            $mapped = $properties->map(function ($property) use ($today) {
                $unitRoom = [];
                $rangePrice = [];

                foreach ($property->rooms->sortBy('price') as $room) {
                    $price = $room->price;

                    $activeReservations = DB::table('reservations')
                        ->where('room_id', $room->id)
                        ->whereDate('check_in', '<=', $today)
                        ->whereDate('check_out', '>', $today)
                        ->count();

                    $countRoom = $room->unit - $activeReservations;
                    $unitRoom[] = max($countRoom, 0);
                    $rangePrice[] = $price;
                }

                $property->priceRange = count($rangePrice) > 1
                    ? [min($rangePrice), max($rangePrice)]
                    : $rangePrice;

                $property->roomAvailable = array_sum($unitRoom);

                return $property;
            });

            // Ganti collection dalam paginator dengan hasil yang dimodifikasi
            $modifiedPaginator = new LengthAwarePaginator(
                $mapped,
                $paginator->total(),
                $paginator->perPage(),
                $paginator->currentPage(),
                ['path' => url()->current()]
            );

            return view('data', ['properties' => $modifiedPaginator])->render();
        }
        // dd('not ajax');
    }

    public function detail($id)
    {
        $property = Property::with('rooms')->findOrFail($id);
        return view('detail', ['property' => $property]);
    }

}
