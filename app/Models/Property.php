<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'city',
        'country',
        'image',
        'type',
        'description',
        'price',
        'startDate',
        'endDate',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function reservation()
    {
        return$this->hasMany(Reservation::class);
    }

}
