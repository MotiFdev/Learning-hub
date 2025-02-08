<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentActivity extends Model
{
    /** @use HasFactory<\Database\Factories\RecentActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_type',
        'details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
