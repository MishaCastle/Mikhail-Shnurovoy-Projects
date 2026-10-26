<?php

namespace App\Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;

use App\Application\Dto\Module\ModuleDtoCreate;
use App\Application\Dto\Module\ModuleDtoCriteria;
use App\Application\Dto\Module\ModuleDtoUpdate;

class Module extends Model
{
    protected $fillable = [
        'name',
        'price',
    ];
    protected $table = 'module';
    public static function search(ModuleDtoCriteria $dtoFilter){
        $query = self::query();

        if ($dtoFilter->id !== null) {
            $query->where('id', $dtoFilter->id);
        }

        if ($dtoFilter->name !== null) {
            $query->where('name', 'like', '%' . $dtoFilter->name . '%');
        }

        if ($dtoFilter->priceFrom !== null) {
            $query->where('price', '>=', $dtoFilter->priceFrom);
        }

        if ($dtoFilter->priceTo !== null) {
            $query->where('price', '<=', $dtoFilter->priceTo);
        }

        if ($dtoFilter->createdFrom !== null) {
            $query->where('created_at', '>=', $dtoFilter->createdFrom);
        }

        if ($dtoFilter->createdTo !== null) {
            $query->where('created_at', '<=', $dtoFilter->createdTo);
        }

        return $query->get();
    }
    public static function updateRow(ModuleDtoUpdate $request){
        Module::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
    }
    public static function deleteRow(int $id){
        Module::where('id', $id)
        ->delete();
    }
    public static function createRow(ModuleDtoCreate $request){
        Module::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
    }
}
