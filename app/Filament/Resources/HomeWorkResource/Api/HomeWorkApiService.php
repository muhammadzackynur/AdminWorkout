<?php
namespace App\Filament\Resources\HomeWorkResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\HomeWorkResource;
use Illuminate\Routing\Router;


class HomeWorkApiService extends ApiService
{
    protected static string | null $resource = HomeWorkResource::class;

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
