<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\EmployeeTeamCategory;
use App\Models\EmployeeTeamSubCategory;
use App\Models\AboutOurTeam;

class OurTeamController extends Controller
{
    public function index(){
        $empSectionCategory = EmployeeTeamCategory::all()->reverse();
        $empDeginationCategory = EmployeeTeamSubCategory::all()->reverse();
        $listMember = AboutOurTeam::all();
        return view('dashboard.about-us.our-team.index',[
            'empSectionCategory'=>$empSectionCategory,
            'empDeginationCategory'=>$empDeginationCategory,
            'listMember'=>$listMember,
        ]);
    }


    public function teamInsert(Request $request){
        $request->validate([
            'name'=>['required','string','unique:about_our_teams'],
            'department'=>['required'],
            'degination'=>['required'],
            'email'=>['required','unique:about_our_teams'],
            'mobile'=>['required','unique:about_our_teams','min:11','max:11'],
            'whatsapp'=>['required','unique:about_our_teams','min:11','max:11'],
            'image'=>['required','mimes:jpg,jped,png,ico,gif','max:3000']
        ]);
        
        $input = $request->all();
        $departmentExplode = explode('.',$input['department']);
        $deginationEplode = explode('.',$input['degination']);

        if($input['department'] == '0' || $input['degination'] == '0'){
            return redirect()->back()->with('validerr','Department or Degination is missing!');
        }else{
            if($request->hasFile('image')){
                $nameStr = Str::slug($input['name']);
                $deginaStr = Str::slug($deginationEplode[1]);
                $inpImage = $request->file('image');
                $randstr = Carbon::now()->format('Y-m-d-H-i-s-u');
                $imageNameNew = $nameStr.'-'.$deginaStr.'-'.$randstr.'.'.$inpImage->getClientOriginalExtension();
                $storeLocation = base_path('public/image/about-us/our-team/'.$imageNameNew);
                Image::make($inpImage)->resize(310,310)->save($storeLocation);

                $insertDataDB = new AboutOurTeam();
                $insertDataDB->name = $input['name'];
                $insertDataDB->department = $departmentExplode[1];
                $insertDataDB->degination = $deginationEplode[1];
                $insertDataDB->email = $input['email'];
                $insertDataDB->mobile = $input['mobile'];
                $insertDataDB->whatsapp = $input['whatsapp'];
                $insertDataDB->image = $imageNameNew;
                $insertDataDB->add_by = Auth::user()->name;
                $insertDataDB->user_id = Auth::user()->id;
                $insertDataDBSave = $insertDataDB->save();
                if($insertDataDBSave){
                    return redirect()->back()->with('succ','successfully');
                }else{
                    return redirect()->back()->with('validerr','something went wrong,');
                }
            }
        }

    }


    public function TeamManagement(){
        $getData = EmployeeTeamCategory::all()->reverse();
        
        return view('dashboard.settings.team-management.team-category',[
            'getData'=>$getData,
            
        ]);
    }
    public function TeamManagementIns(Request $request){
        $request->validate([
            'team_department_slug' => ['required','unique:employee_team_categories']
        ]);

        $input = $request->all();
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $slug = Str::slug($input['team_department_slug']);

        $inpData = new EmployeeTeamCategory();
        $inpData->team_department = $input['team_department_slug'];
        $inpData->team_department_slug = $slug;
        $inpData->add_by = $userName;
        $inpData->user_id = $userId;
        $save = $inpData->save();

        if($save){
            return redirect()->back()->with('succ','Insert Successfully');
        }else{
            return redirect()->back()->with('err','Something went wrong!');
        }

    }
    public function TeamManagementDegination(){
        $getData = EmployeeTeamCategory::all()->reverse();
        $allTeam = EmployeeTeamSubCategory::all()->reverse();
        return view('dashboard.settings.team-management.team-sub-category',[
            'allTeam'=>$allTeam,
            'getData'=>$getData,
        ]);
    }
    public function TeamManagementDeginationInsert(Request $request){
        
        $request->validate([
            'team_department_sub_slug'=>['required','unique:employee_team_sub_categories'],
        ]);

        $input = $request->all();
        $slug = Str::slug($input['team_department_sub_slug']);
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;

        $fetchData = explode('.',$input['manegement-team']);

        $getDataFromDb = EmployeeTeamCategory::where('id',$fetchData[0])->where('team_department_slug',$fetchData[1])->first();
        if ($getDataFromDb) {
            $db_slug = $getDataFromDb->team_department_slug;
            $db_id = $getDataFromDb->id;
            $insData = new EmployeeTeamSubCategory();
            $insData->team_department_sub = $input['team_department_sub_slug'];
            $insData->team_department_sub_slug = $slug;
            $insData->team_department_id = $fetchData[0];
            $insData->team_department_slug = $fetchData[1];
            $insData->user_id = $userId;
            $insDataSave = $insData->save();
            if ($insDataSave) {
                return redirect()->back()->with('succ','insert successfully');
            }else {
                return redirect()->back()->with('err','Something went wrong!');
            }
        }else{
            return redirect()->back()->with('err','database not match!');
        }
        
    }

