<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class ReservationChart extends ChartWidget
{
    protected static ?string $heading = 'Dominant Property';

    protected static ?int $sort = 4;

    protected function getData(): array
    {

        $user = Auth::user();

        $query = Property::with('rooms.reservations');

        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        $properties = $query->get();


        $labels = [];
        $data = [];

        foreach ($properties as $property) {
            $labels[] = $property->name;

            // Hitung jumlah semua reservasi dari semua room di property ini
            $reservationCount = $property->rooms->flatMap->reservations->count();
            $data[] = $reservationCount;
        }


        array_multisort($data, SORT_DESC, $labels);

        return [
            'datasets' => [
                [
                   'data' => $data,
                    'backgroundColor' => [
                        '#a3e635',  // Warna hijau terang
                        '#34d399',  // Warna hijau
                        '#60a5fa',  // Warna biru
                        '#c084fc',  // Warna ungu
                        '#facc15',  // Warna kuning
                        '#fb923c',  // Warna oranye
                        '#ff7f50',  // Warna coral
                        '#ff6347',  // Warna tomato
                        '#ff1493',  // Warna deep pink
                        '#ff4500',  // Warna orange red
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'datalabels' => [
                    'display' => true,
                    'formatter' => function ($value, $context) {
                        // Hitung total data
                        $total = array_sum($context['chart']->data['datasets'][0]['data']);
                        $percentage = ($value / $total) * 100;
                        return round($percentage, 2) . '%'; // Menampilkan persentase
                    },
                    'color' => '#fff', // Warna teks label
                    'font' => [
                        'weight' => 'bold',
                        'size' => 14,
                    ],
                    'align' => 'center', // Letakkan label di tengah
                    'anchor' => 'center', // Memastikan label berada di tengah pie chart
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }




}
