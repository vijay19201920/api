<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LikeController;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SearchController extends Controller
{
    
    
    /**
    * filter is search post text.
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    
    public function filter(Request $request)
    {
        
        $keySearch = $request->post_text;
        $distance = 10000;
        $latitude     = $request->latitude;
        $longitude    = $request->longitude;
        
        $data = Post::selectRaw(DB::raw('id,user_id,post_text,post_image,color,created_at,updated_at, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance'))->where('post_text', 'LIKE', '%' .$keySearch. '%')
        ->having('distance', '<', $distance)
        ->orderBy('distance')
        ->get()->toArray();
        
        $raw_query =$this->paginateArray( $data );
        return $raw_query;
        
    }
    
    /**
    * pagination for post.
    * @param $data
    * @param $perPage default value 5
    * @return json
    */
    
    public function paginateArray($data, $perPage = 5)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        
        $results = array_slice($data, ($page-1) * $perPage, $perPage);
        
        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            ]);
        }
        
        
    }
    
