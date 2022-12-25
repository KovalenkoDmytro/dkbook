<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $guarded = false;


    public function getTable()
    {
        return $this->table;
    }

    public function getEmployee($employee_id)
    {
        $employees = Auth::user()->company->employees;
        $employee_array = $employees->filter(function ($value, $key) use ($employee_id) {
            return $value->id === $employee_id;
        });

        foreach ($employee_array as $item) {
            $employee = $item;
        }
        return $employee;

    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CompanyOwner::class);
    }

    public function scheduled(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CompanySchedule::class, 'company_schedule_id');
    }

    public function business_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function appointments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'company_employee');
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function clients(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'company_client');
    }


}
