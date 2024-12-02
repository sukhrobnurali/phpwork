<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
