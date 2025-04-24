<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
// use Illuminate\Container\Attributes\Auth;

class StatsProperties extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array

    {

        $now = Carbon::now();
        $user = Auth::user();

        if ($user->role === 'admin') {
            $propertiesCount = Property::count();
            $roomCount = Room::count();
            $availableRooms = Room::whereDoesntHave('reservations', function ($query) use ($now) {
                $query->where('check_in', '<=', $now)
                      ->where('check_out', '>=', $now);
            })->count();

        } else {
            $propertiesCount = Property::where('user_id', $user->id)->count();
            $propertyIds = Property::where('user_id', $user->id)->pluck('id');
            $roomCount = Room::whereIn('property_id', $propertyIds)->count();

            $availableRooms = Room::whereIn('property_id', $propertyIds)
            ->whereDoesntHave('reservations', function ($query) use ($now) {
                $query->where('check_in', '<=', $now)
                      ->where('check_out', '>=', $now);
            })->count();


        }

        return [
            Stat::make('Properties', $propertiesCount)
                ->description('All the properties you own')
                ->Icon('heroicon-o-home-modern')
                ->color('primary'),
            Stat::make('Rooms', $roomCount)
                ->description('Total rooms in your properties')
                ->Icon('heroicon-o-arrow-right-end-on-rectangle')
                ->color('primary'),
            Stat::make('Available Rooms', $availableRooms)
                ->description('Rooms available for booking')
                ->Icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
