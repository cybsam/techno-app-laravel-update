<?php

namespace App\Http\Controllers\Administrator\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;

use Illuminate\Support\Str;
use App\Models\projectCategory;
use App\Models\Project;
use App\Models\ProjectMultipleImage;

class ProjectController extends Controller
{
    public function showProjectList(){
        $projectCategory = projectCategory::all();
        return view('dashboard.project.index',[
            'projectCategory'=>$projectCategory,
        ]);
    }

    public function ProjectInsert(Request $request){
        $request->validate([
            'project_name'=>['required'],
            'project_header_image'=>['required','mimes:jpg,jpeg,png,ico,gif','max:3000'],
            // 'project_category_slug'=>['required'],
            'project_keyword'=>['required'],
            'project_scope'=>['required'],
            'project_type'=>['required'],
            // 'project_location'=>['required'],
            // 'project_description'=>['required'],
            // 'is_ongoing'=>['required'],
        ]);

        $input = $request->all();


        if($input['project_category_slug'] != 'null'){
            if($input['is_ongoing'] == 0 || $input['is_ongoing'] == 1){
                $afterExplodeSlug = $request->input('project_category_slug');
                $slug = Str::slug($request->project_name);
                $headerImage = $request->file('project_header_image');
                $randstr = Carbon::now()->format('Y-m-d-H-i-s-u');
                $headerImageNewName = $slug.'-'.$afterExplodeSlug[0].'-'.$randstr.'.'.$headerImage->getClientOriginalExtension();

                if ($input['is_ongoing'] == 0) {
                    $imagePath = base_path('public/image/project/'.$headerImageNewName);
                    Image::make($headerImage)->save($imagePath);
                    $is_ongoing_str = 'complete';
                    $activeStatus = 'Active';
                    $project = new Project();
                    $project->project_name = $input['project_name'];
                    $project->project_slug = $slug;
                    $project->project_header_image = $headerImageNewName;
                    $project->project_category_slug = $afterExplodeSlug;
                    $project->project_keyword = $input['project_keyword'];
                    $project->project_scope = $input['project_scope'];
                    $project->project_type = $input['project_type'];
                    $project->project_location = $input['project_location'];
                    $project->project_description = $request->project_description;
                    $project->is_ongoing = $input['is_ongoing'];
                    $project->is_ongoing_str = $is_ongoing_str;
                    $project->active_status = $activeStatus;
                    $project->project_added_by = Auth::user()->username;
                    $projectSave = $project->save();
                    $lastProjectId = $project->id;
                    if($request->hasFile('project_multiple_image')){
                        foreach($request->file('project_multiple_image') as $multipleImage){
                            $multipleImageName = $slug.'-'.'multiple-'.rand(1,1000).'-'.$randstr.'.'.$multipleImage->getClientOriginalExtension();
                            $multipleImageUploadLocation = base_path('public/image/project/multipleimage/'.$multipleImageName);
                            Image::make($multipleImage)->resize(784,440)->save($multipleImageUploadLocation);
                            ProjectMultipleImage::create([
                                'project_id'=>$lastProjectId,
                                'image'=>$multipleImageName,
                                'added_by'=>Auth::user()->name
                            ]);
                        }
                    }

                    if($projectSave){
                        return redirect()->back()->with('ProjectInsertComplete','New Project Upload Successfully');
                    }else{
                        return redirect()->back()->with('ProjectInsertFailed','Something went wrong!');
                    }
                }elseif($input['is_ongoing'] == 1){
                    $imagePath = base_path('public/image/project/'.$headerImageNewName);
                    Image::make($headerImage)->save($imagePath);
                    $is_ongoing_str = 'ongoing';
                    $activeStatus = 'Active';
                    $project = new Project();
                    $project->project_name = $input['project_name'];
                    $project->project_slug = $slug;
                    $project->project_header_image = $headerImageNewName;
                    $project->project_category_slug = $afterExplodeSlug;
                    $project->project_keyword = $input['project_keyword'];
                    $project->project_scope = $input['project_scope'];
                    $project->project_type = $input['project_type'];
                    $project->project_location = $input['project_location'];
                    $project->project_description = $request->project_description;
                    $project->is_ongoing = $input['is_ongoing'];
                    $project->is_ongoing_str = $is_ongoing_str;
                    $project->active_status = $activeStatus;
                    $project->project_added_by = Auth::user()->username;
                    $projectSave = $project->save();
                    $lastProjectId = $project->id;
                    if($request->hasFile('project_multiple_image')){
                        foreach($request->file('project_multiple_image') as $multipleImage){
                            $multipleImageName = $slug.'-'.'multiple-'.rand(1,1000).'-'.$randstr.'.'.$multipleImage->getClientOriginalExtension();
                            $multipleImageUploadLocation = base_path('public/image/project/multipleimage/'.$multipleImageName);
                            Image::make($multipleImage)->resize(784,440)->save($multipleImageUploadLocation);
                            ProjectMultipleImage::create([
                                'project_id'=>$lastProjectId,
                                'image'=>$multipleImageName,
                                'added_by'=>Auth::user()->name
                            ]);
                        }
                    }

                    if($projectSave){
                        return redirect()->back()->with('ProjectInsertComplete','New Project Upload Successfully');
                    }else{
                        return redirect()->back()->with('ProjectInsertFailed','Something went wrong!');
                    }
                }else {
                    abort(403);
                }
            }else{
                return redirect()->back()->with('ProjectInsertFailed','You are not selected Project Status, try again!');
            }
        }else{
            return redirect()->back()->with('ProjectInsertFailed','You are not selected Project Category, try again!');
        }
    }


