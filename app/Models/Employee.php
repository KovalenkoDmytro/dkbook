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

    public static function getCompanyEmployees($company_id){

        $employeesDB = collect(Employee::all()->where('company_id', $company_id));
        $employees = collect([]);
        if(count($employeesDB)>0){
            $employees = $employeesDB->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' =>$item->name,
                    'position'=> $item->position,
                    'email'=>$item->email,
                    'phone'=>$item->phone,
                    'scheduled_id'=>$item->employee_schedule_id,
                ];
            });
        }

        return $employees;
    }


}
