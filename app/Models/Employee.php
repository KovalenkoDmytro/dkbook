<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employees';
    protected $guarded = false;

    public function getTable()
    {
        return $this->table;
    }

    public function scheduled(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(EmployeeSchedule::class, 'employee_schedule_id');
    }

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_employee');
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_employee');
    }

}
