<?php

namespace App\Http\Controllers\Administrator\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\ProductService;
use App\Models\Project;
use App\Models\ProductServiceSub;
use Error;

class DownloadsController extends Controller
{
    public function indexList(Request $request){
        $downloadFileList = Download::where('is_active',0)->get();
        return view('dashboard.download.index',[
            'downloadFileList'=>$downloadFileList,
        ]);
    }

    public function insertDownload(Request $request){
        $BlogCateg = Blog::where('__blog_status',1)->get();
        $ProductService = ProductService::where('is_active',1)->get();
        $Project = Project::all();
        return view('dashboard.download.insert',[
            'BlogCateg'=>$BlogCateg,
            'ProductService'=>$ProductService,
            'Project'=>$Project,

        ]);
    }

    public function archivelist(){
        $downloadFileList = Download::where('is_active',1)->get();
        return view('dashboard.download.archive',[
            'downloadFileList'=>$downloadFileList,
        ]);
    }


    public function InsertedFileSave(Request $request){
        $request->validate([
            'file_category'=>['required'],
            'image' => ['required','mimes:png,jpg,gif,webp,jpeg,ico,svg'],
            'fileRemarks'=>['required'],
            'uploadFileName'=>['required','mimes:pdf,doc,docx,zip,csv,xls,xlsx','max:10000'],
            
        ],[
            'image.required'=>'Image require',
            'uploadFileName.required'=>'File required and its extension is pdf, csv, doc, docx, xls, xlsx',
            'fileRemarks.required'=>'File name or Remarks required!'
        ]);
        if($request->hasFile('uploadFileName')){
            if($request->file_category == 'null' || $request->file_category == ''){
                return redirect()->back()->with('fileCategoryError','Please select file category');
            }else {
                if($request->input('othersCategory') == 'null' || $request->input('othersCategory') == ''){ 
                    
                    // file category

                    $fileCategory = $request->input('file_category');
                    $explodeCategory = explode('.',$fileCategory);
                    $categoryName = $explodeCategory[1];
                    $categorySlug = Str::slug($categoryName);
                    // end

                    // files extension
                    $fileExtension = $request->file('uploadFileName')->getClientOriginalExtension();
                    $fileType = $request->file('uploadFileName')->getClientMimeType();

                    $currenttime = Carbon::now()->format('Y-m-d-H-i-s-u');
                    $fileRemarksSlug = Str::slug($request->input('fileRemarks'));
                    $fileName = $fileRemarksSlug.'-'.$categorySlug.'-'.$currenttime.'.'.$fileExtension;

                    // location
                    $fileLocation = base_path('/public/files/downloadsFile');

                    $uploadCloudnary = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
                    $url = cloudinary()->getUrl($uploadCloudnary);

                    
                    $request->file('uploadFileName')->move($fileLocation, $fileName);
                
                    $insDownload = new Download();
                    
                    $insDownload->file_category = $categoryName;
                    $insDownload->file_category_slug = $categorySlug;
                    $insDownload->file_extension = $fileType;
                    $insDownload->file_path = $fileLocation;
                    $insDownload->file_name = $fileName;
                    $insDownload->remarks = $request->fileRemarks;
                    $insDownload->picture = $uploadCloudnary;
                    $insDownload->description = $request->description;
                    $dateaSave = $insDownload->save();
                    if($dateaSave){
                        return redirect()->back()->with('fileUploadSuccess','Successfully upload this file');
                    }else{
                        return redirect()->back()->with('fileUploadFailed','Oops man, why are you over-cleaver??? damn f**k!');
                    }
                    

                }else{
                    // others category id and category name
                    $othersCategory = $request->input('othersCategory');
                    $explodeOthersCategory = explode('.',$othersCategory);
                    $othersCateName = $explodeOthersCategory[0];
                    $othersCategoryId = $explodeOthersCategory[1];
                    // end

                    // file category
                    $fileCategory = $request->input('file_category');
                    $explodeCategory = explode('.',$fileCategory);
                    $categoryName = $explodeCategory[1];
                    $categorySlug = Str::slug($categoryName);
                    // end

                    // files extension
                    $fileExtension = $request->file('uploadFileName')->getClientOriginalExtension();
                    $fileType = $request->file('uploadFileName')->getClientMimeType();

                    $currenttime = Carbon::now()->format('Y-m-d-H-i-s-u');
                    $fileRemarksSlug = Str::slug($request->input('fileRemarks'));
                    $fileName = $fileRemarksSlug.'-'.$categorySlug.'-'.$othersCateName.'.'.$currenttime.'.'.$fileExtension;

                    // location
                    $fileLocation = base_path('/public/files/downloadsFile');

                    

                    if($othersCateName == 'blog'){
                        $uploadCloudnary = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
                    
                        $request->file('uploadFileName')->move($fileLocation, $fileName);

                        $insDownload = new Download();
                        $insDownload->blog_id = $othersCategoryId;
                        $insDownload->file_category = $categoryName;
                        $insDownload->file_category_slug = $categorySlug;
                        $insDownload->file_extension = $fileType;
                        $insDownload->file_path = $fileLocation;
                        $insDownload->file_name = $fileName;
                        $insDownload->remarks = $request->fileRemarks;
                        $insDownload->picture = $uploadCloudnary;
                        $insDownload->description = $request->description;
                        $dateaSave = $insDownload->save();
                        if ($dateaSave) {
                            return redirect()->back()->with('fileUploadSuccess','Successfully upload this file');
                        }else {
                            return redirect()->back()->with('fileUploadFailed','Something went wrong to upload this file');
                        }
                    }elseif ($othersCateName == 'product') {
                        $uploadCloudnary = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
                    
                        $request->file('uploadFileName')->move($fileLocation, $fileName);

                        $insDownload = new Download();
                        $insDownload->product_id = $othersCategoryId;
                        $insDownload->file_category = $categoryName;
                        $insDownload->file_category_slug = $categorySlug;
                        $insDownload->file_extension = $fileType;
                        $insDownload->file_path = $fileLocation;
                        $insDownload->file_name = $fileName;
                        $insDownload->remarks = $request->fileRemarks;
                        $insDownload->picture = $uploadCloudnary;
                        $insDownload->description = $request->description;
                        $dateaSave = $insDownload->save();
                        if ($dateaSave) {
                            return redirect()->back()->with('fileUploadSuccess','Successfully upload this file');
                        }else {
                            return redirect()->back()->with('fileUploadFailed','Something went wrong to upload this file');
                        }
                    }elseif ($othersCateName == 'project') {
                        $uploadCloudnary = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
                    
                        $request->file('uploadFileName')->move($fileLocation, $fileName);

                        $insDownload = new Download();
                        $insDownload->project_id = $othersCategoryId;
                        $insDownload->file_category = $categoryName;
                        $insDownload->file_category_slug = $categorySlug;
                        $insDownload->file_extension = $fileType;
                        $insDownload->file_path = $fileLocation;
                        $insDownload->file_name = $fileName;
                        $insDownload->remarks = $request->fileRemarks;
                        $insDownload->picture = $uploadCloudnary;
                        $insDownload->description = $request->description;
                        $dateaSave = $insDownload->save();
                        if ($dateaSave) {
                            return redirect()->back()->with('fileUploadSuccess','Successfully upload this file');
                        }else {
                            return redirect()->back()->with('fileUploadFailed','Something went wrong to upload this file');
                        }
                    }else{
                        return redirect()->back()->with('fileUploadFailed','Oops man, why are you over-cleaver??? damn f**k!');
                    }
                }
                
            }
        }else {
            return redirect()->back()->with('fileUploadFailed','Please select file to upload');
        }
        
    }

