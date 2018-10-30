<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'abbreviation',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function locales()
    {
        return $this->morphMany('App\Candidate', 'locale');
    }

}
