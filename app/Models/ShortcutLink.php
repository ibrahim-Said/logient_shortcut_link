<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortcutLink extends Model
{
    use HasFactory,HasUuids;
    protected $fillable=[
        "user_id",
        "name",
        "link",
        "shortcut_link"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
