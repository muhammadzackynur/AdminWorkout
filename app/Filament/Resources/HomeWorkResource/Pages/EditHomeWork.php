<?php

namespace App\Filament\Resources\HomeWorkResource\Pages;

use App\Filament\Resources\HomeWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeWork extends EditRecord
{
    protected static string $resource = HomeWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
