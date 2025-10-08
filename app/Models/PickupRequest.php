<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupRequest extends Model
{
    use HasFactory;

    // ✅ Fillable fields (so mass assignment works in controller)
    protected $fillable = [
        'name',
        'contact',
        'address',
        'waste_type',
        'quantity',
        'pickup_time',
        'status',
        'collector_id',
    ];

    // ✅ Relationship: each request can have one assigned collector
    public function collector()
    {
        return $this->belongsTo(User::class, 'collector_id');
    }
}
