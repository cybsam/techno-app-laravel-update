<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\AboutUsInformation;
use App\Models\AboutOurTeam;
use App\Models\FrontContact;
use App\Models\Project;
use App\Models\SettingCaroseSlider;

class DashboardController extends Controller
{
    public function index(){
        return view('dash-user.dashboard');

    }

    public function contactStore(Request $request){
        $request->validate([
            'sender_name'=>['required'],
            'sender_number'=>['required','min:10','max:11'],
            'sender_subject'=>['required'],
            'sender_email'=>['required', 'email'],
            'sender_message'=>['required'],
        ]);

        $input = $request->all();

        $insMsg = new FrontContact();
        $insMsg->sender_name = $input['sender_name'];
        $insMsg->sender_number = $input['sender_number'];
        $insMsg->sender_email = $input['sender_email'];
        $insMsg->sender_subject = $input['sender_subject'];
        $insMsg->sender_message = $input['sender_message'];
        $insMsg->sender_ip = \Request::ip();
        $saveMsg = $insMsg->save();
        if($saveMsg){
            return redirect()->back()->with('succFrontEnd','Thanks for you message us, we will contact as soon as possible!');
        }else{
            return redirect()->back()->with('errFrontEnd','Something went wrong!, try again');
        }

    }

    public function activity(Request $request){
        return "alert to this users";
    }

    public function updateUsers(){


        return "update to this user";

    }
}
