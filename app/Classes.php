<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

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

    public function lessons(int $weekId)
    {
        return $this->schedule()->where('weekday_id', $weekId)->get();
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class,'class_id');
    }
}
