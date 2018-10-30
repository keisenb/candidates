<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'website', 'locale_type',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function locale()
    {
        return $this->morphTo();
    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    public function party()
    {
        return $this->belongsTo('App\Party');
    }
}
