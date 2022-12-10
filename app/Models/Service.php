<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Service extends Model
{
    use HasFactory;
    protected $guarded = false;

//    public static function getServices($company_id): \Illuminate\Support\Collection
//    {
//        $servicesDB = collect(Service::all()->where('company_id',$company_id));
//        $services = collect([]);
//
//        if(count($servicesDB)>0){
//            $services = $servicesDB->map(function ($item) {
//                return [
//                    'id' => $item->id,
//                    'company_id' => $item->company_id,
//                    'service_name' =>$item->name,
//                    'service_price'=> $item->price,
//                    'timeRange_hour'=>$item->timeRange_hour,
//                    'timeRange_minutes'=>$item->timeRange_minutes,
//                ];
//            });
//        }
//        return $services;
//    }

    public static function getServices(): \Illuminate\Database\Eloquent\Collection
    {
        return Service::all()->where('company_id',Auth::user()->company->id);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
