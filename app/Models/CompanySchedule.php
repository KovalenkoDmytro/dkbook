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


}
