<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\VerifyUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Image;
use Mail;
use App\Models\DeleteUserListAd;



class UsersController extends Controller
{
    public function index(){
        $listAllUsers = User::all()->reverse();
        $users = User::where('role_int',0)->where('role','user')->where('is_active','1')->get()->reverse();
        $Admin = User::where('role_int',1)->where('role','admin')->where('is_active','1')->get()->reverse();

        return view('dashboard.users.index',[
            'users'=>$users,
            'Admin'=>$Admin,
            'listAllUsers'=>$listAllUsers
        ]);
    }


    //new user add from dashboard
    public function addNewUser(Request $request){
        
        $request->validate([
            'name'=>['required','string','min:5','max:50'],
            'username'=>['required','unique:users','min:5','max:50'],
            'email'=>['required','email','unique:users','string'],
            'password'=>['required','string','confirmed','min:6'],
        ]);

        $input = $request->all();
        $adminName = 'by-'.Auth::user()->username;
        $adminId = Auth::user()->id;

        $user_name = Str::slug($input['name']);
        $defaultImageLocation = base_path('public/image/defaultimage/userimage.png');
        $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
                
        $newImageFromDefault = $user_name.'-'.$randStr.'.png';

        $user = new User();
        $user->name = $input['name'];
        $user->username = Str::lower($input['username']);
        $user->email = $input['email'];
        $user->user_image = $newImageFromDefault;
        $user->password = Hash::make($input['password']);
        $user->role = 'user';
        $user->role_int = '0';
        $user->source = $adminName;
        $user->admin_id = $adminId;
        $saveInfo = $user->save();
        $lastId = $user->id;

        $token = $lastId.hash('sha256',\Str::random(120));
        $verifyUrl = route('user.verify',['token'=>$token,'service'=>'Email Verification','from'=>'techno','sender'=>'cybsam','lang'=>'english']);

        VerifyUser::create([
            'user_id'=>$lastId,
            'user_email'=>$input['email'],
            'token'=>$token
        ]);

        $formEmail = 'no-replay-tech@technoapogee.com';
        $formName = 'Techno Apogee Limited Authentication';
        $message = "Dear <b> ".$request->name."</b>.</br>";
        $message.= 'Thanks for signin up, we just need you to verify your email address to complete setting up your account.';
        $mail_data = [
            'recipient'=>$input['email'],
            'fromName'=>$formName,
            'fromEmail'=>$formEmail,
            'subject'=>"Authentication From Techno Apogee Engineering Limited",
            'body'=>$message,
            'actionLink'=>$verifyUrl,
        ];

        \Mail::send('mail.email-register-user', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromEmail'])
                    ->subject($mail_data['subject']);
            });

        $uploadLocation = base_path('public/image/users/'.$newImageFromDefault);
        // File::copy($defaultImageLocation)
        Image::make($defaultImageLocation)->save($uploadLocation);

