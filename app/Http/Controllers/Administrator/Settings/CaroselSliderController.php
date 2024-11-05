<?php

namespace App\Http\Controllers\Administrator\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Image;
use Mail;
use App\Models\SettingCaroseSlider;

class CaroselSliderController extends Controller
{
    public function frontSliderImage(){
        $caroselImagedata = SettingCaroseSlider::all()->reverse();
        $caroselImageActiveData = SettingCaroseSlider::where('is_active',1)->get();
        if ($caroselImagedata) {
            return view('dashboard.settings.front-slider.index',[
                'caroselImageData'=>$caroselImagedata,
                'caroselImageActiveData'=>$caroselImageActiveData
            ]);
        }else {
            abort(403);
        }
        
    }

    public function frontSliderInsert(){
        return view('dashboard.settings.front-slider.insert');
    }

    public function frontSliderInsertSave(Request $request){
        $request->validate([
            'image'=>['required','mimes:png,jpg,PNG,JPG'],
            'typeofimage'=>['required']
        ]);

        if ($request->hasFile('image')) {
            $getImg = $request->file('image');
            $str = Carbon::now()->format('Y-m-d-H-i-s-u');
            $slugName = Str::slug($request->typeofimage);
            $imageName = $slugName.'-'.$str.'.'.$getImg->getClientOriginalExtension();
            $imgLocation = base_path('public/image/carosel-slider/'.$imageName);
            Image::make($getImg)->resize(1120,501)->save($imgLocation);

            $dataIns = new SettingCaroseSlider();
            $dataIns->imagename = $imageName;
            $dataIns->added_by = Auth::user()->name;
            $dataIns->is_active = '0';
            $saveData = $dataIns->save();
            if ($saveData) {
                return redirect()->route('SupUser.FrontSliderImage')->with('updateDone','check now!');
            }else {
                return redirect()->back()->with('somethingW','something went wrong!');
            }
        }else {
            return redirect()->back()->with('somethingW','something went wrong!');
        }

        
    }

    
    

    public function frontSliderImageActive(Request $request, $carosel_id){
        $caroselId = $carosel_id;
        
        $value = '1';
        $updateInfo = SettingCaroseSlider::where('id',$caroselId)->update([
            'is_active'=>$value
        ]);
        if ($updateInfo) {
            return redirect()->back()->with('updateDone','Carosel Activate Done!');
        }else {
            return redirect()->back()->with('updateError','Something went wrong!');
        }

    }

    public function frontSliderImageDeactive(Request $request, $carosel_id){
        $caroselId = $carosel_id;
        
        $value ='0';
        $updateInfo = SettingCaroseSlider::where('id',$caroselId)->update([
            'is_active'=>$value
        ]);
        if ($updateInfo) {
            return redirect()->back()->with('updateDone','Carosel Deactivate Done!');
        }else {
            return redirect()->back()->with('updateError','Something went wrong!');
        }
    }

    public function frontSliderDelete(Request $request, $carosel_id){
        $caroselId = $carosel_id;
        $updateInfo = SettingCaroseSlider::where('id',$caroselId)->first();
        if ($updateInfo) {
            $imageInfo = $updateInfo->imagename;
            $imagePath = base_path('public/image/carosel-slider/'.$imageInfo);
            unlink($imagePath);
            $deleteInfo = $updateInfo->delete();
            if ($deleteInfo) {
                return redirect()->back()->with('updateDone','Image Delete Done!');
            }else {
                return redirect()->back()->with('updateError','Something went wrong!');
            }
        }else {
            abort(403);
        }
        
    }
}
