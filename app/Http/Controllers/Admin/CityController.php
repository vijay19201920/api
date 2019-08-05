<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $page_title = 'City Page';
        $cities = City::all();
        return view('admin.pages.city')->with(['cities'=>$cities,'page_title'=>$page_title]);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
       
        return view('admin.pages.city-create')->with('page_title');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'city_name' =>"required|unique:cities",
            'latitude' => 'required',
            'longitude' =>'required',
            ]);
            $city = new City;
            $city->city_name = $request->city_name;
            $city->city_radius = $request->city_radius;
            $city->latitude = $request->latitude;
            $city->longitude = $request->longitude;
            $city->save();
            return redirect('admin/city')->with('success', 'Record has been successfully created'); 
        }
        
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {  
            $page_title = 'Edit City';
            $cities = City::where('id',$id)->first();
            return view('admin.pages.city-edit')->with(['cities'=>$cities,'page_title'=>$page_title]);
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
            $validatedData = $request->validate([
                'city_name' =>'required',
                'latitude' => 'required',
                'longitude' =>'required',
                ]);
                
                $city =  City::find($id);
                $city->city_name = $request->city_name;
                $city->latitude = $request->latitude;
                $city->longitude = $request->longitude;
                $city->save();
                return redirect()->route('city.index')->with('success', 'Record has been successfully updated');
                
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy($id)
            { 
                City::where('id',$id)->delete();
                return redirect()->back()->with('success','Record has been successfully deleted');
            }
        }
