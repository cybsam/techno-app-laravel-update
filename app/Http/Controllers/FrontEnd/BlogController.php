<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;


class BlogController extends Controller
{
    public function index(){
        SEOTools::setTitle('Blogs we write our experiance');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/en/blog');
        SEOTools::opengraph()->addProperty('type', 'Blogs');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        $fetchAllBlocgFromDb = Blog::where('__blog_status',0)->latest()->get();
        return view('FrontEndView.blog.index',[
            'fetchAllBlocgFromDb'=>$fetchAllBlocgFromDb,
        ]);
    }

    public function showSingleBlog(Request $request, $blog_slug){
        $blogDetailesView = Blog::where('__blog_slug',$blog_slug)->where('__blog_status',0)->first();
        if($blogDetailesView){
            //view count
            views($blogDetailesView)->record();
            $postViewCount = views($blogDetailesView)->count();
            //end view count

            //reletated some blog
            $reletedBlog = Blog::where('__blog_status',0)->inRandomOrder()->take(5)->get();
            // end reletated blog

            // share
            $currentUrl = url()->current();
            $postName = $blogDetailesView->__blog_name;
            $socialShare = \Share::page(
                $currentUrl,
                $postName,
            )->facebook()
             ->twitter()
             ->linkedin()
             ->whatsapp()
             ->reddit()
             ->telegram();
            // end share
            $descRiption = $blogDetailesView->__blog_short_description;
            SEOTools::setTitle($postName);
            SEOTools::setDescription($descRiption);
            SEOTools::opengraph()->setUrl(URL::current());
            SEOTools::setCanonical('https://technoapogee.com/en/blog');
            SEOTools::opengraph()->addProperty('type', 'Blogs');
            SEOTools::twitter()->setSite('@technoaogee');
            SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
            return view('FrontEndView.blog.details',[
                'blogDetailesView'=>$blogDetailesView,
                'reletedBlog'=>$reletedBlog,
                'postViewCount'=>$postViewCount,
                'socialShare'=>$socialShare,
            ]);

        }else{
            abort(404);
        }
    }

    public function FrontSearch(Request $request){
        $inputData = $request->input('searchData');
        
        $searchData = Blog::where('__blog_name','LIKE','%'.$inputData.'%')
                            ->orWhere('__blog_short_description','LIKE','%'.$inputData.'%')
                            ->get();
        
        $commentDataFromDB = DB::table('comments')->where('comment','LIKE','%'.$inputData.'%')->get();

        if($searchData || $commentDataFromDB){
            return view('FrontEndView.search.index',[
                'inputData'=>$inputData,
                'searchData'=>$searchData,
                'commentDataFromDB'=>$commentDataFromDB,
            ]);
        }else{
            abort(404);
        }
    }
}
