<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

    public function insert(Request $request)
    {
        // Validate inputs
        $request->validate([
            'ban_title' => 'required|string|max:255',
            'ban_subtitle' => 'nullable|string|max:255',
            'ban_button' => 'nullable|string|max:255',
            'ban_url' => 'nullable|url|max:255',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // max 2MB
        ]);

        $slug = "B".uniqid(50);
        $creator = Auth::user()->id;
        $imageName = null;

        // Handle image if uploaded
        if ($request->hasFile('pic')) { //'pic' is input field name
            $image = $request->file('pic');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('uploads/banner'), $imageName);
        }

        // Insert banner with image
        $insert = Banner::insertGetId([
            'ban_title' => $request->ban_title,
            'ban_subtitle' => $request->ban_subtitle,
            'ban_button' => $request->ban_button,
            'ban_url' => $request->ban_url,
            'ban_slug' => $slug,
            'ban_creator' => $creator,
            'ban_image' => $imageName, // col name 'ban_image'
            'created_at' => Carbon::now(),
        ]);

        if ($insert) {
            return redirect()->route('banner.all')->with('success', 'Banner added successfully');
        }
        return back()->with('error', 'Failed to add banner');
    }


    public function view($slug){
        $data = Banner::where('ban_status', 1)->where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.view', compact('data'));
    }


    public function edit($slug){
        $data = Banner::where('ban_status', 1)->where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.edit', compact('data'));
    }


    public function update(Request $request, $slug){
        $id = $request['ban_id'];
        $ban_slug = $request['ban_slug'];
        $editor = Auth::user()->id;

        $request->validate([
            'ban_title' => 'required|string|max:255',
            'ban_subtitle' => 'nullable|string|max:255',
            'ban_button' => 'nullable|string|max:255',
            'ban_url' => 'nullable|url|max:255',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // max 2MB
        ]);

        // get existing banner info
        $banner = Banner::where('ban_status', 1)
            ->where('ban_slug', $slug)
            ->firstOrFail();
        // keep old image by default
        $imageName = $banner->ban_image;

        // Handle image if uploaded
        if ($request->hasFile('pic')) { //'pic' is input field name
            // delete old image if exists
            if ($banner->ban_image && file_exists(public_path('uploads/banner/' . $banner->ban_image))) {
                unlink(public_path('uploads/banner/' . $banner->ban_image));
            }
            $image = $request->file('pic');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('uploads/banner'), $imageName);
        }

        // Insert banner with image
        $update = Banner::where('ban_status', 1)->where('ban_id', $id)->update([
            'ban_title' => $request->ban_title,
            'ban_subtitle' => $request->ban_subtitle,
            'ban_button' => $request->ban_button,
            'ban_url' => $request->ban_url,
            'ban_editor' => $editor,
            'ban_image' => $imageName, // col name 'ban_image'
            'created_at' => Carbon::now(),
        ]);

        if ($update) {
            return redirect()->route('banner.all')->with('success', 'Banner added successfully');
        }

        return back()->with('error', 'Failed to add banner');
    }


    public function softDelete($id){
        $soft = Banner::where('ban_status', 1)->where('ban_id', $id)->update([
            'ban_status'=>0
        ]);

        if($soft){
            return redirect()->route('banner.all')->with('success','Banner Deleted Successfully');
        }else {
            return back();
        }
    }

}