    public function ArchiveDownload(Request $request, $archive_id, $file_name){
        
        $file_id = $archive_id;
        $file_name = $file_name;

        $getDataDownload = Download::where('id',$file_id)->where('file_name',$file_name)->update([
            'is_active'=>1,
            'is_active_str' => 'InActive'
        ]);

        if($getDataDownload){
            return redirect()->back()->with('filearchivedone','File Archive complete please check archive folder!');
        }else {
            abort(403);
        }

    }

    public function deleteDownload(Request $request, $archive_id, $file_name){
        $file_id = $archive_id;
        $file_name = $file_name;
        $deltfromdb = Download::where('id',$file_id)->where('file_name',$file_name)->first();
        $fileNameForUnlink = $deltfromdb->file_path.$deltfromdb->file_name;
        unlink($fileNameForUnlink);
        $deltfromdb->delete();

        if($deltfromdb){
            return redirect()->back()->with('filedeletefone','File delete complete');
        }else {
            abort(403);
        }
    }

    public function restoreDownload(Request $request, $restore_id){
        $restore_id = $restore_id;
        $restoreFile = Download::where('id',$restore_id)->update([
            'is_active'=>0,
            'is_active_str'=>'Active'
        ]);
        if ($restoreFile) {
            return redirect()->back()->with('restoreComplete','File restore complete!');
        }else {
            abort(403);
        }
    }

}
