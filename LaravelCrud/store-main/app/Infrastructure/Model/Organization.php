<?php

namespace App\Infrastructure\Model;

use App\Application\DTO\Organization\OrganizationDtoCreate;
use App\Application\DTO\Organization\OrganizationDtoUpdate;
use App\Application\DTO\Organization\OrganizationDtoCriteria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organization';

    protected $fillable = [
        'name',
        'post_code',
        'country',
        'city',
        'street',
        'number',
    ];

    public static function createRow(OrganizationDtoCreate $dto): void
    {
        self::create([
            'name' => $dto->name,
            'post_code' => $dto->postCode,
            'country' => $dto->country,
            'city' => $dto->city,
            'street' => $dto->street,
            'number' => $dto->number,
        ]);
    }

    public static function updateRow(OrganizationDtoUpdate $dto): void
    {
        self::where('id', $dto->id)
            ->update([
                'name' => $dto->name,
                'post_code' => $dto->postCode,
                'country' => $dto->country,
                'city' => $dto->city,
                'street' => $dto->street,
                'number' => $dto->number,
            ]);
    }

    public static function deleteRow(int $id): void
    {
        self::where('id', $id)->delete();
    }

    public static function search(OrganizationDtoCriteria $dto)
    {
        $query = self::query();

        if ($dto->id !== null) {
            $query->where('id', $dto->id);
        }

        if ($dto->name !== null) {
            $query->where('name', 'like', '%' . $dto->name . '%');
        }

        if ($dto->postCode !== null) {
            $query->where('post_code', 'like', '%' . $dto->postCode . '%');
        }

        if ($dto->country !== null) {
            $query->where('country', 'like', '%' . $dto->country . '%');
        }

        if ($dto->city !== null) {
            $query->where('city', 'like', '%' . $dto->city . '%');
        }

        if ($dto->street !== null) {
            $query->where('street', 'like', '%' . $dto->street . '%');
        }

        if ($dto->number !== null) {
            $query->where('number', 'like', '%' . $dto->number . '%');
        }

        if ($dto->createdFrom !== null) {
            $query->where('created_at', '>=', $dto->createdFrom);
        }

        if ($dto->createdTo !== null) {
            $query->where('created_at', '<=', $dto->createdTo);
        }

        return $query->get();
    }
}