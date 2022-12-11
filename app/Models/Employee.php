<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = false;

    public function getTable()
    {
        return $this->table;
    }

    public static function getCompanyEmployees(int $company_id)
    {
        return Employee::where('company_id', $company_id)->paginate(3);
    }

    public static function getEmployee(int $employee_id)
    {
        $employee = Employee::find($employee_id);
        return $employee->attributes;
    }

    public function getAvailableEmployees($time)
    {
        $available_employees = array();
        $employees = $this->all();
        $dayOfWeek = strtolower($time->englishDayOfWeek);

        foreach ($employees as $employee){
            $time_range = $employee->scheduled->$dayOfWeek;
            $time_start = trim(substr($time_range,0,strpos($time_range,'-')));
            $time_end = trim(substr($time_range,strpos($time_range,'-')+1));

            if ($time->between(Carbon::createFromTimeString($time_start), Carbon::createFromTimeString($time_end))) {
                $available_employees[]=$employee;
            }

        }

        return $available_employees;

    }


    public function scheduled (){
        return $this->belongsTo(EmployeeSchedule::class,'employee_schedule_id');
    }

    public function company(){
        return $this->belongsToMany(Company::class, 'company_employee');
    }

}
