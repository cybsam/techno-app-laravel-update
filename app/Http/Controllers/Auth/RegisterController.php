<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>['required','string','min:5','max:50'],
            'username'=>['required','unique:users','min:5','max:50'],
            'email'=>['required','email','unique:users','string'],
            'password'=>['required','string','confirmed','min:6'],
            // 'user_image'=>['required','mimes:jpg,jped,png,ico,gif','max:3000']
        ],[
            'name.required'=>'What is your name?',
            'username.required'=>'please type your user name!',
            // 'user_image.required'=>'please upload your image '
        ]);

        $input = $request->all();
        

        if ($input['checkbox'] == 'checkbox') {
            if($request->hasFile('user_image')){
                $user_name = Str::slug($input['name']);
                $users_image = $request->file('user_image');
                $randstr = Carbon::now()->format('Y-m-d-H-i-s-u');
                $new_image_name = $user_name.'-'.$randstr.'.'.$users_image->getClientOriginalExtension();

                $user = new User();
                $user->name = $input['name'];
                $user->username = Str::lower($input['username']);
                $user->email = $input['email'];
                $user->user_image = $new_image_name;
                $user->password = Hash::make($input['password']);
                $user->role = 'user';
                $user->role_int = '0';
                $user->source = 'register';
                $saveInfo = $user->save();
                $lastId = $user->id;
                
                $uploadLocation = base_path('public/image/users/'.$new_image_name);
                Image::make($users_image)->save($uploadLocation);
                
                $token = $lastId.hash('sha256',\Str::random(120));
                $verifyUrl = route('user.verify',['token'=>$token, 'service'=>'Email verification','from'=>'techno','sender'=>'cybsam','lang'=>'english']);

                VerifyUser::create([
                    'user_id'=>$lastId,
                    'user_email'=>$input['email'],
                    'token'=>$token
                ]);


                $formEmail = 'noreplay@technoapogee.com';
                $formName = 'Techno Apogee Limited Authentication';
                $message = "Dear <b>".$request->name.'</b>.<hr>';
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
                

                

                if($saveInfo){
                    return redirect()->back()->with('regSucc','You need to verify your account, we have sent you an activition link, please check your email.');
                }else{
                    return redirect()->back()->with('regError', 'Something went wrong, please try again!');
                }
            }else{
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
                $user->source = 'register';
                $saveInfo = $user->save();
                $lastId = $user->id;
                
                $uploadLocation = base_path('public/image/users/'.$newImageFromDefault);
                // File::copy($defaultImageLocation)
                Image::make($defaultImageLocation)->save($uploadLocation);

                $token = $lastId.hash('sha256',\Str::random(120));
                $verifyUrl = route('user.verify',['token'=>$token,'service'=>'Email Verification','from'=>'techno','sender'=>'cybsam','lang'=>'english']);

                VerifyUser::create([
                    'user_id'=>$lastId,
                    'user_email'=>$input['email'],
                    'token'=>$token
                ]);

                $formEmail = 'noreplay@technoapogee.com';
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

                

                if($saveInfo){
                    return redirect()->back()->with('regSucc','You need to verify your account, we have sent you an activition link, please check your email.');
                }else{
                    return redirect()->back()->with('regError', 'Something went wrong, please try again!');
                }
            }
        }else{
            return redirect()->back()->with('regError','whoops, OverSmart!');
        }
    }

    public function verify(Request $request){
        $token = $request->token;
        $verifyUser = VerifyUser::where('token',$token)->first();
        if(!is_null($verifyUser)){
            $user = $verifyUser->user;
            if(!$user->email_verified){
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();
                return redirect()->route('login')->with('succ','Your Email is verified successfully. You can login')->with('verifyedEmail',$user->email);
            }else{
                return redirect()->route('login')->with('succ','Your Email address already verified!, please login!')->with('verifyedEmail',$user->email);
            }
        }
    }
}
