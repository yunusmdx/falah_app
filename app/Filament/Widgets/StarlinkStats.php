<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Starlink;
use Symfony\Component\Console\Color;

use function Laravel\Prompts\warning;

class StarlinkStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            
            Stat::make('BARU',
            Starlink::where('status', 'BARU')->count()
            )
            ->icon('heroicon-o-sparkles')
            // ->color('indigo')
            ->extraAttributes([
                'style' => 'border:2px solid #3b82f6;',
            ]),

            Stat::make('AKTIF',
                Starlink::where('status', 'AKTIF')->count()
            )
            ->icon('heroicon-o-check-circle')
            // ->color('success')
            ->extraAttributes([
                'style' => 'border:2px solid #22c55e;',
            ]),

            Stat::make('STANDBY',
                Starlink::where('status', 'STANDBY')->count()
            )
            ->icon('heroicon-o-pause-circle')
            // ->color('warning')
            ->extraAttributes([
                'style' => 'border:2px solid #eab308;',
            ]),

            Stat::make('SUSPEND',
                Starlink::where('status', 'SUSPEND')->count()
            )
            ->icon('heroicon-o-pause-circle')
            // ->color('danger')
            ->extraAttributes([
                'style' => 'border:2px solid #ef4444;',
            ]),

            Stat::make('TIDAK AKTIF',
                Starlink::where('status', 'TIDAK AKTIF')->count()
            )
            ->icon('heroicon-o-x-circle')
            // ->color('gray')
            ->extraAttributes([
                'style' => 'border:2px solid #9ca3af;',
            ]),

        ];
    }
}
