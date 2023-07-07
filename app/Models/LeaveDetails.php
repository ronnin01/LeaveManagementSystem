<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveDetails extends Model
{
    use HasFactory;

    protected $primaryKey = 'ld_id';
    protected $fillable = [
        'u_id',
        'el_id',
        'ld_message',
        'ld_start_date',
        'ld_end_date',
        'ld_status'
    ];
}
