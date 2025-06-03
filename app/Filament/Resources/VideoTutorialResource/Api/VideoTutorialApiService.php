<?php
namespace App\Filament\Resources\VideoTutorialResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\VideoTutorialResource;
use Illuminate\Routing\Router;


class VideoTutorialApiService extends ApiService
{
    protected static string | null $resource = VideoTutorialResource::class;

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
