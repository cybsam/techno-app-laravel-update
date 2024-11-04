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

    public function expertiseUpdate(Request $request, $exper_id){
        $expertId = $exper_id;
        $fetchExpertData = Expertise::where('id',$expertId)->first();
        if ($fetchExpertData) {
            return view('dashboard.about-us.our-expertise.update',[
                'fetchExpertData'=>$fetchExpertData
            ]);
        }else {
            about(403);
        }
    }

    public function expertiseUpdatePost(Request $request){
        // dd($request->all());
        $request->validate([
            'id'=>['required'],
            'expertise_name'=>['required','string'],
            'expertise_description'=>['required','string']
        ]);

        $updateData = Expertise::where('id',$request->input('id'))->update([
            'expertise_name'=>$request->input('expertise_name'),
            'expertise_description'=>$request->input('expertise_description')
        ]);

        if ($updateData) {
            return redirect()->back()->with('expertiseUpdSuc','Expertise update successfully!');
        }else {
            return redirect()->back()->with('expertiseUpdateFail','Expertise update failed!');
        }

    }

    public function expertiseDelete(Request $request, $exper_id){
        $expertId = $exper_id;
        $fetchExpertData = Expertise::where('id',$expertId)->delete();
        if ($fetchExpertData) {
            return redirect()->back()->with('expError','Expertise Delete successfully!');
        }else {
            return redirect()->back()->with('expSuccess','Something went wrong!');
        }
    }
}
