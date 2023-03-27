<?php

namespace App\Models;

use Carbon\Carbon;
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

    public static function findByUuid($uuid){
        return ShortcutLink::where('uuid',$uuid)->first();
    }

    public function scopeNotExpired($query){
        return $query->where('created_at','>',Carbon::now()->subDays(1));
    }
    public function scopeOfUser($query,$user){
        return $query->where('user_id',$user->id);
    }
    public function isExpired(){
        return $this->created_at<Carbon::now()->subDays(1);
    }
}
