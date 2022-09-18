<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanySchedule extends Model
{
    use HasFactory;
    protected $guarded = false;
//    public $columnsTable = '';
//
//    public function __construct(array $attributes = [])
//    {
//        parent::__construct($attributes);
//        $this->columnsTable = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
//    }
//
//
//    public function getColumnsTable (){
//
//        return $this->columnsTable;
//    }

    //get scheduled company
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

}
