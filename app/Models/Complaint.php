<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $primaryKey = 'complaint_id';
    protected $fillable = ['user_id', 'title', 'description', 'category', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}