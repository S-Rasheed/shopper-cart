<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailySalesReport extends Model
{
    protected $fillable = [
        'report_date',
        'sent_to_email',
        'sent_by',
        'sent_by_user_id',
        'report_data',
    ];

    protected $casts = [
        'report_date' => 'date',
        'report_data' => 'array',
    ];

    public function sentByUser()
    {
        return $this->belongsTo(User::class, 'sent_by_user_id');
    }
}
