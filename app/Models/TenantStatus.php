<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantStatus extends Model
{
    use HasFactory;
    protected $table = 'tenant_statuses';
    protected $fillable = ['status_name'];
}
