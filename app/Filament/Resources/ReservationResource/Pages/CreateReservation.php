<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Models\Room;
use Filament\Actions;
use App\Models\Transaction;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ReservationResource;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;
    protected function afterCreate(): void
    {
        $reservation = $this->record;

        // Ambil room untuk dapetin harga
        $room = Room::find($reservation->room_id);
        $price = $room->price / 24;
        // Hitung jam dan harga
        $checkIn = $reservation->check_in;
        $checkOut = $reservation->check_out;

        $hour =  (int) now()->parse($checkIn)->diffInHours(now()->parse($checkOut));
        $amount = $hour * $price;

        // Simpan ke tabel transactions
        Transaction::create([
            'reservation_id' => $reservation->id,
            'amount' => $amount,
        ]);
    }
}
