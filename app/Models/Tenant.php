<?php

namespace App\Models;

use App\Models\Rental;
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
        'mobile',
        'address',
        'school_company',
        'person_to_notify',
        'person_contact_number',
        'tenant_status_id'
    ];

    // Apartment relation
    public function apartment()
    {
        return $this->belongsToMany(Apartment::class)->withTimestamps();
    }

    // Relation to rental
    public function rental_list()
    {
        return $this->belongsTo(Rental::class, 'id', 'tenant_id');
    }
}
