<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Image;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function index(){
        $all = Banner::where('ban_status', 1)->orderBy('ban_id', 'DESC')->get(); //take those banner where status = 1;
        return view('admin.banner.all', compact('all'));
    }

    public function create(){
        return view('admin.banner.add');
    }

    public function insert(Request $request){

        $slug = "B".uniqid(50);
        $creator = Auth::user()->id;

        $insert = Banner::insert([
            'ban_title' => $request['ban_title'],
            'ban_subtitle' => $request['ban_subtitle'],
            'ban_button' => $request['ban_button'],
            'ban_url' => $request['ban_url'],
            'ban_slug' => $slug,
            'ban_creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert.'_'.time().'_'.$image->getClientOriginalExtension();
            // Image::read($image)->save('uploads/banner/'.$imageName);
            
            Banner::where('ban_id'.$insert)->update([
                'ban_image'=>$imageName
            ]);

        }

        if($insert){
            return redirect()->route('banner.all')->with('success', 'banner added successfully');
        }else{
            return back();
        }
    }

    public function view($slug){
        $data = Banner::where('ban_status', 1)->where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.view', compact('data'));
    }

}
