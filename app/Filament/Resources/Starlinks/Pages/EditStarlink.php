<?php

namespace App\Filament\Resources\Starlinks\Pages;

use App\Filament\Resources\Starlinks\StarlinkResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStarlink extends EditRecord
{
    protected static string $resource = StarlinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ViewAction::make(),
            // DeleteAction::make(),
        ];
    }

    public function getCreatedNotificationTitle(): ?string
    {
        return 'Data ' . strtoupper($this->record->kit_name) . ' Tersimpan!';
    }

    // 🚀 setelah Save changes → balik ke list starlinks
    protected function getRedirectUrl(): string
    {
        return StarlinkResource::getUrl('index');
    }
}
