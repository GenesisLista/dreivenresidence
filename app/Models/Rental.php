<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'apartment_id',
        'monthly_rental',
        'start_date',
        'end_date'
    ];

    // Relation to Tenant
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    // Relation to Apartment
    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_id');
    }
}
