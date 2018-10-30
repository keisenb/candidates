<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district', 'approved',
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
