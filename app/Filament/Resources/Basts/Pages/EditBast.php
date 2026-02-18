<?php

namespace App\Filament\Resources\Basts\Pages;

use App\Filament\Resources\Basts\BastResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBast extends EditRecord
{
    protected static string $resource = BastResource::class;

    public function getTitle(): string
    {
        return 'Edit Data BAST';
    }

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }

    // 🚀 setelah Save changes → balik ke list bast
    protected function getRedirectUrl(): string
    {
        return BastResource::getUrl('index');
    }
}
