<?php

namespace App\Http\Controllers;

use App\City;
use App\Like;
use App\Post;
use App\Comment;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
    * Display a listing of the city name.
    *
    * @return \Illuminate\Http\Response
    */
    public function citesName()
    {
        return City::all();
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function getPostByCity(Request $request,$city_id)
    {
        $citId= City::find($city_id);
        $distance = 50;
        $latitude     = $citId->latitude;
        $longitude    = $citId->longitude;
        $data = Post::where(['latitude'=>$latitude,'longitude'=>$longitude])->where('latitude', 'like', $latitude.'%')->orWhere('longitude', 'like', $longitude.'%')->withCount('likes','comments')->paginate(5);
        
        if($data){
            return $data;
        }else{
            return response([
                'status'  => 'Error',
                'message' =>trans('messages.cityNameError')
                ]);
            }
        }
        
        /**
        * Get nearest city name
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function cityName(Request $request)
        {  
            $data = array();
            $current_user = Auth::user();		
            $user_id      = $current_user->id;
            $keySearch = $request->post_text;
            $distance = 50;
            $latitude     = $request->latitude;
            $longitude    = $request->longitude;
            $loginUserid = Auth::user()->id;
            $data['total_likes']        = Like::where('user_id', $loginUserid)->get()->count();
            $data['total_comments']     = Comment::where('user_id', $loginUserid)->get()->count();
            $data['total_favorite']     = Favorite::where('user_id', $loginUserid)->get()->count();
            $data['toal_secrets']       = Post::where('user_id', $loginUserid)->get();
            
            $data['nearby_city_name']          = City::where([
                ['latitude',  '!=', $latitude],
                ['longitude', '!=', $longitude]
                ])->selectRaw(DB::raw('id,city_name, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance'))
                ->having('distance', '<', $distance)
                ->orderBy('distance')->get();
                
                if($data){
                    return $data;
                }else{
                    return response([
                        'status'  => 'Error',
                        'message' =>trans('messages.cityNameError')
                        ]);
                    }
                }
                
        public function nearByCityName(Request $request)
        {  
            
        //    $r= City::where('latitude',  '=', $request->latitude)->where('longitude', '=', $request->longitude)->get();
        //     $distance = $r[0]->city_radius;
            
            $distance = 50;
            $latitude     = $request->latitude;
            $longitude    = $request->longitude;
            
            $data = City::where([
                ['latitude',  '!=', $latitude],
                ['longitude', '!=', $longitude]
                ])->selectRaw(DB::raw('id,city_name,city_radius, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance'))
                ->having('distance', '<', $distance)
                ->orderBy('distance')->get();
                
                if($data){
                    return $data;
                }else{
                    
                    return response([
                        'status'  => 'Error',
                        'message' =>trans('messages.cityNameError')
                        ]);
                    }
                }  
            }
            
