<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $guarded = false;

    public function getTable()
    {
        return $this->table;
    }

    public static function getCompanyEmployees(int $company_id){
        return Employee::where('company_id', $company_id)->paginate(15);
    }

    public static function getEmployee(int $employee_id){
        $employee = Employee::find($employee_id);
        return $employee->attributes;
    }


}
