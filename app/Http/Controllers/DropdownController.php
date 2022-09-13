<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;


class DropdownController extends Controller
{
    public function index()
        {
            $countries = Country::all();
            
            return view('index',compact('countries'));
        }
        public function getStateList(Request $request)
        {  
            //print_r($request->country_id);exit;
            $states = State::where("country_id",$request->country_id)->get();
            
            return response()->json($states);
        }

        public function getCityList(Request $request)
        {
            $cities = City::where("state_id",$request->state_id)->get();

            return response()->json($cities);
        }
}
