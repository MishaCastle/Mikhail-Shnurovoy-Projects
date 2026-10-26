<?php

namespace App\Infrastructure\Model;

use App\Application\Dto\Subscription\SubscriptionDtoCreate;
use App\Application\Dto\Subscription\SubscriptionDtoUpdate;
use App\Application\Dto\Subscription\SubscriptionDtoCriteria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    protected $fillable = [
        'organization_id',
        'module_id',
        'date_start',
        'date_finish',
        'is_active',
    ];

    public static function createRow(SubscriptionDtoCreate $dto): void
    {
        self::create([
            'organization_id' => $dto->organizationId,
            'module_id' => $dto->moduleId,
            'date_start' => $dto->dateStart,
            'date_finish' => $dto->dateFinish,
            'is_active' => $dto->isActive,
        ]);
    }

    public static function updateRow(SubscriptionDtoUpdate $dto): void
    {
        self::where('id', $dto->id)
            ->update([
                'organization_id' => $dto->organizationId,
                'module_id' => $dto->moduleId,
                'date_start' => $dto->dateStart,
                'date_finish' => $dto->dateFinish,
                'is_active' => $dto->isActive,
            ]);
    }

    public static function deleteRow(int $id): void
    {
        self::where('id', $id)->delete();
    }

    public static function search(SubscriptionDtoCriteria $dto)
    {
        $query = self::query();

        if ($dto->id !== null) {
            $query->where('id', $dto->id);
        }

        if ($dto->organizationId !== null) {
            $query->where('organization_id', $dto->organizationId);
        }

        if ($dto->moduleId !== null) {
            $query->where('module_id', $dto->moduleId);
        }

        if ($dto->dateStartFrom !== null) {
            $query->where('date_start', '>=', $dto->dateStartFrom);
        }

        if ($dto->dateStartTo !== null) {
            $query->where('date_start', '<=', $dto->dateStartTo);
        }

        if ($dto->dateFinishFrom !== null) {
            $query->where('date_finish', '>=', $dto->dateFinishFrom);
        }

        if ($dto->dateFinishTo !== null) {
            $query->where('date_finish', '<=', $dto->dateFinishTo);
        }

        if ($dto->isActive !== null) {
            $query->where('is_active', $dto->isActive);
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