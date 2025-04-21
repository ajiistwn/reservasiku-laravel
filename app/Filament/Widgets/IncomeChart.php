<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Reservation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class IncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Income Chart';
    protected static ?string $description = 'Monthly Income Graph from the Number of Reservations Available.';

    protected static ?int $sort = 3;

    protected function getData(): array
    {

        $user = Auth::user();

        $incomePerMonth = [];

        foreach (range(1, 12) as $month) {
            // Dapatkan tanggal awal dan akhir bulan
            $startOfMonth = Carbon::create(null, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::create(null, $month, 1)->endOfMonth();

            // Query untuk menghitung total amount pada bulan ini berdasarkan transaksi sukses
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

            // Hitung total income (jumlah amount) dan simpan ke array
            array_push($incomePerMonth, $query->with(['transaction' => function($query) {
                $query->where('status', 'success'); // Pastikan transaksi status 'success'
            }])
            ->get()
            ->map->transaction
            ->sum('amount'));
        }


        return [
            //
            'datasets' => [
                [
                    'label' => 'Monthly Income',
                    'data' => $incomePerMonth,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }


    protected function getHeight(): string|int|null
    {
        return 850; // ubah ini untuk memperkecil tampilan widget
    }


}
