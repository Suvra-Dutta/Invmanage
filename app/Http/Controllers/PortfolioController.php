<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    public function AllPortfolio() {
        $portfolios = Portfolio::latest()->get();
        return view('admin.landing.portfolio',compact('portfolios'));
    }

    public function StorePortfolio(Request $request)
    {
        $portfolio_image = $request->file('portfolioImage');

        foreach($portfolio_image as $image) {
            $name_gen    = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('image/portfolio/'.$name_gen);
            $last_image  = 'image/portfolio/'.$name_gen;
            // Eloquent ORM
            $data = array();
            $data["image"] = $last_image;
            DB::table('portfolios')->insert($data);
        }
        return redirect()->route('home.portfolio')->with('success','Image Added Successfully');
    }
}
