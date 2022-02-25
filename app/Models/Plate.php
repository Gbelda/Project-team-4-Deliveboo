<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plate extends Model
{
    protected $fillable = ['name', 'description', 'ingredients', 'price', 'available', 'image', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function order(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot(['quantity']);
    }
}