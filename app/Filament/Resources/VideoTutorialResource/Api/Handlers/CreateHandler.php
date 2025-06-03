<?php
namespace App\Filament\Resources\VideoTutorialResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\VideoTutorialResource;
use App\Filament\Resources\VideoTutorialResource\Api\Requests\CreateVideoTutorialRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = VideoTutorialResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create VideoTutorial
     *
     * @param CreateVideoTutorialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateVideoTutorialRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}