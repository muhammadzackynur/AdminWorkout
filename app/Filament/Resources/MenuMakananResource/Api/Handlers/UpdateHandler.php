<?php
namespace App\Filament\Resources\MenuMakananResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\MenuMakananResource;
use App\Filament\Resources\MenuMakananResource\Api\Requests\UpdateMenuMakananRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = MenuMakananResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update MenuMakanan
     *
     * @param UpdateMenuMakananRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateMenuMakananRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}