<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kosan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'city',
        'country',
        'price',
        'type_kosan',
        'address',
        'phone',
        'map_url',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'number_of_cupboards',
    ];

    public function galleries()
    {
        return $this->hasMany(KosanGallery::class, 'kosans_id', 'id');
    }
}
