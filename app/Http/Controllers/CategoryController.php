<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function AllCat() {
        //$allCategories = Category::all();

        // to get the latest entry first
        //$allCategories = Category::latest()->paginate(1);

        //to also get deleted categories
        $allCategories     = Category::latest()->paginate(1);
        $deletedCategories = Category::onlyTrashed()->latest()->paginate(1);

        //DB Query Builder
        //$allCategories = DB::table('categories')->latest()->get();
        //$allCategories = DB::table('categories')->latest()->paginate(1);

        //DB Query Join table
        /*$allCategories =    DB::table('categories')
                            ->join('users','categories.user_id','users.id')
                            ->select('categories.*','users.name')
                            ->latest()->paginate(1);
        */

        //return view('admin.category.index',compact('allCategories'));
        return view('admin.category.index',compact('allCategories','deletedCategories'));
    }

    public function AddCat(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        // Eloquent ORM
        /*$category = Category::create([
            'user_id'       => Auth::user()->id,
            'category_name' => $request->category_name,
            'created_at'    => Carbon::now(),
        ]);*/

        $category = new Category;
        $category->user_id = Auth::user()->id;
        $category->category_name = $request->input('category_name');
        $category->save();
        return redirect()->back()->with('success','Category Added Successfully');

        /* DB Query Builder
        $user_id = Auth::user()->id;
        $category_name = $request->input('category_name');
        $data=array("user_id"=>$user_id,"category_name"=>$category_name);
        $query = DB::table('categories')->insert($data); */
    }

    public function Edit($id) {
        //Eloquent ORM
        //$editCategoryData = Category::find($id);

        //DB Query Builder
        $editCategoryData = DB::table('categories')->where('id',$id)->first();

        return view('admin.category.edit',compact('editCategoryData'));
    }

    public function Update(Request $request,$id) {
        /*Eloquent ORM
        $updateCategoryData = Category::find($id)->update([
            'category_name' =>$request->category_name,
            'user_id' => Auth::user()->id
        ]);*/

        //DB Query Builder
        $data = array();
        $data["category_name"] = $request->category_name;
        $data["user_id"] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

        return redirect()->route('all.category')->with('success','Category Updated Successfully');
    }

    public function Delete($id) {
        //Eloquent ORM
        $deleteCategory = Category::find($id)->delete();

        return redirect()->back()->with('success','Category Deleted Successfully');
    }

    public function Restore($id) {
        //Eloquent ORM
        $restoreCategory = Category::withTrashed()->where('id', $id)->restore();

        return redirect()->back()->with('success','Category Restored Successfully');
    }

    public function DeleteForever($id) {
        //Eloquent ORM
        $foreverDeleteCategory = Category::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success','Category Deleted Permanently');
    }
}
