<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;
use App\Models\AboutOurTeam;
use App\Models\AboutUs;
use App\Models\MissionAndVission;
use App\Models\OurConcern;
use App\Models\Expertise;
use App\Models\StrategicPartner;
use Illuminate\Support\Facades\URL;
// seo tools
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

class AboutController extends Controller
{
    public function aboutUs(){
        $fetchAboutData = AboutUs::where('id','1')->firstOrFail();
        

        $explodeKeyword = explode(',',$fetchAboutData->keyword_title);

        SEOMeta::setTitle("About Us - Techno Apogee");
        SEOMeta::setDescription($fetchAboutData->keyword_description);
        SEOMeta::addMeta('article:published_time', $fetchAboutData->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $fetchAboutData->keyword_title, 'property');
        SEOMeta::addKeyword($explodeKeyword);

        OpenGraph::setDescription($fetchAboutData->keyword_description);
        OpenGraph::setTitle("About Us - Techno Apogee");
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'about us');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage(url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image);
        OpenGraph::addImage(url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image);
        OpenGraph::addImage(['url' => url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image, 'size' => 300]);
        OpenGraph::addImage(url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('About Us - Techno Apogee');
        JsonLd::setDescription($fetchAboutData->keyword_description);
        JsonLd::setType('About Us - Techno Apogee');
        JsonLd::addImage(url('/').'/public/image/about-us/about-us/'.$fetchAboutData->image);


        return view('FrontEndView.about-us.about-us',[
            'fetchAboutData'=>$fetchAboutData,
        ]);
    }

