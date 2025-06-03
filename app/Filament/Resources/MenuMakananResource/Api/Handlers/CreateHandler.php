<?php
namespace App\Filament\Resources\MenuMakananResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\MenuMakananResource;
use App\Filament\Resources\MenuMakananResource\Api\Requests\CreateMenuMakananRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = MenuMakananResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create MenuMakanan
     *
     * @param CreateMenuMakananRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateMenuMakananRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}