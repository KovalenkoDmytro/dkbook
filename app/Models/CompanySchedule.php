<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanySchedule extends Model
{
    use HasFactory;
    protected $guarded = false;

    //get scheduledCompany company
    public static  function getScheduled(int $scheduled_id):array{
        $scheduled = CompanySchedule::find($scheduled_id);

        return [
            'monday'=>$scheduled->monday,
            'tuesday'=>$scheduled->tuesday,
            'wednesday'=>$scheduled->wednesday,
            'thursday'=>$scheduled->thursday,
            'friday'=>$scheduled->friday,
            'saturday'=>$scheduled->saturday,
            'sunday'=>$scheduled->sunday,
        ];
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }


}
