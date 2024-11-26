<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'name',
        'logo',
        'category_id',
        'website_url',
        'hh_url',
        'linkedin_url',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'company_technology');
    }
}
