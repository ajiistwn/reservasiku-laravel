<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsReservation extends BaseWidget
{
    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $reservationsCount = Reservation::count();

            $paymentSuccessCount = Reservation::whereHas('transaction', function($query){
                $query->where('status', 'success');
            })->count();

            $paymentProblemCount = Reservation::whereHas('transaction', function($query){
                $query->whereIn('status', ['failure', 'pending', 'cancelled']);
            })->count();

            $incomeCount = Reservation::whereHas('transaction', function($query){
                $query->where('status', 'success');
            })
            ->with(['transaction'=> function($query){
                $query->where('status', 'success');
            }])
            ->get()
            ->filter()
            ->map->transaction
            ->sum('amount');
        } else {
            // For non-admin users, you can customize the logic here
            $reservationsCount = Reservation::whereHas('room.property', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count();

            $paymentSuccessCount = Reservation::whereHas('room.property', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->whereHas('transaction', function($query){
                $query->where('status', 'success');
            })->count();

            $paymentProblemCount = Reservation::whereHas('room.property', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->whereHas('transaction', function($query){
                $query->whereIn('status', ['failure', 'pending', 'cancelled']);
            })->count();

            $incomeCount = Reservation::whereHas('room.property', function ($query) use ($user) {
                $query->where('user_id', $user->id);
                })->with(['transaction'=> function($query){
                    $query->where('status', 'success');
                }])
                ->get()
                ->filter()
                ->map->transaction
                ->sum('amount');
            }

            $reservationsPerMonth = [];

            foreach (range(1, 12) as $month) {
                // Dapatkan tanggal awal dan akhir bulan
                $startOfMonth = Carbon::create(null, $month, 1)->startOfMonth();
                $endOfMonth = Carbon::create(null, $month, 1)->endOfMonth();

                // Query untuk menghitung jumlah reservasi pada bulan ini
                $query = Reservation::whereHas('room.property', function($query) use ($user) {
                    // Hanya ambil property yang dimiliki oleh user yang sedang login
                    if ($user->role !== 'admin') {
                        $query->where('user_id', $user->id);
                    }
                })
                ->whereBetween('check_in', [$startOfMonth, $endOfMonth]) // Filter berdasarkan bulan ini
                ->whereHas('transaction', function($query) {
                    $query->where('status', 'success'); // Hanya transaksi dengan status 'success'
                });

                // Hitung jumlah reservasi dan simpan ke array
                $reservationsPerMonth[] = $query->count();
            }

            $paymentSuccessPerMonth = [];
            foreach (range(1, 12) as $month) {
                // Dapatkan tanggal awal dan akhir bulan
                $startOfMonth = Carbon::create(null, $month, 1)->startOfMonth();
                $endOfMonth = Carbon::create(null, $month, 1)->endOfMonth();

                // Query untuk menghitung jumlah reservasi pada bulan ini
                $query = Reservation::whereHas('room.property', function($query) use ($user) {
                    // Hanya ambil property yang dimiliki oleh user yang sedang login
                    if ($user->role !== 'admin') {
                        $query->where('user_id', $user->id);
                    }
                })
                ->whereBetween('check_in', [$startOfMonth, $endOfMonth]) // Filter berdasarkan bulan ini
                ->whereHas('transaction', function($query) {
                    $query->where('status', 'success'); // Hanya transaksi dengan status 'success'
                });

                // Hitung jumlah reservasi dan simpan ke array
                $paymentSuccessPerMonth[] = $query->count();
            }

            $paymentProblemPerMonth = [];
            foreach (range(1, 12) as $month) {
                // Dapatkan tanggal awal dan akhir bulan
                $startOfMonth = Carbon::create(null, $month, 1)->startOfMonth();
                $endOfMonth = Carbon::create(null, $month, 1)->endOfMonth();

                // Query untuk menghitung jumlah reservasi pada bulan ini
                $query = Reservation::whereHas('room.property', function($query) use ($user) {
                    // Hanya ambil property yang dimiliki oleh user yang sedang login
                    if ($user->role !== 'admin') {
                        $query->where('user_id', $user->id);
                    }
                })
                ->whereBetween('check_in', [$startOfMonth, $endOfMonth]) // Filter berdasarkan bulan ini
                ->whereHas('transaction', function($query) {
                    $query->whereIn('status', ['failure', 'pending', 'cancelled']); // Hanya transaksi dengan status 'success'
                });

                // Hitung jumlah reservasi dan simpan ke array
                $paymentProblemPerMonth[] = $query->count();
            }

        return [
            //
            Stat::make('Reservation', $reservationsCount)
                ->description('Total reservations your property has')
                ->Icon('heroicon-o-bookmark-square')
                ->color('primary')
                ->chart($reservationsPerMonth),
            Stat::make('Payment Success', $paymentSuccessCount)
                ->description('Total payment success for your reservation')
                ->Icon('heroicon-o-credit-card')
                ->color('success')
                ->chart($paymentSuccessPerMonth),
            Stat::make('Payment Problem', $paymentProblemCount)
                ->description('Total payment problems encountered')
                ->Icon('heroicon-o-exclamation-circle')
                ->color('danger')
                ->chart($paymentProblemPerMonth),
            Stat::make('Income', "Rp." . number_format($incomeCount, 0, ',', '.') )
                ->description('Total income from your reservation')
                ->Icon('heroicon-o-banknotes')
                ->color('success'),
        ];
    }
}
