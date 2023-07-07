<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = "dept_id";

    protected $fillable = [
        'dept_name',
        'dept_description'
    ];
}
