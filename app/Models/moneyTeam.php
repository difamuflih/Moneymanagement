<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class moneyTeam extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category_team_id',
        'user_id',
    ];

    public function categoryTeam(): BelongsTo
    {
        return $this->belongsTo(categoryTeam::class, 'category_team_id');
    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
