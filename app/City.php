<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function locales()
    {
        return $this->morphMany('App\Candidate', 'locale');
    }
}
