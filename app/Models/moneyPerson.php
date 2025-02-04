<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class moneyPerson extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category_person_id',
        'user_id',
    ];

    
    public function categoryPerson(): BelongsTo
    {
        return $this->belongsTo(categoryPerson::class, 'category_person_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
