<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public static function getClient($client_id){
        return Client::where('id', $client_id)->get()->first();
    }

    public function companes()
    {
        return $this->belongsToMany(Company::class,'company_client');
    }

}
