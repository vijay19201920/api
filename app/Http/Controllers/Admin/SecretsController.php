<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SecretsController extends Controller
{
    /**
    * Show the all the secrets.
    * @method index
    * @return secrets
    */
    public function index(){
        
        $secrets = Post::orderBy('id','desc')->get();
        return view('admin.pages.secrets.secrets-list')->with('secrets',$secrets);
    }
    
    /**
    * Create the secrets form.
    * @method create
    * @return secrets
    */
    public function createSecretForm(){
        
        $cities = City::all();
        return view('admin.pages.secrets.secrets-create')->with(['cities'=>$cities]);
        
    }
    
    /**
    * Create the all the secrets.
    * @method createSecret
    * @return secrets
    */
    public function createSecret(Request $request){
        
        $request->validate([
            'post_text' => 'required',
            'post_image' =>'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city_name'  => 'required'
            ]);
            $city = explode(',',$request->city_name);
            $latitude = $city[0];
            $longitude = $city[1];
            
            $newImageName = null;
            $post = new Post;
            $post->post_text = $request->post_text;
            $post->color     = $request->color;
            $post->user_id   = Auth::user()->id;
            $post->latitude  = $latitude;
            $post->longitude = $longitude;
            
            if($request->hasFile('post_image')) {
                $imageName       = time().'.'.request()->post_image->getClientOriginalExtension();
                request()->post_image->move(public_path('images'), $imageName);
                $newImageName = 'images/'.$imageName;
            }
            $post->post_image = $newImageName;
            $post->save();
            
            return redirect('admin/secrets')->with('success', 'Record has been successfully created'); 
            
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            
            Post::where('id',$id)->delete();
            return redirect()->back()->with('success','Record has been successfully deleted');
        }
    }
