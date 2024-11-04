<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expertise;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

class ExpertiseController extends Controller
{
    public function expertiseIndex(){
        $fetchData = Expertise::all();
        return view('dashboard.about-us.our-expertise.index',['fetchData'=>$fetchData]);
    }

    public function expertiseStore(Request $request){
        $request->validate([
            'expertise_name'=>['required','string'],
            'expertise_description'=>['required'],
        ]);

        $insData = Expertise::create([
            'expertise_name'=>$request->expertise_name,
            'expertise_description'=>$request->expertise_description,
            'added_by'=>Auth::user()->id.'-'.Auth::user()->name,
        ]);
        if($insData){
            return redirect()->back()->with('expSuccess','Expertise Insert Succss.');
        }else{
            return redirect()->back()->with('expError','Something went wrong!.');
        }
        
    }
}
