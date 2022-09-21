<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function AllBrand() {
        //$allBrands = Brand::all();

        // to get the latest entry first
        $allBrands = Brand::latest()->paginate(4);

        //DB Query Builder
        //$allBrands = DB::table('brands')->latest()->get();
        //$allBrands = DB::table('brands')->latest()->paginate(1);

        return view('admin.brand.brand',compact('allBrands'));
    }

    public function AddBrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name'  => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png,jfif',
        ]);
        $brand_image = $request->file('brand_image');
        $name_gen    = hexdec(uniqid());
        $image_ext   = strtolower($brand_image->getClientOriginalExtension());
        $image_name  = $name_gen.'.'.$image_ext;
        $up_location = 'image/brand/';
        $last_image  = $up_location.$image_name;
        $brand_image->move($up_location,$image_name);
        // Eloquent ORM
        $brand = new Brand;
        $brand->brand_name  = $request->input('brand_name');
        $brand->brand_image = $last_image;
        $brand->save();
        //return redirect()->back()->with('success','Brand Added Successfully');

        $notification = array(
            'message'    => 'Brand Created Successfully',
            'álert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Edit($id) {
        //DB Query Builder
        $editBrandData = DB::table('brands')->where('id',$id)->first();

        return view('admin.brand.edit',compact('editBrandData'));
    }

    public function Update(Request $request,$id) {
        $validated = $request->validate([
            'brand_name'  => 'required|min:4',
        ]);
        $old_image = $request->old_image;
        //DB Query Builder
        $brand_image = $request->file('brand_image');
        if($brand_image) {
            $name_gen    = hexdec(uniqid());
            $image_ext   = strtolower($brand_image->getClientOriginalExtension());
            $image_name  = $name_gen.'.'.$image_ext;
            $up_location = 'image/brand/';
            $last_image  = $up_location.$image_name;
            $brand_image->move($up_location,$image_name);

            unlink($old_image);
            /*Brand::find($id)->update([
                "brand_name"  => $request->brand_name,
                "brand_image" => $last_image
            ]);*/

            $data = array();
            $data["brand_name"]  = $request->brand_name;
            $data["brand_image"] = $last_image;
            DB::table('brands')->where('id',$id)->update($data);

            return redirect()->route('all.brand')->with('success','Brand Updated Successfully');
        } else {
            $data = array();
            $data["brand_name"]  = $request->brand_name;
            DB::table('brands')->where('id',$id)->update($data);

            return redirect()->route('all.brand')->with('success','Brand Updated Successfully');
        }
    }

    public function Delete($id) {
        //Eloquent ORM
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        $deleteBrand = Brand::find($id)->delete();

        return redirect()->back()->with('success','Brand Deleted Successfully');
    }

    public function Logout() {
        Auth::logout();

        return redirect()->route('login')->with('success','You have logged out');
    }
}
