<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShortcutLink extends Model
{
    use HasFactory;

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->setAttribute("uuid", Str::uuid()->toString());
        });
    }
    protected $fillable=[
        "uuid",
        "user_id",
        "name",
        "link"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
