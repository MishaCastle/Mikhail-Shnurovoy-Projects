<?php

namespace App\Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Application\Dto\User\UserDtoCreate;
use App\Application\Dto\User\UserDtoCriteria;
use App\Application\Dto\User\UserDtoUpdate;

class User extends Authenticatable
{
    protected $table = 'user';

    protected $fillable = [
        'first_name',
        'second_name',
        'email',
        'phone',
        'login',
        'password',
        'is_verify_email',
        'is_verify_phone',
    ];

    public static function search(UserDtoCriteria $dtoFilter)
    {
        $query = self::query();

        if ($dtoFilter->id !== null) {
            $query->where('id', $dtoFilter->id);
        }

        if ($dtoFilter->firstName !== null) {
            $query->where('first_name', 'like', '%' . $dtoFilter->firstName . '%');
        }

        if ($dtoFilter->secondName !== null) {
            $query->where('second_name', 'like', '%' . $dtoFilter->secondName . '%');
        }

        if ($dtoFilter->email !== null) {
            $query->where('email', 'like', '%' . $dtoFilter->email . '%');
        }

        if ($dtoFilter->phone !== null) {
            $query->where('phone', 'like', '%' . $dtoFilter->phone . '%');
        }

        if ($dtoFilter->login !== null) {
            $query->where('login', 'like', '%' . $dtoFilter->login . '%');
        }

        if ($dtoFilter->isVerifyEmail !== null) {
            $query->where('is_verify_email', $dtoFilter->isVerifyEmail);
        }

        if ($dtoFilter->isVerifyPhone !== null) {
            $query->where('is_verify_phone', $dtoFilter->isVerifyPhone);
        }

        if ($dtoFilter->createdFrom !== null) {
            $query->where('created_at', '>=', $dtoFilter->createdFrom);
        }

        if ($dtoFilter->createdTo !== null) {
            $query->where('created_at', '<=', $dtoFilter->createdTo);
        }

        return $query->get();
    }

    public static function updateRow(UserDtoUpdate $dto)
    {
        self::where('id', $dto->id)->update([
            'first_name' => $dto->firstName,
            'second_name' => $dto->secondName,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'login' => $dto->login,
            'password' => $dto->password
        ]);
    }

    public static function deleteRow(int $id)
    {
        self::where('id', $id)->delete();
    }

    public static function createRow(UserDtoCreate $dto)
    {
        self::create([
            'first_name' => $dto->firstName,
            'second_name' => $dto->secondName,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'login' => $dto->login,
            'password' => $dto->password

        ]);
    }
    public static function VerifyEmailById(int $id)
    {
        self::where('id', $id)->update([
            'is_verify_email' => true
        ]);
    }
    public static function VerifyEmailByEmail(string $email)
    {
        self::where('email', $email)->update([
            'is_verify_email' => true
        ]);
    }
    public static function VerifyPhoneById(int $id)
    {
        self::where('id', $id)->update([
            'is_verify_phone' => true
        ]);
    }
    public static function VerifyPhoneByPhone(string $Phone)
    {
        self::where('phone', $Phone)->update([
            'is_verify_phone' => true
        ]);
    }
}