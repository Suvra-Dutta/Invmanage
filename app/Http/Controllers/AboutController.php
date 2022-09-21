<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function AllAbout() {
        $aboutUs     = HomeAbout::latest()->paginate(3);
        return view('admin.landing.about',compact('aboutUs'));
    }

    public function AddAbout(Request $request)
    {
        return view('admin.landing.createabout');
    }

    public function StoreAbout(Request $request)
    {
        // Eloquent ORM
        $data = array();
        $data["title"]      = $request->aboutTitle;
        $data["short_desc"] = $request->shortDescription;
        $data["long_desc"]  = $request->longDescription;
        DB::table('home_abouts')->insert($data);

        return redirect()->route('home.about')->with('success','About us Content Added Successfully');
    }

    public function Edit($id) {
        //DB Query Builder
        $editAboutData = DB::table('home_abouts')->where('id',$id)->first();

        return view('admin.landing.editabout',compact('editAboutData'));
    }

    public function Update(Request $request,$id) {
        //DB Query Builder
        $data = array();
        $data = array();
        $data["title"]      = $request->aboutTitle;
        $data["short_desc"] = $request->shortDescription;
        $data["long_desc"]  = $request->longDescription;
        DB::table('home_abouts')->where('id',$id)->update($data);

        return redirect()->route('home.about')->with('success','About us Content Updated Successfully');
    }

    public function Delete($id) {
        //Eloquent ORM
        $deleteBrand = HomeAbout::find($id)->delete();

        return redirect()->back()->with('success','About us Content Deleted Successfully');
    }
}