    public function ProjectOnGoing(){
        $onGoingProject = Project::where('is_ongoing',1)->where('is_ongoing_str','ongoing')->where('active_status','Active')->get()->reverse();
        return view('dashboard.project.on-going',[
            'onGoingProject'=>$onGoingProject,
        ]);
    }

    public function ProjectComplete(){
        $CompleteProject = Project::where('is_ongoing',0)->where('is_ongoing_str','complete')->where('active_status','Active')->get()->reverse();
        return view('dashboard.project.complete',[
            'CompleteProject'=>$CompleteProject,
        ]);
    }

    public function ProjectUpdate(Request $request, $project_id, $project_slug){
        $projectId = $project_id;
        $projectSlug = $project_slug;

        $fetchProjectFromDB = Project::where('id',$projectId)->where('project_slug',$projectSlug)->first();
        $projectCategory = projectCategory::all();
        if($fetchProjectFromDB){
            return view('dashboard.project.update',[
                'fetchProjectFromDB'=>$fetchProjectFromDB,
                'projectCategory'=>$projectCategory,
            ]);
        }else{
            abort(403);
        }
    }

    public function ProjectUpdateCom(Request $request){
        $request->validate([
            'id'=>['required'],
            'project_name'=>['required'],
            'project_category_slug'=>['required'],
            'project_slug'=>['required'],
            'project_keyword'=>['required'],
            'project_scope'=>['required'],
            'project_type'=>['required'],
            'project_location'=>['required'],
            // 'project_description'=>['required'],
            'is_ongoing'=>['required']
        ]);
        $projectId = $request->input('id');
        $projectSlug = $request->input('project_slug');

        $checkDBProject = Project::where('id',$projectId)->where('project_slug',$projectSlug)->first();
        
        $projectHeaderImage = $request->file('project_header_image');
        if($request->hasFile('project_header_image')){
            if($checkDBProject){
                $request->validate([
                    'project_header_image'=>['required','mimes:png,jpg,jpeg,gif,ico','max:2048']
                ]);
                $randSrt = Carbon::now()->format('Y-m-d-H-i-s-u');
                $ProjectImageNewName = $projectSlug.'-'.$randSrt.'.'.$projectHeaderImage->getClientOriginalExtension();
                $UpdatePath = base_path('public/image/project/'.$ProjectImageNewName);

                $dbImagePath = base_path('public/image/project/'.$checkDBProject->project_header_image);
                unlink($dbImagePath);

                Image::make($projectHeaderImage)->save($UpdatePath);
                
                // multiple image 
                $multipleProjectId = $checkDBProject->id;

                if($request->hasFile('project_multiple_image')){

                    $checkDBMultiple = ProjectMultipleImage::where('project_id',$multipleProjectId)->get();
                    if($checkDBMultiple){
                        foreach($checkDBMultiple as $multiToSingle){
                            $multiImageLocationDlt = base_path('public/image/project/multipleimage/'.$multiToSingle->image);
                            unlink($multiImageLocationDlt);
                            $multiToSingle->delete();
                        }
                    }

                    foreach($request->file('project_multiple_image') as $multipleImage){

                        $multipleImageName = $projectSlug.'-'.'multiple-'.rand(1,10000).'-'.$randSrt.'.'.$multipleImage->getClientOriginalExtension();
                        $multipleImageUploadLocation = base_path('public/image/project/multipleimage/'.$multipleImageName);
                        Image::make($multipleImage)->resize(784,440)->save($multipleImageUploadLocation);
                        ProjectMultipleImage::create([
                            'project_id'=>$multipleProjectId,
                            'image'=>$multipleImageName,
                            'added_by'=>Auth::user()->name
                        ]);
                    }
                }

                // end multiple 
                
                if ($request->input('is_ongoing') == 1) {
                    $is_ongoing_str = 'ongoing';
                    $activeStatus = 'Active';

                    $checkDBProject->project_name = $request->input('project_name');
                    $checkDBProject->project_header_image = $ProjectImageNewName;
                    $checkDBProject->project_category_slug = $request->input('project_category_slug');
                    $checkDBProject->project_keyword = $request->input('project_keyword');
                    $checkDBProject->project_scope = $request->input('project_scope');
                    $checkDBProject->project_type = $request->input('project_type');
                    $checkDBProject->project_location = $request->input('project_location');
                    $checkDBProject->project_description = $request->input('project_description');
                    $checkDBProject->is_ongoing = $request->input('is_ongoing');
                    $checkDBProject->is_ongoing_str = $is_ongoing_str;
                    $checkDBProject->active_status = $activeStatus;
                    $checkDBProject->project_added_by = Auth::user()->username;
                    $projectUpdate = $checkDBProject->save();

                    if($projectUpdate){
                        return redirect()->back()->with('projectUpdateComplete','Project Update Complete, Check it now!');
                    }else{
                        return redirect()->back()->with('projectUpdateFailed','Something went wrong');
                    }
                }elseif ($request->input('is_ongoing') == 0) {
                    $is_ongoing_str = 'complete';
                    $activeStatus = 'Active';

                    $checkDBProject->project_name = $request->input('project_name');
                    $checkDBProject->project_header_image = $ProjectImageNewName;
                    $checkDBProject->project_category_slug = $request->input('project_category_slug');
                    $checkDBProject->project_keyword = $request->input('project_keyword');
                    $checkDBProject->project_scope = $request->input('project_scope');
                    $checkDBProject->project_type = $request->input('project_type');
                    $checkDBProject->project_location = $request->input('project_location');
                    $checkDBProject->project_description = $request->input('project_description');
                    $checkDBProject->is_ongoing = $request->input('is_ongoing');
                    $checkDBProject->is_ongoing_str = $is_ongoing_str;
                    $checkDBProject->active_status = $activeStatus;
                    $checkDBProject->project_added_by = Auth::user()->username;
                    $projectUpdate = $checkDBProject->save();

                    if($projectUpdate){
                        return redirect()->back()->with('projectUpdateComplete','Project Update Complete, Check it now!');
                    }else{
                        return redirect()->back()->with('projectUpdateFailed','Something went wrong');
                    }
                }else {
                    abort(403);
                }
            }else{
                abort(403);
            }
        }else{
            if($checkDBProject){
                // multiple image 
                $multipleProjectId = $checkDBProject->id;
                $randSrt = Carbon::now()->format('Y-m-d-H-i-s-u');
                if($request->hasFile('project_multiple_image')){

                    $checkDBMultiple = ProjectMultipleImage::where('project_id',$multipleProjectId)->get();
                    if($checkDBMultiple){
                        foreach($checkDBMultiple as $multiToSingle){
                            $multiImageLocationDlt = base_path('public/image/project/multipleimage/'.$multiToSingle->image);
                            unlink($multiImageLocationDlt);
                            $multiToSingle->delete();
                        }
                    }

                    foreach($request->file('project_multiple_image') as $multipleImage){

                        $multipleImageName = $projectSlug.'-'.'multiple-'.rand(1,10000).'-'.$randSrt.'.'.$multipleImage->getClientOriginalExtension();
                        $multipleImageUploadLocation = base_path('public/image/project/multipleimage/'.$multipleImageName);
                        Image::make($multipleImage)->resize(784,440)->save($multipleImageUploadLocation);
                        ProjectMultipleImage::create([
                            'project_id'=>$multipleProjectId,
                            'image'=>$multipleImageName,
                            'added_by'=>Auth::user()->name
                        ]);
                    }
                }
                // end multiple 
                if ($request->input('is_ongoing') == 1) {
                    $is_ongoing_str = 'ongoing';
                    $activeStatus = 'Active';

                    $checkDBProject->project_name = $request->input('project_name');
                    $checkDBProject->project_header_image = $ProjectImageNewName;
                    $checkDBProject->project_category_slug = $request->input('project_category_slug');
                    $checkDBProject->project_keyword = $request->input('project_keyword');
                    $checkDBProject->project_scope = $request->input('project_scope');
                    $checkDBProject->project_type = $request->input('project_type');
                    $checkDBProject->project_location = $request->input('project_location');
                    $checkDBProject->project_description = $request->input('project_description');
                    $checkDBProject->is_ongoing = $request->input('is_ongoing');
                    $checkDBProject->is_ongoing_str = $is_ongoing_str;
                    $checkDBProject->active_status = $activeStatus;
                    $checkDBProject->project_added_by = Auth::user()->username;
                    $projectUpdate = $checkDBProject->save();

                    if($projectUpdate){
                        return redirect()->back()->with('projectUpdateComplete','Project Update Complete, Check it now!');
                    }else{
                        return redirect()->back()->with('projectUpdateFailed','Something went wrong');
                    }
                }elseif ($request->input('is_ongoing') == 0) {
                    $is_ongoing_str = 'complete';
                    $activeStatus = 'Active';

                    $checkDBProject->project_name = $request->input('project_name');
                    $checkDBProject->project_header_image = $ProjectImageNewName;
                    $checkDBProject->project_category_slug = $request->input('project_category_slug');
                    $checkDBProject->project_keyword = $request->input('project_keyword');
                    $checkDBProject->project_scope = $request->input('project_scope');
                    $checkDBProject->project_type = $request->input('project_type');
                    $checkDBProject->project_location = $request->input('project_location');
                    $checkDBProject->project_description = $request->input('project_description');
                    $checkDBProject->is_ongoing = $request->input('is_ongoing');
                    $checkDBProject->is_ongoing_str = $is_ongoing_str;
                    $checkDBProject->active_status = $activeStatus;
                    $checkDBProject->project_added_by = Auth::user()->username;
                    $projectUpdate = $checkDBProject->save();

                    if($projectUpdate){
                        return redirect()->back()->with('projectUpdateComplete','Project Update Complete, Check it now!');
                    }else{
                        return redirect()->back()->with('projectUpdateFailed','Something went wrong');
                    }
                }else {
                    abort(403);
                }
            }else{
                abort(403);
            }
        }
    }

