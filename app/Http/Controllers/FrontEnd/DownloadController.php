<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\URL;
use App\Models\CompanyProfile;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;


class DownloadController extends Controller
{
    public function CompanyProfileShow(Request $request){

        $companyProfilePdf = CompanyProfile::where('status','Active')->first();

        SEOTools::setTitle('Company Profile ');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/');
        SEOTools::opengraph()->addProperty('type', 'Company Profile');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');

        return view('FrontEndView.downloads.companyProfileShow',['companyProfilePdf'=>$companyProfilePdf]);
    }

    public function enlishtmentsDocuments(Request $request, $enlist_slug){
        SEOTools::setTitle('Enlishtment Documents');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/');
        SEOTools::opengraph()->addProperty('type', 'Company Profile');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        $enlishtmentsDocuments = $enlist_slug;
        $checkEnlishtment = Download::where('file_category_slug',$enlishtmentsDocuments)->where('is_active_str','Active')->get()->reverse();
        if($checkEnlishtment){
            return view('FrontEndView.downloads.enlishtments',[
                'checkEnlishtment'=>$checkEnlishtment
            ]);
        }else{
            abort(404);
        }
        
    }

    public function ProductDataSheet(Request $request, $prod_slug){
        SEOTools::setTitle('Product Datasheet');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/');
        SEOTools::opengraph()->addProperty('type', 'Company Profile');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        $produtDataSheet = $prod_slug;
        $checkProDataSheet = Download::where('file_category_slug',$produtDataSheet)->where('is_active_str','Active')->get()->reverse();
        if($checkProDataSheet){
            return view('FrontEndView.downloads.datasheet',[
                'checkProDataSheet'=>$checkProDataSheet
            ]);
        }else{
            abort(404);
        }
    }

}
