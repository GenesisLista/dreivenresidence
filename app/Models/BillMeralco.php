<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillMeralco extends Model
{
    use HasFactory;

    protected $fillable = [
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
