<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
	public function index(){
		$province = DB::table('provinces')
        ->pluck('name', 'id');
		return view('index', compact('province'));
	}

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegency($reg_id){
    	$regency = DB::table('regencies')
    	->where('province_id', $reg_id)
    	->pluck('name', 'id');
    	return json_encode($regency);
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getDistrict($dis_id){
    	$district = DB::table('districts')
    	->where('regency_id', $dis_id)
    	->pluck('districts.name', 'districts.id');
    	return json_encode($district);
    }    

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getVillage($vil_id){
    	$village = DB::table('villages')
    	->where('district_id', $vil_id)
    	->pluck('name', 'id');
    	return json_encode($village);
    }

    public function submitPluck(Request $request){

    }
}