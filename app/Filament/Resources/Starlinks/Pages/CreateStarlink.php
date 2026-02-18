<?php

namespace App\Filament\Resources\Starlinks\Pages;

use App\Filament\Resources\Starlinks\StarlinkResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStarlink extends CreateRecord
{
    protected static string $resource = StarlinkResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Create'),

            $this->getCreateAnotherFormAction()
                ->label('Create & another'),

            $this->getCancelFormAction(),
        ];
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Data ' . strtoupper($this->record->kit_name) . ' Tersimpan!';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // kembali ke list
    }
}
