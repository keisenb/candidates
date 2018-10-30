<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'approved',
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

}
