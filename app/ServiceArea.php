<?php

namespace App;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

class ServiceArea extends Model
{
	use SpatialTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'area'];

    public $timestamps = false;

    protected $spatialFields = [
        'area'
    ];
}
