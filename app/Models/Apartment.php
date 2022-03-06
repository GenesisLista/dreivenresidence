<?php

namespace App\Models;

use App\Models\ApartmentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model
{
    use HasFactory;

    protected $table = 'apartments';
    protected $fillable = [
        'location',
        'room',
        'apartment_status_id'
    ];

    // Apartment Status Relation
    public function apartment_status()
    {
        return $this->belongsTo(ApartmentStatus::class);
    }
}
