<?php

namespace App\Filament\Resources\Basts\Pages;

use App\Filament\Resources\Basts\BastResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBasts extends ListRecords
{
    protected static string $resource = BastResource::class;

    public function getTitle(): string
    {
        return 'Data BAST';
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getMaxContentWidth(): ?string
    {
        return 'max-w-[1800px]';
    }
}
