<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];

    protected $casts = [
        'translates' => 'array',
    ];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
