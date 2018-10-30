<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'approved',
    ];

    protected $casts = [
        'approved' => 'boolean',
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
