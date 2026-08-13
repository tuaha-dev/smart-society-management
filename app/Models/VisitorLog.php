<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $primaryKey = 'log_id';
    protected $fillable = ['visitor_name', 'phone', 'flat_number', 'purpose', 'entry_time'];
}