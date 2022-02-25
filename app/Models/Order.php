<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = ['client_name', 'client_lastname', 'client_address', 'client_email', 'total', 'user_id', 'client_phone'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plates(): BelongsToMany
    {
        return $this->belongsToMany(Plate::class)->withPivot(['quantity']);
    }
}
