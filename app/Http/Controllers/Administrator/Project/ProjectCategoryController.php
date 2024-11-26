<?php

namespace App\Http\Controllers\Administrator\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\projectCategory;
use App\Models\Project;


class ProjectCategoryController extends Controller
{
    public function showCategory(){
        $listAllCategory = projectCategory::all();
        return view('dashboard.project.project-category',[
            'listAllCategory'=>$listAllCategory,
        ]);
    }



    public function ProjectCategoryInsert(Request $request){
        $request->validate([
            'project_category'=>['required','unique:project_categories']
        ]);
        $input = $request->all();
        $slug = Str::slug($input['project_category']);
        $adedBy = Auth::user()->id.'.'.Auth::user()->name;

        $insertProjectCategory = new projectCategory();
        $insertProjectCategory->project_category = $input['project_category'];
        $insertProjectCategory->project_category_slug = $slug;
        $insertProjectCategory->added_by = $adedBy;
        $saveCategory = $insertProjectCategory->save();

        if($saveCategory){
            return redirect()->back()->with('succ','Project Category Insert successfully!');
        }else{
            return redirect()->back()->with('err','Something Went wrong!');
        }
    }

    public function ProjectCategorydelete(Request $request, $category_id){
        $categoryId = $category_id;

        $categoryFinding = projectCategory::where('id',$categoryId)->first();
        $categorySlug = $categoryFinding->project_category_slug;

        $checkProjectIsAvailable = Project::where('project_category_slug', $categorySlug)->get();
        $counted = count($checkProjectIsAvailable);
        
        if($counted <= 0){
            $deleteCategory = $categoryFinding->delete();
            return redirect()->back()->with('categoryDeleteCom','Category delete complete');
        }else{
            $msg = "You need to delete ".$counted." Project Details";
            return redirect()->back()->with('categoryDeleteProb',$msg);
        }
    }

    public function showCategoryShowProject(Request $request,$category_slug){
        if (!empty($category_slug)) {
            $fetchData = Project::where('project_category_slug',$category_slug)->where('active_status','Active')->get()->reverse();
            return view('dashboard.project.categorywiseproject',[
                'fetchData'=>$fetchData
            ]);
        }else {
            abort(403);
        }
        
    }
}
