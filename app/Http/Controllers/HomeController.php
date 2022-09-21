<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Portfolio;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function AllSlides() {
        $allSlides     = Slider::latest()->paginate(3);
        return view('admin.slider.slider',compact('allSlides'));
    }

    public function AddSlide(Request $request)
    {
        return view('admin.slider.create');
    }

    public function StoreSlide(Request $request)
    {
        $validated = $request->validate([
            'slideImage' => 'required|mimes:jpg,jpeg,png,jfif',
        ]);
        $slide_image = $request->file('slideImage');
        $name_gen    = hexdec(uniqid()).'.'.$slide_image->getClientOriginalExtension();
        Image::make($slide_image)->resize(1920,1080)->save('image/slide/'.$name_gen);
        $last_image  = 'image/slide/'.$name_gen;
        // Eloquent ORM
        $data = array();
        $data["title"]       = $request->slideTitle;
        $data["description"] = $request->slideDescription;
        $data["image"]       = $last_image;
        DB::table('sliders')->insert($data);

        return redirect()->route('home.slider')->with('success','Slide Added Successfully');
    }

    public function Edit($id) {
        //DB Query Builder
        $editSlideData = DB::table('sliders')->where('id',$id)->first();

        return view('admin.slider.edit',compact('editSlideData'));
    }

    public function Update(Request $request,$id) {
        $old_image = $request->old_image;
        //DB Query Builder
        $slide_image = $request->file('slideImage');
        if($slide_image) {
            $name_gen    = hexdec(uniqid()).'.'.$slide_image->getClientOriginalExtension();
            Image::make($slide_image)->resize(1920,1080)->save('image/slide/'.$name_gen);
            $last_image  = 'image/slide/'.$name_gen;

            unlink($old_image);

            $data = array();
            $data["title"]       = $request->slideTitle;
            $data["description"] = $request->slideDescription;
            $data["image"]       = $last_image;
            DB::table('sliders')->where('id',$id)->update($data);

            return redirect()->route('home.slider')->with('success','Slide Updated Successfully');
        } else {
            $data = array();
            $data["title"]       = $request->slideTitle;
            $data["description"] = $request->slideDescription;
            DB::table('sliders')->where('id',$id)->update($data);

            return redirect()->route('home.slider')->with('success','Slide Updated Successfully');
        }
    }

    public function Delete($id) {
        //Eloquent ORM
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        $deleteBrand = Slider::find($id)->delete();

        return redirect()->back()->with('success','Slide Deleted Successfully');
    }

    //Landing Portfolio Page
    public function HomePortfolio() {
        $homepageportfolio = DB::table('portfolios')->get();
        return view('admin.pages.portfolio',compact('homepageportfolio'));
    }

    //Landing Contact Page
    public function HomeContact() {
        $homepagecontacts = DB::table('contacts')->first();
        return view('admin.pages.contact',compact('homepagecontacts'));
    }

    // Contact Form
    public function ContactForm(Request $request)
    {
        $data = array();
        $data["name"]    = $request->applicantname;
        $data["email"]   = $request->applicantemail;
        $data["subject"] = $request->applicantsubject;
        $data["message"] = $request->applicantmessage;
        DB::table('contact_forms')->insert($data);

        return redirect()->route('contact')->with('success','Your message submitted Successfully');
    }
}