    public function ProjectArchive(Request $request){
        $archiveId = $request->input('ProjectArchiveModalId');
        Project::where('id',$archiveId)->update([
            'active_status'=>'InActive',
            'project_added_by'=>Auth::user()->username
        ]);
        return redirect()->back()->with('ProjectArchiveComplete','Project Archive Complete, check it now!');
    }

    public function ProjectArchiveList(){
        $archiveProjectList = Project::where('active_status','InActive')->get()->reverse();
        return view('dashboard.project.archiveproject',[
            'archiveProjectList'=>$archiveProjectList,
        ]);
    }

    public function ProjectArchiveRestore(Request $request){
        $restoreId = $request->input('ProjectRestoreBTNId');
        $restoreFromDb = Project::where('id',$restoreId)->update([
            'active_status'=>'Active',
            'project_added_by'=>Auth::user()->username
        ]);
        if($restoreFromDb){
            return redirect()->back()->with('ProjectRestoreComplete','Project Restore Complete, make sure check in complete link!');
        }else{
            abort(403);
        }
    }

    public function ProjectArchiveDelete(Request $request){
        $deleteId = $request->input('ProjectDeleteBTNId');
        $deleteFromDbProject = Project::where('id',$deleteId)->first();
        $dbImage = $deleteFromDbProject->project_header_image;
        $deleteImageFromLocation = base_path('public/image/project/'.$dbImage);
        unlink($deleteImageFromLocation);
        $deleteFromDbProject->delete();

        $checkDBMultiple = ProjectMultipleImage::where('project_id',$deleteId)->get();
        if($checkDBMultiple){
            foreach($checkDBMultiple as $multiToSingle){
                $multiImageLocationDlt = base_path('public/image/project/multipleimage/'.$multiToSingle->image);
                unlink($multiImageLocationDlt);
                $multiToSingle->delete();
            }
        }

        if($deleteFromDbProject){
            return redirect()->back()->with('ProjectDeleteComplete','Project Delete Complete!');
        }else{
            abort(403);
        }
    }
}