        if($saveInfo){
            return redirect()->back()->with('regSuccAdmin','You need to verify user account, we have sent you an activition link, please check your email.');
        }else{
            return redirect()->back()->with('regErroradmin', 'Something went wrong, please try again!');
        }
    }

    //is active
    public function is_active(Request $request){
        $data = User::find($request->id);
        $data->is_active = $request->status;
        $data->save();
        return response()->json([
            'status'=>'success',
        ]);
    }

    public function softDeleteUser(Request $request){
        dd($request->all());
        $userId = $request->dlt_id;
        echo $userId;
    }

    // public function create(){

    // }
    public function updateUser(Request $request, $user_id, $user_name){
        // echo $user_id,$user_name;
        $userinfo = User::where('id',$user_id)->first();
        return view('dashboard.users.editUser',[
            'usersInfo'=>$userinfo
        ]);
    }

    public function updateUserSub(Request $request){
        // dd($request->all());
        // die();
        if ($request->hasFile('upd_image')) {
            $isImageFound = $request->file('upd_image');
            $request->validate([
                'upd_name'=>['required','string'],
                'upd_username'=>['required'],
                'upd_image'=>['required','mimes:jpg,jped,png,ico,gif','max:2048'],
                'user_id'=>['required'],
                
            ]);

            $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
            $newImageName = $request->upd_username.'-'.$randStr.'.'.$isImageFound->getClientOriginalExtension();
            $newImageLocation = base_path('public/image/users/'.$newImageName);

            $oldImageFromUser = User::where('id',$request->user_id)->first();
            $oldImageFromUserGet = $oldImageFromUser->user_image;
            $imageLocationOldImg = base_path('public/image/users/'.$oldImageFromUserGet);
            unlink($imageLocationOldImg);

            Image::make($isImageFound)->save($newImageLocation);

            $userRole = explode('.',$request->user_role);

            if(!empty($request->upd_pass)){
                $request->validate([
                    'upd_pass'=>['required','min:8']
                ]);
                $passwordHash = Hash::make($request->upd_pass);
                $userUpdate = User::where('id',$request->user_id)->update([
                    'name'=>$request->input('upd_name'),
                    'username'=>$request->input('upd_username'),
                    'user_image'=>$newImageName,
                    'role_int'=>$userRole[0],
                    'role'=>$userRole[1],
                    'is_active'=>$request->input('is_active'),
                    'email_verified'=>$request->input('email_verify'),
                    'password'=>$passwordHash,
                    'source'=>Auth::user()->name,
                    'admin_id'=>Auth::user()->id,
                ]);
                if($userUpdate){
                    return redirect()->back()->with('adminuserupdate','User update complete');
                }else{
                    return redirect()->back()->with('adminuserupdateerr','Something went wrong!');
                }
            }else {
                $userUpdate = User::where('id',$request->user_id)->update([
                    'name'=>$request->input('upd_name'),
                    'username'=>$request->input('upd_username'),
                    'user_image'=>$newImageName,
                    'role_int'=>$userRole[0],
                    'role'=>$userRole[1],
                    'is_active'=>$request->input('is_active'),
                    'email_verified'=>$request->input('email_verify'),
                    'source'=>Auth::user()->name,
                    'admin_id'=>Auth::user()->id,
                ]);
                if($userUpdate){
                    return redirect()->back()->with('adminuserupdate','User update complete');
                }else{
                    return redirect()->back()->with('adminuserupdateerr','Something went wrong!');
                }
            }
        }else {
            $request->validate([
                'upd_name'=>['required','string'],
                'upd_username'=>['required'],
                'user_id'=>['required'],
            ]);
            $userRole = explode('.',$request->user_role);
            $userUpdate = User::where('id',$request->user_id)->update([
                'name'=>$request->input('upd_name'),
                'username'=>$request->input('upd_username'),
                'role_int'=>$userRole[0],
                'role'=>$userRole[1],
                'is_active'=>$request->input('is_active'),
                'email_verified'=>$request->input('email_verify'),
                'source'=>Auth::user()->name,
                'admin_id'=>Auth::user()->id,
            ]);
            if($userUpdate){
                return redirect()->back()->with('adminuserupdate','User update complete');
            }else{
                return redirect()->back()->with('adminuserupdateerr','Something went wrong!');
            }
        }
    }
    
    public function UsersSoftDel(Request $request, $user_id){
        $userId = $user_id;
        $value = 0;
        $softDelete = User::where('id',$request->user_id)->update([
            'is_active'=>$value
        ]);
        if ($softDelete) {
            return redirect()->back()->with('regSuccAdmin','Users Archive done, check archive folder!');
        }else {
            return redirect()->back()->with('regErroradmin','Something went wrong!');
        }
    }

    public function archiveList(){
        $value = 0;
        $archiveData = User::where('is_active',$value)->get()->reverse();

        if ($archiveData) {
            return view('dashboard.users.archive',[
                'archiveData'=>$archiveData
            ]);
        }else{
            abort(403);
        }
    }

    public function usersRestore(Request $request, $user_id){
        $userId = $user_id;
        $value = 1;
        $softDelete = User::where('id',$request->user_id)->update([
            'is_active'=>$value
        ]);
        if ($softDelete) {
            return redirect()->back()->with('restoreUsers','Users restore done, check!');
        }else {
            return redirect()->back()->with('restoreProblem','Something went wrong!');
        }
    }
}
