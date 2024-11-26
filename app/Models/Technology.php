<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = ['name', 'logo_url', 'company_id'];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_technology');
    }
}
