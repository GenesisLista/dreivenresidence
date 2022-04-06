<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillRental extends Model
{
    use HasFactory;

    protected $fillable =[
        'bill_code',
        'bill_date',
        'bill_period_start',
        'bill_period_end',
        'location_id'
    ];

    // Relation to location
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
