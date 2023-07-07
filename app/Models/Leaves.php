<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;
    protected $primaryKey = "leave_id";

    protected $fillable = [
        'leave_name',
        'leave_description',
        'leave_total'
    ];
}
