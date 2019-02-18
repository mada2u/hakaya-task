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

    /**
    * Identify if the location entered by user falls under the "Service Area" or not
    * @param $query, $location
    * @return Builder
    */
    public function scopeInArea($query, $location){
        return $query->contains('area',$location);
    }
}
