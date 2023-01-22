<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class CompanyOwner extends Model implements Authenticatable, CanResetPassword
{
    use HasFactory;
    use Notifiable;
    protected $guarded = false;
    public $table = 'company_owners';
    protected $fillable = [
        'login',
        'email',
        'fullName',
        'password',
        'phone',
        'timezone',
    ];

    protected $hidden = [
        'remember_token',
    ];
    private string $rememberToken;

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

    public function getRememberToken(): string
    {
        return $this->rememberToken;
    }

    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    public function getEmailForPasswordReset()
    {
       return $this->email;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
