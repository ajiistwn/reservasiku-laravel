<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    //
    public function index()
    {
        $result = Property::with('rooms')->get();
        $today = Carbon::today(); // tanggal sekarang
        $properties = Property::with('rooms')->get();

        $result = [];

        foreach ($properties as $property) {
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
                if ($countRoom < 0) {
                    $countRoom = 0;
                }
                $unitRoom[] = $countRoom;
                $rangePrice[] = $price;
            }
            // array_sort

            if(count($rangePrice) > 1){
                $max = max($rangePrice);
                $min = min($rangePrice);
                $property->priceRange = ['min' => $min, 'max' => $max];
            }
            $property->priceRange = $rangePrice;

            $roomAvailable = array_sum($unitRoom);
            if ($roomAvailable < 0) {
                $roomAvailable = 0;
            }
            $property->roomAvailable = $roomAvailable;
            $result[] = $property;
        }
        // dd($result);


        return view('index', ['properties' => $result]);
    }
}
