<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentStatus extends Model
{
    use HasFactory;

    protected $table = 'apartment_statuses';
    protected $fillable = ['status_name'];
}
