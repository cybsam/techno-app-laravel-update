<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;
use App\Models\AboutOurTeam;
use App\Models\FrontContact;
use App\Models\Project;
use App\Models\SettingCaroseSlider;
use Artisan;

use Illuminate\Support\Facades\URL;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

class FrontEndController extends Controller
{
    public function index(){
        Artisan::call('optimize:clear');
        SEOTools::setTitle('Techno Apogee');
        $contentDescription = "Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh's Fire Electrical & Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.";

        $currentURL = URL::current();
        
        $AboutUsInformation = AboutUsInformation::where('id',1)->first();

        
        SEOMeta::setTitle('Techno Apogee');
        SEOMeta::setDescription($contentDescription);
        SEOMeta::addMeta('article:published_time', $AboutUsInformation->create_at, 'property');
        SEOMeta::addMeta('article:section', 'Techno Apogee', 'property');
        SEOMeta::addKeyword(['Techno Apogee', 'Techno', 'Apogee', 'Apogee Group', 'Apogee Consultancy', 'Apogee Solution', 'Automation Techno','Solution Apogee','techno','techno apogee']);

        OpenGraph::setDescription($contentDescription);
        OpenGraph::setTitle('Techno Apogee');
        OpenGraph::setUrl($currentURL);
        OpenGraph::addProperty('type', 'Techno Apogee');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        OpenGraph::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        OpenGraph::addImage(['url' => 'https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG', 'size' => 300]);
        OpenGraph::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Techno Apogee');
        JsonLd::setDescription($contentDescription);
        JsonLd::setType('Techno Apogee');
        JsonLd::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        
        
        $getCaroselSlider = SettingCaroseSlider::where('is_active','1')->get();
        $frontProjectShow = Project::where('is_ongoing',0)->inRandomOrder()->get();
        return view('FrontEndView.index',[
            // 'AboutUsInformation'=>$AboutUsInformation,
            'frontProjectShow'=>$frontProjectShow,
            'getCaroselSlider'=>$getCaroselSlider,
        ]);
    }



    Public function contact(){
        $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        
        $contentDescription = "Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh's Fire Electrical & Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh";
        $currentURL = URL::current();

        // start 2nd seo
        SEOMeta::setTitle('Contact Us');
        SEOMeta::setDescription($contentDescription);
        SEOMeta::addMeta('article:published_time', $AboutUsInformation->create_at, 'property');
        SEOMeta::addMeta('article:section', 'Techno Apogee', 'property');
        SEOMeta::addKeyword(['Techno Apogee', 'Techno', 'Apogee', 'Apogee Group', 'Apogee Consultancy', 'Apogee Solution', 'Automation Techno','Solution Apogee','techno','techno apogee']);

        OpenGraph::setDescription($contentDescription);
        OpenGraph::setTitle('Contact Us');
        OpenGraph::setUrl($currentURL);
        OpenGraph::addProperty('type', 'Contact Us Techno Apogee');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        OpenGraph::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        OpenGraph::addImage(['url' => 'https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG', 'size' => 300]);
        OpenGraph::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Contact Us');
        JsonLd::setDescription($contentDescription);
        JsonLd::setType('Contact Us Techno Apogee');
        JsonLd::addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');

        // end seo part
        return view('FrontEndView.Contact.index',[
            'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }

    public function contactStore(Request $request){
        $request->validate([
            'sender_name'=>['required'],
            'sender_number'=>['required','min:10','max:11'],
            'sender_subject'=>['required'],
            'sender_email'=>['required', 'email'],
            'sender_message'=>['required'],
        ]);

        $input = $request->all();

        $insMsg = new FrontContact();
        $insMsg->sender_name = $input['sender_name'];
        $insMsg->sender_number = $input['sender_number'];
        $insMsg->sender_email = $input['sender_email'];
        $insMsg->sender_subject = $input['sender_subject'];
        $insMsg->sender_message = $input['sender_message'];
        $insMsg->sender_ip = \Request::ip();
        $saveMsg = $insMsg->save();
        if($saveMsg){
            return redirect()->back()->with('succFrontEnd','Thanks for you message us, we will contact as soon as possible!');
        }else{
            return redirect()->back()->with('errFrontEnd','Something went wrong!, try again');
        }

    }
    
    public function sitemap(Request $request){
        SEOTools::setTitle('Sitemap');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/en/ta/sitemap');
        SEOTools::opengraph()->addProperty('type', 'Sitemap');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        return view('FrontEndView.others.sitemap');
    }

    public function privacyandpolicy(Request $request){
        SEOTools::setTitle('Privacy Policy');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/en/ta/privacy-policy');
        SEOTools::opengraph()->addProperty('type', 'Privacy Policy');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        return view('FrontEndView.others.privacyandpolicy');
    }

    public function termsandcondition(Request $request){
        SEOTools::setTitle('Terms and Conditions');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/en/ta/terms-and-conditions');
        SEOTools::opengraph()->addProperty('type', 'Terms and Conditions');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        return view('FrontEndView.others.termsandcondition');
    }
    public function cookiePolicy(Request $request){
        SEOTools::setTitle('Cookie Policy');
        SEOTools::setDescription('Techno Apogee started its operation in June 2006 in Dhaka, Bangladesh. We provide the best EPC support in Bangladesh&#039;s Fire Electrical &amp; Automation field. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://technoapogee.com/en/ta/cookie-policy');
        SEOTools::opengraph()->addProperty('type', 'Blogs');
        SEOTools::twitter()->setSite('@technoaogee');
        SEOTools::jsonLd()->addImage('https://technoapogee.com/public/image/FrontEnd/logoFav/logo.PNG');
        return view('FrontEndView.others.cookie');
    }

}
