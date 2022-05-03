<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillStaMesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_rental_id',
        'tenant_id',
        'apartment_id',
        'bill_payment_status_id',
        'bill_type_id',
        'billed_amount',
        'billed_paid_amount',
        'billed_balance_amount',
        'billed_date_paid'
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

    // Relation Bill Payment Status
    public function payment_status()
    {
        return $this->belongsTo(BillPaymentStatus::class, 'bill_payment_status_id');
    }
}
