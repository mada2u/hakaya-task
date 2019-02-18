<?php

namespace App\Http\Controllers;

use App\ServiceArea;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Illuminate\Http\Request;

class ServiceAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'area' => 'required|array'
        ]);

        $serviceArea = new ServiceArea;
        $serviceArea->name = $request->get('name');
        $points = $this->buildPolygonPoints($request->get('area'));
        $serviceArea->area = new Polygon([
            new LineString($points)
        ]);
        $serviceArea->save();
        return $serviceArea;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * Build polygon points array
    * @param array
    * @return array
    */
    private function buildPolygonPoints($polygonPoints){
        $points = [];
        if(count($polygonPoints)){
            foreach ($polygonPoints as $point) {
                $points[] = new Point($point[0], $point[1]);
            }
        }
        return $points;
    }
}
