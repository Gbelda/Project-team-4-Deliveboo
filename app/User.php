<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'restaurant_name', 'address', 'image', 'slug', 'vat',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Models\Category::class);
    }

    public function plates(): HasMany
    {
        return $this->hasMany(Models\Plate::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Models\Order::class);
    }

    public function scopeWithFilters($query, $categories)
    {
        if ($query == '') {
        } else {
            # code...
            return User::whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('category_id', $categories);
            });
        }
        // return $query->when(count($categories), function ($query) use ($categories) {
        //     $query->where('category_id', $categories);
        // });
    }
 public function getRouteKeyName()
    {
        return "slug";
    } 
}