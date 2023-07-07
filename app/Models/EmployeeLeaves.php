<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaves extends Model
{
    use HasFactory;

    protected $primaryKey = "el_id";
    protected $fillable = [
        'u_id',
        'leave_id',
        'el_total'
    ];
}