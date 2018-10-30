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
        'stance', 'description', 'approved',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function candidate()
    {
        return $this->belongsTo('App\Candidate');
    }

    public function issue()
    {
        return $this->belongsTo('App\Issue');
    }
}
