<?php

namespace App\Models;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants';
    protected $fillable = [
        'name',
        'email',
        'mobile'
    ];

    // Apartment relation
    public function apartment()
    {
        return $this->belongsToMany(Apartment::class)->withTimestamps();
    }
}
