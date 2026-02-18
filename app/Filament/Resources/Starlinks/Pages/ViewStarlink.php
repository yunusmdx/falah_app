<?php

namespace App\Filament\Resources\Starlinks\Pages;

use App\Filament\Resources\Starlinks\StarlinkResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewStarlink extends ViewRecord
{    
    protected static string $resource = StarlinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
            // Actions\DeleteAction::make(),       
            // Action::make('payments')
            //     ->label('Lihat Payments')
            //     ->icon('heroicon-o-credit-card')
            //     ->url(fn () =>
            //         route('filament.admin.resources.payments.index', [
            //             'tableFilters[starlink_id][value]' => $this->record->id,
            //         ])
            //     ),
        ];
    }
}
