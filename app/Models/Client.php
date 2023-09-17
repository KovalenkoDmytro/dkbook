<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function Companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class,'company_client');
    }

}
