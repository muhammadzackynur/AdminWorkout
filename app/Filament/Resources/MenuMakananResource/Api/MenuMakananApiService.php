<?php
namespace App\Filament\Resources\MenuMakananResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\MenuMakananResource;
use Illuminate\Routing\Router;


class MenuMakananApiService extends ApiService
{
    protected static string | null $resource = MenuMakananResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
