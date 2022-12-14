<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Service extends Model
{
    use HasFactory;
    protected $guarded = false;

    public static function getServices(): \Illuminate\Database\Eloquent\Collection
    {
        return Service::all()->where('company_id',Auth::user()->company->id);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function employees(){
        return $this->belongsToMany(Employee::class,'employee_service');
    }
}
