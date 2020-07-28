<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id',
        'weekday_id',
        'user_id',
        'title',
        'from',
        'to'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function teacher(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function weekday(){
        return $this->belongsTo(Weekday::class,'weekday_id');
    }

    public function classes(){
        return $this->belongsTo(Classes::class,'class_id');
    }
}
