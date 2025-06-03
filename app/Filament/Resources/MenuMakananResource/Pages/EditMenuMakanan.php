<?php

namespace App\Filament\Resources\MenuMakananResource\Pages;

use App\Filament\Resources\MenuMakananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenuMakanan extends EditRecord
{
    protected static string $resource = MenuMakananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
