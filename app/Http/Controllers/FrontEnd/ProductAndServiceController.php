<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;
use App\Models\ProductServiceSub;

use Illuminate\Support\Facades\URL;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

class ProductAndServiceController extends Controller
{
    public function ProductFetch(Request $request, $slug){
        $proSlug = $slug;
        $fetchPro = ProductService::where('__proserslug',$proSlug)->first();

        if ($fetchPro) {

            // for seo tools
            $delimiters = "/[,.]/";
            //delimiter
            $explodeKeyword = preg_split($delimiters,$fetchPro->__proserkeyword);
            SEOMeta::setTitle($fetchPro->__prosertitle);
            SEOMeta::setDescription($fetchPro->__proserkeyword);
            SEOMeta::addMeta('article:published_time', $fetchPro->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:section', $fetchPro->__prosertitle, 'property');
            SEOMeta::addKeyword($explodeKeyword);

            OpenGraph::setDescription($fetchPro->__proserkeyword);
            OpenGraph::setTitle($fetchPro->__prosertitle);
            OpenGraph::setUrl(URL::current());
            OpenGraph::addProperty('type', 'Product And Service');
            OpenGraph::addProperty('locale', 'BD');
            OpenGraph::addProperty('locale:alternate', ['BD', 'en-us']);

            OpenGraph::addImage(url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage);
            OpenGraph::addImage(url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage);
            OpenGraph::addImage(['url' => url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage, 'size' => 300]);
            OpenGraph::addImage(url('/').'/public/image/productservice/'.$fetchPro->__proserheadimage, ['height' => 750, 'width' => 1000]);

            JsonLd::setTitle($fetchPro->__prosertitle);
            JsonLd::setDescription($fetchPro->__proserkeyword);
            JsonLd::setType('Product And Service - Techno Apogee');
            JsonLd::addImage($fetchPro->__prosertitle);

            // end seo tools

            $currentUrl = URL()->current();
            $productName = $fetchPro->__prosertitle;
            $socialShareUrl = \Share::page(
                $currentUrl,
                $productName,
            )->facebook()
             ->twitter()
             ->linkedin()
             ->whatsapp()
             ->reddit()
             ->telegram();
            return view('FrontEndView.product-service.details',[
                'fetchPro'=>$fetchPro,
                'socialShareUrl'=>$socialShareUrl,
            ]);
        }else{
            abort(404);
        }

        
    }

    public function SubProductFetch(Request $request, $s_slug, $sub_slug){
        $s_slug = $s_slug;
        $sub_slug = $sub_slug;
        $fetchFromDb = ProductServiceSub::where('__prosermaincateslug',$s_slug)->where('__proserslug',$sub_slug)->first();

        if($fetchFromDb){

            // for seo tools
            $delimiters = "/[,.]/";
            $explodeKeyword = preg_split($delimiters,$fetchFromDb->__proserkeyword);
            SEOMeta::setTitle($fetchFromDb->__prosertitle);
            SEOMeta::setDescription($fetchFromDb->__proserkeyword);
            SEOMeta::addMeta('article:published_time', $fetchFromDb->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:section', $fetchFromDb->__prosertitle, 'property');
            SEOMeta::addKeyword($explodeKeyword);

            OpenGraph::setDescription($fetchFromDb->__proserkeyword);
            OpenGraph::setTitle($fetchFromDb->__prosertitle);
            OpenGraph::setUrl(URL::current());
            OpenGraph::addProperty('type', 'Product And Services');
            OpenGraph::addProperty('locale', 'BD');
            OpenGraph::addProperty('locale:alternate', ['BD', 'en-us']);

            OpenGraph::addImage(url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage);
            OpenGraph::addImage(url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage);
            OpenGraph::addImage(['url' => url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage, 'size' => 300]);
            OpenGraph::addImage(url('/').'/public/image/productservice/subproduct/'.$fetchFromDb->__proserheadimage, ['height' => 750, 'width' => 1000]);

            JsonLd::setTitle($fetchFromDb->__prosertitle);
            JsonLd::setDescription($fetchFromDb->__proserkeyword);
            JsonLd::setType('Product And Service - Techno Apogee');
            JsonLd::addImage($fetchFromDb->__prosertitle);

            // end seo tools

            $currentUrlSub = URL()->current();
            $subProductname = $fetchFromDb->__prosertitle;
            $subProductSocialShare = \Share::page(
                $currentUrlSub,
                $subProductname,
            )->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->reddit()
            ->telegram();
            return view('FrontEndView.product-service.subproduct',[
                '__fetchFromDb'=>$fetchFromDb,
                'subProductSocialShare'=>$subProductSocialShare,
            ]);
        }else{
            abort(404);
        }

        
    }
    
    
    
    // custom

    public function designAndConsultancy(){
        $slug = "design-and-consultancy-services";
        $data = ProductService::where('is_active',1)->where('__prosermenuselect',$slug)->get();
        
        
        if($data){
            SEOTools::setTitle('Design And Consultancy in Bangladesh');
            SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
            SEOTools::opengraph()->setUrl(URL::current());
            SEOTools::setCanonical('https://technoapogee.com/');
            SEOTools::opengraph()->addProperty('type', 'Design and Consultancy');
            SEOTools::twitter()->setSite('@technoaogee');
            SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
            return view('FrontEndView.product-service.design-consultancy',[
                'data'=>$data,
            ]);
        }else{
            abort(404);
        }
    }

    public function hvacAndBbtSolutions(){
        $slug = "hvac-and-bbt";
        $data = ProductService::where('is_active',1)->where('__prosermenuselect',$slug)->get();
        if($data){
            SEOTools::setTitle('HVAC and Cleanroom Acoustic Solutions in bangladesh');
            SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
            SEOTools::opengraph()->setUrl(URL::current());
            SEOTools::setCanonical('https://technoapogee.com/');
            SEOTools::opengraph()->addProperty('type', 'HVAC and Cleanroom Acoustic Solution');
            SEOTools::twitter()->setSite('@technoaogee');
            SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
            return view('FrontEndView.product-service.hvac-bbt',[
                'data'=>$data,
            ]);
        }else{
            abort(404);
        }
    }

    public function FireSolutions(){
        $slug = "fire-solution";
        $data = ProductService::where('is_active',1)->where('__prosermenuselect',$slug)->get();
        if($data){
            SEOTools::setTitle('Fire Safety and Electrical solution in Bangladesh');
            SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
            SEOTools::opengraph()->setUrl(URL::current());
            SEOTools::setCanonical('https://technoapogee.com/');
            SEOTools::opengraph()->addProperty('type', 'Fire Safety and Electrical solution');
            SEOTools::twitter()->setSite('@technoaogee');
            SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
            return view('FrontEndView.product-service.fire-solutions',[
                'data'=>$data,
            ]);
        }else{
            abort(404);
        }
    }

    public function bmsAutomationSolution(){
        $slug = "automation-solution";
        $data = ProductService::where('is_active',1)->where('__prosermenuselect',$slug)->get();
        if($data){
            SEOTools::setTitle('BMS and Automation solution in Bangladesh');
            SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
            SEOTools::opengraph()->setUrl(URL::current());
            SEOTools::setCanonical('https://technoapogee.com/');
            SEOTools::opengraph()->addProperty('type', 'BMS and Automation solution');
            SEOTools::twitter()->setSite('@technoaogee');
            SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
            return view('FrontEndView.product-service.bms',[
                'data'=>$data,
            ]);
        }else{
            abort(404);
        }
    }
}
