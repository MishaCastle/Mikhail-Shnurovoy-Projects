<?php

namespace App\Infrastructure\Model;

use App\Application\Dto\OrganizationUser\OrganizationUserDtoCreate;
use App\Application\Dto\OrganizationUser\OrganizationUserDtoUpdate;
use App\Application\Dto\OrganizationUser\OrganizationUserDtoCriteria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrganizationUser extends Model
{
    protected $table = 'organization_user';

    public $timestamps = false;

    protected $fillable = [
        'organization_id',
        'user_id',
    ];

    public static function createRow(OrganizationUserDtoCreate $dto): void
    {
        self::create([
            'organization_id' => $dto->organizationId,
            'user_id' => $dto->userId,
        ]);
    }

    public static function updateRow(OrganizationUserDtoUpdate $dto): void
    {
        self::where('id', $dto->id)
            ->update([
                'organization_id' => $dto->organizationId,
                'user_id' => $dto->userId,
            ]);
    }

    public static function deleteRow(int $id): void
    {
        self::where('id', $id)->delete();
    }

    public static function search(OrganizationUserDtoCriteria $dto): Collection
    {
        $query = self::query();

        if ($dto->id !== null) {
            $query->where('id', $dto->id);
        }

        if ($dto->organizationId !== null) {
            $query->where('organization_id', $dto->organizationId);
        }

        if ($dto->userId !== null) {
            $query->where('user_id', $dto->userId);
        }

        return $query->get();
    }
}