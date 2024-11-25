<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use App\Models\projectCategory;
use App\Models\Project;
use App\Models\ProjectMultipleImage;

use Illuminate\Support\Facades\URL;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;


class ProjectController extends Controller
{
    public function onGoingProject(){
        $onGoingProject = Project::where('is_ongoing','1')->latest()->paginate(12);
        
        SEOTools::setTitle('On Going Project');
            SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
            SEOTools::opengraph()->setUrl(url::current());
            SEOTools::setCanonical(URL::current());
            SEOTools::opengraph()->addProperty('type', '/project/on-going');
            SEOTools::twitter()->setSite('techno apogee on going project');
            SEOTools::jsonLd()->addImage(URL::current());
        return view('FrontEndView.project.onging',[
            'onGoingProject'=>$onGoingProject,
        ]);
    }


    public function CompleteProjectList(Request $request, $project_cate_slug){
        $pro_slug = $project_cate_slug;
        $categoryWiseProjectList = Project::where('is_ongoing',0)->where('project_category_slug',$pro_slug)->latest()->paginate(12);

        if ($pro_slug && $categoryWiseProjectList) {
            SEOTools::setTitle('Complete Project List');
            SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
            SEOTools::opengraph()->setUrl(url::current());
            SEOTools::setCanonical(URL::current());
            SEOTools::opengraph()->addProperty('type', '/project/on-going');
            SEOTools::twitter()->setSite('techno apogee on going project');
            SEOTools::jsonLd()->addImage(URL::current());
            return view('FrontEndView.project.categorywise-project',[
                'proejct_slug'=>$project_cate_slug,
                'categoryWiseProjectList'=>$categoryWiseProjectList,
            ]);
        }else{
            abort(404);
        }

        
    }

    public function ProjectDetailsShow(Request $request, $project_slug){
        $project_slug = $project_slug;
        $projectDetaisView =  Project::where('project_slug',$project_slug)->first();
        
        

        if ($projectDetaisView) {
            $explodeKeyword = explode(',',$projectDetaisView->project_keyword);
            SEOMeta::setTitle($projectDetaisView->project_name);
            SEOMeta::setDescription($projectDetaisView->project_keyword);
            SEOMeta::addMeta('article:published_time', $projectDetaisView->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:section', $projectDetaisView->__prosername, 'property');
            SEOMeta::addKeyword($explodeKeyword);

            OpenGraph::setDescription($projectDetaisView->project_keyword);
            OpenGraph::setTitle($projectDetaisView->project_name);
            OpenGraph::setUrl(URL::current());
            OpenGraph::addProperty('type', 'Project');
            OpenGraph::addProperty('locale', 'BD');
            OpenGraph::addProperty('locale:alternate', ['BD', 'en-us']);
            
            OpenGraph::addImage(url('/').'/public/image/project/'.$projectDetaisView->project_header_image);
            OpenGraph::addImage(url('/').'/public/image/project/'.$projectDetaisView->project_header_image);
            OpenGraph::addImage(['url' => url('/').'/public/image/project/'.$projectDetaisView->project_header_image, 'size' => 300]);
            OpenGraph::addImage(url('/').'/public/image/project/'.$projectDetaisView->project_header_image, ['height' => 750, 'width' => 1000]);

            JsonLd::setTitle($projectDetaisView->project_name);
            JsonLd::setDescription($projectDetaisView->project_keyword);
            JsonLd::setType('Project - Techno Apogee');
            JsonLd::addImage($projectDetaisView->project_name);
            // share project
            $currentUrl = URL()->current();
            $projectHeader = $projectDetaisView->project_name;
    
            $socialShareProject = \Share::page(
                $currentUrl,
                $projectHeader
            )->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->reddit()
            ->telegram();
            $multipleImages = ProjectMultipleImage::where('project_id',$projectDetaisView->id)->get();
            return view('FrontEndView.project.project-details',[
                'projectDetaisView'=>$projectDetaisView,
                'socialShareProject'=>$socialShareProject,
                'multipleImages'=>$multipleImages,
            ]);
        }else{
            abort(404);
        }
        
    }
}
