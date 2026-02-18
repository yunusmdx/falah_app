<?php

namespace App\Filament\Resources\Basts\Pages;

use App\Models\Bast;
use App\Filament\Resources\Basts\BastResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBast extends CreateRecord
{
    
    protected static string $resource = BastResource::class;

        public function getMaxContentWidth(): ?string
    {
        return 'max-w-[1800px]';
    }


    public function getTitle(): string
    {
        return 'Input Data BAST';
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['no_bast'] = $this->generateNomorBast();
        return $data;
    }

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
        return 'Data ' . strtoupper($this->record->no_bastw) . ' Tersimpan!';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // kembali ke list
    }

}