    // Our mission and vission
    public function missionAndVission(){
        $missionAndVission = MissionAndVission::where('id','1')->firstOrFail();

        $afterExplode = explode(',',$missionAndVission->mission_vission_keyword);
        SEOMeta::setTitle('Our Mission and Vission - Techno Apogee');
        SEOMeta::setDescription($missionAndVission->mission_description.' & '.$missionAndVission->vission_description);
        SEOMeta::addMeta('article:published_time', $missionAndVission->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $missionAndVission->created_at, 'property');
        SEOMeta::addKeyword($afterExplode);

        OpenGraph::setDescription($missionAndVission->mission_description.' & '.$missionAndVission->vission_description);
        OpenGraph::setTitle('Our Mission and Vission');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'Mission And Vission');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image);
        OpenGraph::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image);
        OpenGraph::addImage(['url' => url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image, 'size' => 300]);
        OpenGraph::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Our Mission and Vission');
        JsonLd::setDescription($missionAndVission->mission_description.' & '.$missionAndVission->vission_description);
        JsonLd::setType('Article');
        JsonLd::addImage(url('/').'/public/image/about-us/mission-vission/'.$missionAndVission->mission_image);

        return view('FrontEndView.about-us.our-mission-vission',[
            'missionAndVission'=>$missionAndVission,
        ]);
    }

    // Our team
    public function OurTeam(){
        // $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        $management = AboutOurTeam::where('department','management')->get();
        $project_engineering_operation_department = AboutOurTeam::where('department','project-engineering-operation-department')->get();
        $admin_operation = AboutOurTeam::where('department','admin-operation')->get();
        $business_development = AboutOurTeam::where('department','business-development')->get();
        $information_technology_design = AboutOurTeam::where('department','information-technology-design')->get();
        $support_team_electrical_maintenance = AboutOurTeam::where('department','support-team-electrical-maintenance')->get();
        $development = AboutOurTeam::where('department','development')->get();

        SEOTools::setTitle('Techno Team');
        SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
        SEOTools::opengraph()->setUrl(url::current());
        SEOTools::setCanonical('https://technoapogee.com/en/about-us/our-team');
        SEOTools::opengraph()->addProperty('type', 'Our Team');
        SEOTools::twitter()->setSite('cybsam');
        SEOTools::jsonLd()->addImage(URL::current());
        
        return view('FrontEndView.about-us.our-team',[
            // 'AboutUsInformation'=>$AboutUsInformation,
            'management'=>$management,
            'project_engineering_operation_department'=>$project_engineering_operation_department,
            'admin_operation'=>$admin_operation,
            'business_development'=>$business_development,
            'information_technology_design'=>$information_technology_design,
            'support_team_electrical_maintenance'=>$support_team_electrical_maintenance,
            'development'=>$development,
        ]);
    }


    // Our Concern
    public function OurConcern(){
        $fetchFromDb = OurConcern::where('is_active','0')->get();
        $description = "Apogee Engineering Limited an Inspiring background Techno Apogee founded in 2006 as a sole trading firm for service provider in the in the field of Substation, BBT, Fire Protection (Hydrants & Sprinkler systems), Fire Detection & Alarm system, Fire Suppression (Gas Flooding system), Lighting Protection System (LPS). Techno Apogee moves forward proudly with diversification of trades and businesses with the mission and vision of becoming the local leader for global business establishing itself as a trusted partner with the customers and principals alike. & Apogee Automation Limited is one of the few automation & security solution companies since 2006 in Bangladesh. We provide hardware & software supply with smart integration and consultation service for different sector.“Our objective is to become the leading independent auto-motion & security solution company and provide qualified technical support to achieve highest customer satisfaction. & APOGEE CONSULTANCY LTD. is a leading creator, developer, and integrator of energy efficiency and infrastructure renewal solutions in support of economic and environmental sustainability. Apogee Consultancy was established in 2014 with a vision to commit to helping our customers find engineering solutions that deliver immediate and long-term, bottom line results";
        SEOTools::setTitle('Techno Concern');
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(url::current());
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('cybsam');
        SEOTools::jsonLd()->addImage(URL::current());

        
        return view('FrontEndView.about-us.our-concern',['fetchFromDb'=>$fetchFromDb]);
    }

    // Our Expertise
    public function ourExpertise(){
        $expertiseFetch = Expertise::where('is_active','0')->get();
        
        SEOTools::setTitle('Expertise Techno');
        SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
        SEOTools::opengraph()->setUrl(url::current());
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'expertise');
        SEOTools::twitter()->setSite('cybsam');
        SEOTools::jsonLd()->addImage(URL::current());

        return view('FrontEndView.about-us.our-expertise',['expertiseFetch'=>$expertiseFetch]);
    }

    // Our Strategic Partners
    public function strategicPartners(){
        
        $listStretegicPartnersList = StrategicPartner::where('is_active','0')->paginate(12);
        
        $automationSolutiuon = StrategicPartner::where('strategic_partner_categroy_slug','automation-solutions')->where('is_active','0')->get();
        $fireHidrent = StrategicPartner::where('strategic_partner_categroy_slug','fire-hydrant-sprinkler')->where('is_active','0')->get();
        $fireDetectionSystem = StrategicPartner::where('strategic_partner_categroy_slug','fire-detection-alarm-systems')->where('is_active','0')->get();
        $fireSusppressionSystem = StrategicPartner::where('strategic_partner_categroy_slug','fire-suppression-systems')->where('is_active','0')->get();
        $jointSystems = StrategicPartner::where('strategic_partner_categroy_slug','expansion-joint-systems')->where('is_active','0')->get();
        $HVACSystems = StrategicPartner::where('strategic_partner_categroy_slug','heating-ventilation-and-air-conditioning-hvac')->where('is_active','0')->get();
        $BBTSystems = StrategicPartner::where('strategic_partner_categroy_slug','busbar-trunking-systems-bbt')->where('is_active','0')->get();
        $lightingProtectionSystems = StrategicPartner::where('strategic_partner_categroy_slug','lightning-protection-systems-lps')->where('is_active','0')->get();
        $hotelAndHospitalSystem = StrategicPartner::where('strategic_partner_categroy_slug','hotel-hospital-solutions')->where('is_active','0')->get();
        $officeAndShoppingMal = StrategicPartner::where('strategic_partner_categroy_slug','office-and-shopping-malls-automation-solution')->where('is_active','0')->get();
        $residentialSolutions = StrategicPartner::where('strategic_partner_categroy_slug','automation-solution-for-residences-and-villas')->where('is_active','0')->get();
        $industrialSolution = StrategicPartner::where('strategic_partner_categroy_slug','industrial-and-warehouse-automation-solution')->where('is_active','0')->get();
        $networkingSystem = StrategicPartner::where('strategic_partner_categroy_slug','networking-systems')->where('is_active','0')->get();
        $CCTVSystem = StrategicPartner::where('strategic_partner_categroy_slug','cctv-systems')->where('is_active','0')->get();
        $pbaxSystems = StrategicPartner::where('strategic_partner_categroy_slug','pabx-systems')->where('is_active','0')->get();
        $PASystems = StrategicPartner::where('strategic_partner_categroy_slug','public-address-systems')->where('is_active','0')->get();
        $videoConferance = StrategicPartner::where('strategic_partner_categroy_slug','video-conference-systems')->where('is_active','0')->get();
        $alermSystem = StrategicPartner::where('strategic_partner_categroy_slug','intruder-burglar-alarm-system')->where('is_active','0')->get();
        $metalDetactor = StrategicPartner::where('strategic_partner_categroy_slug','baggage-scanner-metal-detector')->where('is_active','0')->get();
        $parkingSystem = StrategicPartner::where('strategic_partner_categroy_slug','parking-management-systems')->where('is_active','0')->get();
        $digitalLock = StrategicPartner::where('strategic_partner_categroy_slug','digital-hotel-lock-systems')->where('is_active','0')->get();
        
        if($listStretegicPartnersList){
            SEOTools::setTitle('Our Stretegic Partners');
            SEOTools::setDescription('We manage complex projects offering results that fit our client’s needs including general contracting, design, construction management, business development, feasibility studies and production planning among others. We are committed to continuous training and instruction to ensure a safe working environment for our employees and the clients we serve. We also provide a full range of virtual design and construction services, as well as the latest in smart mapping and computerized modeling with our In house expert and chartered highly qualified expert consultant.');
            SEOTools::opengraph()->setUrl(url::current());
            SEOTools::setCanonical(URL::current());
            SEOTools::opengraph()->addProperty('type', 'about-us/strategic-partners');
            SEOTools::twitter()->setSite('cybsam');
            SEOTools::jsonLd()->addImage(URL::current());
            return view('FrontEndView.about-us.our-strategic-partners',[
                'listStretegicPartnersList'=>$listStretegicPartnersList,
                'automationSolutiuon'=>$automationSolutiuon,
                'fireHidrent'=>$fireHidrent,
                'fireDetectionSystem'=>$fireDetectionSystem,
                'fireSusppressionSystem'=>$fireSusppressionSystem,
                'jointSystems'=>$jointSystems,
                'HVACSystems'=>$HVACSystems,
                'BBTSystems'=>$BBTSystems,
                'lightingProtectionSystems'=>$lightingProtectionSystems,
                'hotelAndHospitalSystem'=>$hotelAndHospitalSystem,
                'officeAndShoppingMal' => $officeAndShoppingMal,
                'residentialSolutions'=>$residentialSolutions,
                'industrialSolution'=>$industrialSolution,
                'networkingSystem'=>$networkingSystem,
                'CCTVSystem'=>$CCTVSystem,
                'pbaxSystems'=>$pbaxSystems,
                'PASystems'=>$PASystems,
                'videoConferance'=>$videoConferance,
                'alermSystem'=>$alermSystem,
                'metalDetactor'=>$metalDetactor,
                'parkingSystem'=>$parkingSystem,
                'digitalLock'=>$digitalLock,
            ]);
        }else{
            abort(403);
        }
        
    }
    
    public function DetailsStrategicPartners(Request $request, $strategic_id, $strategic_partner_name){
        $strategic_id = $strategic_id;
        $strategicPartnersName = $strategic_partner_name;
        
        $checkDatabase = StrategicPartner::where('id', $strategic_id)->where('strategic_partners_name',$strategicPartnersName)->where('is_active','0')->first();
        if($checkDatabase){
            $socialShareUrl = URL::current();
            $partName = $checkDatabase->strategic_partners_name;
            $socialShare = \Share::page(
                $socialShareUrl,
                $partName,
            )->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->reddit()
            ->telegram();
            
            SEOTools::setTitle($checkDatabase->strategic_partners_name);
            SEOTools::setDescription($checkDatabase->strategic_partners_about);
            SEOTools::opengraph()->setUrl(url::current());
            SEOTools::setCanonical(URL::current());
            SEOTools::opengraph()->addProperty('type', 'about-us/strategic-partners');
            SEOTools::twitter()->setSite('strategic partner');
            SEOTools::jsonLd()->addImage('public/image/about-us/strategic-partners/'.$checkDatabase->strategic_partners_logo);


            return view('FrontEndView.about-us.singleStrategic',[
                'checkDatabase'=>$checkDatabase,
                'socialShare'=>$socialShare,
            ]);
        }else{
            abort(404);
        }
    }

    public function addLoader(){
        return "view";
    }
}
