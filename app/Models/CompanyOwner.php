<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class CompanyOwner extends Model implements Authenticatable
{
    use HasFactory;
    protected $guarded = false;
    public $table = 'company_owners';

    public static function createUser(array $data)
    {
        return CompanyOwner::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'fullName' => $data['fullName'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'timezone' => $data['timezone']
        ]);
    }

    public static function getUser(string $login){
        return CompanyOwner::where('login', $login)->get();
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function getAuthIdentifierName()
    {
        return $this->primaryKey;
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
