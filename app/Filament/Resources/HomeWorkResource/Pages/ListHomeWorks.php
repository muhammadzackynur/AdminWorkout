<?php

namespace App\Filament\Resources\HomeWorkResource\Pages;

use App\Filament\Resources\HomeWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomeWorks extends ListRecords
{
    protected static string $resource = HomeWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
