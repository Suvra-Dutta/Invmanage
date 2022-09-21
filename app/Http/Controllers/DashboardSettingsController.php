<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DashboardSettingsController extends Controller
{
    public function ChangePasswordForm() {
        return view('admin.body.dashboard_change_password');
    }

    public function UpdatePassword(Request $request) {
        $validated = $request->validate([
            'currentPassword' =>'required',
            'changePassword'  =>'required',
            'confirmPassword' =>'required',
        ]);

        $admin = Auth::user();
        if(!(Hash::check($request->currentPassword,$admin->password))) {
            return redirect()->route('password.changeform')->with('error','Password not Updated');
        }
        //$user = User::find(Auth::id());
        $admin->password = Hash::make($request->changePassword);
        $admin->save();
        Auth::logout();
        return redirect()->route('login')->with('success','Password Updated Successfully');
    }

    public function DashboardUserProfilePage() {
        $admin = Auth::user();
        if($admin) {
            $adminId = $admin->id;
            if($adminId) {
                return view('admin.body.dashboard_user_profile',compact('admin'));
            }
        }
    }

    public function UpdateDashboardUserProfile(Request $request) {
        $old_userimage = $request->old_userimage;
        $profile_pic   = $request->file('loggedUserImage');

        $admin   = Auth::user();
        $adminId = $admin->id;
        if($adminId) {
            if($profile_pic) {
                $name_gen    = hexdec(uniqid()).'.'.$profile_pic->getClientOriginalExtension();
                Image::make($profile_pic)->resize(200,200)->save('image/adminuser/'.$name_gen);
                $last_image  = 'image/adminuser/'.$name_gen;

                unlink($old_userimage);

                $admin->name               = $request['loggedUserName'];
                $admin->email              = $request['loggedUserEmail'];
                $admin->profile_photo_path = $last_image;

                $admin->save();
                return redirect()->route('dashboarduser.profile')->with('success','Details Updated Successfully');
            } else {
                $admin->name               = $request['loggedUserName'];
                $admin->email              = $request['loggedUserEmail'];
                $admin->save();

                return redirect()->route('dashboarduser.profile')->with('success','Details Updated Successfully');
            }
        }
    }
}
