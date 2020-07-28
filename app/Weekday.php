<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekday extends Model
{
    protected $table = 'weekdays';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function schedule()
    {
        return $this->hasMany(Schedule::class,'weekday_id');
    }
}