    public function teamUpdate(Request $request, $team_id){
        $team_id = $team_id;
        $findingMember = AboutOurTeam::where('id',$team_id)->first();
        $empSectionCategory = EmployeeTeamCategory::all()->reverse();
        $empDeginationCategory = EmployeeTeamSubCategory::all()->reverse();
        if($findingMember){
            return view('dashboard.about-us.our-team.update',[
                'membersInfor'=>$findingMember,
                'empSectionCategory'=>$empSectionCategory,
                'empDeginationCategory'=>$empDeginationCategory
            ]);
        }else {
            return redirect()->back()->with('validerr','team Member not found in our database!');
        }
    }

    public function teamUpdatePost(Request $request){
        
        $request->validate([
            'id'=>['required'],
            'name'=>['required','string'],
            'department'=>['required'],
            'degination'=>['required'],
            'email'=>['required'],
            'mobile'=>['required','min:11','max:11'],
            'whatsapp'=>['required','min:11','max:11'],
            'activeDeac'=>['required']
        ]);
        $usersDadta = AboutOurTeam::where('id',$request->id)->first();
        if ($request->hasFile('image')) {

            $inpImage = $request->file('image');
            $request->validate([
                'image'=>['required','mimes:jpg,jped,png,ico,gif','max:3000']
            ]);
            $nameStr = Str::slug($request->name);
            $deginaStr = Str::slug($request->degination);
            $randstr = Carbon::now()->format('Y-m-d-H-i-s-u');
            $imageNameNew = $nameStr.'-'.$deginaStr.'-'.$randstr.'.'.$inpImage->getClientOriginalExtension();

            
            $oldImage = base_path('public/image/about-us/our-team/'.$usersDadta->image);
            unlink($oldImage);

            $storeLocation = base_path('public/image/about-us/our-team/'.$imageNameNew);
            Image::make($inpImage)->resize(310,310)->save($storeLocation);
            $membersDataupdate = AboutOurTeam::where('id',$request->id)->update([
                'name'=>$request->input('name'),
                'department'=>$request->input('department'),
                'degination'=>$request->input('degination'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'whatsapp'=>$request->input('whatsapp'),
                'image'=>$imageNameNew,
                'is_active'=>$request->input('activeDeac'),
            ]);
            if ($membersDataupdate) {
                return redirect()->back()->with('membupdcom','Update Complete');
            }else{
                return redirect()->back()->with('memupderr','Something went wrong, try again');
            }
        }else {
            $membersDataupdate = AboutOurTeam::where('id',$request->id)->update([
                'name'=>$request->input('name'),
                'department'=>$request->input('department'),
                'degination'=>$request->input('degination'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'whatsapp'=>$request->input('whatsapp'),
                'is_active'=>$request->input('activeDeac'),
            ]);
            if ($membersDataupdate) {
                return redirect()->back()->with('membupdcom','Update Complete');
            }else{
                return redirect()->back()->with('memupderr','Something went wrong, try again');
            }
        }
    }

    public function teamDelete(Request $request, $team_id){
        $team_id = $team_id;
        $deleteImage = AboutOurTeam::where('id',$team_id)->first();
        $imageLocation = base_path('public/image/about-us/our-team/'.$deleteImage->image);
        unlink($imageLocation);

        $delete = AboutOurTeam::where('id',$team_id)->delete();
        if ($delete) {
            return redirect()->back()->with('validerr','Delete Complete');
        }else{
            return redirect()->back()->with('succ','Something went wrong, try again');
        }
    }

    public function teamActive(Request $request, $team_id){
        $value = '1';
        $team_id = $team_id;
        $updateTeamMember = AboutOurTeam::where('id',$team_id)->update([
            'is_active'=>$value
        ]);
        if ($updateTeamMember) {
            return redirect()->back()->with('succ','Activate Successfully!');
        }else{
            return redirect()->back()->with('validerr','Something went wrong, try again');
        }
    }
    
    public function teamDeactive(Request $request, $team_id){
        $value = '0';
        $team_id = $team_id;
        $updateTeamMember = AboutOurTeam::where('id',$team_id)->update([
            'is_active'=>$value
        ]);
        if ($updateTeamMember) {
            return redirect()->back()->with('succ','DeActive Successfully!');
        }else{
            return redirect()->back()->with('validerr','Something went wrong, try again');
        }
    }
}
