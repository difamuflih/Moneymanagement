<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoryPerson extends Model
{
    //
    
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function moneyPerson(): HasMany
    {
        return $this->hasMany(moneyPerson::class);
    }
}
