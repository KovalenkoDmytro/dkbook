<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = false;


    public function getTable()
    {
        return $this->table;
    }

    public static function getCompany($company_id){
        return Company::where('id', $company_id)->first();
    }

    public  function owner()
    {
        return $this->belongsTo( CompanyOwner::class);
    }

    public function scheduled (){
        return $this->belongsTo(CompanySchedule::class);
    }

    public function business_type(){
        return $this->belongsTo(BusinessType::class);
    }
}
