<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable=[
        'url',
        'ip',
        'agent',
        'country',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
