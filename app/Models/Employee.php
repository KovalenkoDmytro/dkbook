<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = false;

    public function getTable()
    {
        return $this->table;
    }

    //TOdo to refactor this function (remove)
    public static function getCompanyEmployees(int $company_id)
    {
        return Employee::where('company_id', $company_id)->paginate(3);
    }
    //TOdo to refactor this function (remove)
    public static function getEmployee(int $employee_id)
    {
        $employee = Employee::find($employee_id);
        return $employee->attributes;
    }


    public function getAvailableEmployees($date, $service_id)
    {
        $chose_date = \Carbon\Carbon::parse($date);
        $available_employees = array();
        $employees = Auth::user()->company->employees;
        $dayOfWeek = strtolower($chose_date->englishDayOfWeek);

        foreach ($employees as $employee) {
            $time_range = $employee->scheduled->$dayOfWeek;
            $time_start = trim(substr($time_range, 0, strpos($time_range, '-')));
            $time_end = trim(substr($time_range, strpos($time_range, '-') + 1));
            $time_min = Carbon::parse("$chose_date->year-$chose_date->month-$chose_date->day $time_start");
            $time_max = Carbon::parse("$chose_date->year-$chose_date->month-$chose_date->day $time_end");

            // get all employees who make receive(passed) service
            foreach ($employee->services as $service){
                if($service->id === $service_id){
                    // get all employee who is works at chose time
                    if ($chose_date->between($time_min, $time_max)) {
                        $available_employees[] = $employee;
                    }
                }
            }
        }
        return $available_employees;
    }

    public function scheduled()
    {
        return $this->belongsTo(EmployeeSchedule::class, 'employee_schedule_id');
    }

    public function company()
    {
        return $this->belongsToMany(Company::class, 'company_employee');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'employee_service');
    }

}
