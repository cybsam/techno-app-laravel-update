<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\FrontContact;
use App\Models\ProductService;

class DashboardController extends Controller
{
    public function index(){
        $CountAllUser = User::all()->count();
        $fetchProductAndServiceLit = ProductService::where('is_active','1')->get();
        return view('dashboard.index',[
            'CountAllUser'=>$CountAllUser,
            'fetchProductAndServiceLit'=>$fetchProductAndServiceLit,
        ]);
    }


    public function UserProfile(){
        return view('dashboard.profile');
    }

    //profile update
    public function UserProfileUpdateNameImage(Request $request){
        $userImage = $request->file('profileImageUpload');
        
        if($request->hasFile('profileImageUpload')){
            $request->validate([
                'changeFullName'=>['required','string'],
                'profileImageUpload'=>['required','mimes:jpg,jped,png,ico,gif','max:2048']
            ]);
            
            $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
            $newImageName = Auth::user()->username.'-'.$randStr.'.'.$userImage->getClientOriginalExtension();
            $NewImageLocation = base_path('public/image/users/'.$newImageName);

            $oldUserImage = Auth::user()->user_image;
            $imageLocation = base_path('public/image/users/'.$oldUserImage);
            unlink($imageLocation);

            Image::make($userImage)->save($NewImageLocation);

            $userUpdate = User::where('id',Auth::user()->id)->update([
                'name'=>$request->input('changeFullName'),
                'user_image'=>$newImageName,
            ]);
            if($userUpdate){
                return redirect()->back()->with('userProfileUpdateDone','User Profile Update Done');
            }else{
                return redirect()->back()->with('userProfileUpdateError','Something went wrong!');
            }
        }else{
            $request->validate([
                'changeFullName'=>['required','string'],
            ]);
            $userUpdate = User::where('id',Auth::user()->id)->update([
                'name'=>$request->input('changeFullName'),
            ]);
            if($userUpdate){
                return redirect()->back()->with('userProfileUpdateDone','User Profile Update Done');
            }else{
                return redirect()->back()->with('userProfileUpdateError','Something went wrong!');
            }
        }
    }

    public function UserProfileUpdatePassword(Request $request){
        $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required',
        ]);

        if($request->input('oldpassword') == $request->input('password')){
            return redirect()->back()->with('userProfileUpdateError','Your Old password is not bd your current password!');
        }else{
            $oldPasswordFromuser = $request->input('oldpassword');
            $newPasswordFromUser = $request->input('password');

            $passwordFromDatabase = Auth::user()->password;

            if(Hash::check($oldPasswordFromuser,$passwordFromDatabase)){
                User::find(Auth::user()->id)->update([
                    'password' => Hash::make($newPasswordFromUser)
                ]);
                return redirect()->back()->with('userProfileUpdateDone','Your Password Update Succesfully...');
            }else{
                return back()->withErrors("Password:- Your old password is not correct, please try again.");
            }

        }
    }

    public function VisitWebSite(){
        return redirect()->route('frontEndIndex');
    }

    public function blank(){
        return view('dashboard.blank');
    }

    public function ContactFrontEnd(){
        $showContact = FrontContact::all()->reverse();
        return view('dashboard.contact.index',[
            'showContact'=>$showContact,
        ]);
    }
    public function ContactFrontEndShow(Request $request, $id){
        $cntId = $id;
        $updateFrontContact = FrontContact::where('id',$cntId)->update([
            'is_seen'=>1
        ]);
        $getData = FrontContact::where('id',$cntId)->first();
        return view('dashboard.contact.view',[
            'getData'=>$getData,
        ]);
    }

    public function contactFrontDelete(Request $request, $id){
        $id = $id;
        $deleteMsg = FrontContact::where('id',$id)->delete();
        if ($deleteMsg) {
            return redirect()->route('supUser.FrontEndContact')->with('msgDltDone','Message Delete Done!');
        }else{
            return redirect()->route('supUser.FrontEndContact')->with('msgDltErr','Something went wrong!');
        }
    }

    
    
    public function cybsamdevShuvo(){
        return view('dashboard.cybsamdev.index');
    }
}
