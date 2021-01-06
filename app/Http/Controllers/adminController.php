<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoot;
use App\User;
Use App\Cart;
Use App\Feedback;
Use App\Categories;
Use App\Exhibition;
Use App\ExbImages;
Use App\Contest;

class adminController extends Controller
{
    //
    public function index(){
        $carts=Cart::all();
        $users=User::all();
        $users2=User::orderby('id','desc')->take(2)->get();
        $shoots=Shoot::all();
        $shoots2=Shoot::orderby('id','desc')->take(2)->get();
        $feedbacks=Feedback::all();
        $feedbacks2=Feedback::orderby('id','desc')->take(2)->get();
        return view('admin.home',['carts'=>$carts,'users'=>$users,'shoots'=>$shoots,'feedbacks'=>$feedbacks,'users2'=>$users2,'shoots2'=>$shoots2,'feedbacks2'=>$feedbacks2]);
    }
    public function users(){
        $users=User::all();
        return view('admin.users',['users'=>$users]);
    }
    public function shoots(){
        $shoots=Shoot::all();
        return view('admin.shoots',['shoots'=>$shoots]);
    }
    public function orders(){
        return view('admin.orders');
    }
    public function settings(){
        return view('admin.settings');
    }
    public function history(){
        return view('admin.settings');
    }
    public function usersBlock($id){
        $users=User::find($id);
        $users->status='block';
        $users->save();
        return redirect()->back();
    }
    public function usersAdd($id){
        $users=User::find($id);
        $users->status='active';
        $users->save();
        return redirect()->back();
    }
    public function ajaxSearchUsers($str){
        $users=User::where('name','like','%'.$str.'%')->get();
        return view('admin.ajaxSearchUsers',['users'=>$users]);
    }
    public function shootDelete($id){
        $users=Shoot::destroy($id);
 
        return redirect()->back();
    }
    public function ajaxUsersStatus($str){
        if ($str=="block") {
            $users=User::where('status',$str)->get();
            return view('admin.ajaxUsersStatus',['users'=>$users]);
            
        } elseif($str=="active") {
            $users=User::where('status',$str)->get();
            return view('admin.ajaxUsersStatus',['users'=>$users]);
        }else{
           $users=User::all();
            return view('admin.ajaxUsersStatus',['users'=>$users]); 
        }
    
    }
    public function ajaxUsersType($str){
        $users=User::where('type',$str)->get();
        return view('admin.ajaxUsersStatus',['users'=>$users]);
    }
    public function ajaxFreeShoots($str){
        if ($str=="free") {
            $shoots=Shoot::where('price','=','0')->get();
            return view('admin.ajaxFreeShoots',['shoots'=>$shoots]);    
        } elseif($str=="premium") {
            $shoots=Shoot::where('price','>','0')->get();
            return view('admin.ajaxFreeShoots',['shoots'=>$shoots]); 
        }else{
            $shoots=Shoot::all();
            return view('admin.ajaxFreeShoots',['shoots'=>$shoots]);
        }
    
    }
    public function exhibition(){
        // $carts=Cart::all();
        // $users=User::all();
        // $users2=User::orderby('id','desc')->take(2)->get();
        // $shoots=Shoot::all();
        // $shoots2=Shoot::orderby('id','desc')->take(2)->get();
        // $feedbacks=Feedback::all();
        // $feedbacks2=Feedback::orderby('id','desc')->take(2)->get();
        $exhibitions=Exhibition::all();
        return view('admin.addExhibition',['exhibitions'=>$exhibitions]);
    }
    public function addExhibition(Request $req)
    {
        $newExhibition= new Exhibition;
        $newExhibition->exhibition_name=$req->exhibition_name;
        $newExhibition->exhibition_address=$req->exhibition_address;
        $newExhibition->about_exhibition=$req->about_exhibition;
        $newExhibition->save();
        return redirect()->back();
        // dd($req->all());
    }
    public function addExhibitionImagesPage($id)
    {
        session()->put('exb_id',$id);
        $exhibition=Exhibition::where('id',$id)->get();
        session()->put('exb_name',$exhibition[0]->exhibition_name);
        $exb_images=$exhibition[0]->exb_images;
        return view('admin.addExhibitionImages',['exhibition'=>$exhibition,'exbImages'=>$exb_images]);
    }
    public function addExhibitionImages(Request $req)
    {
        $filename   =   session()->get('exb_name').mt_rand(0, 1000);
        // dd($filename);
        $extension  =   $req->image->getClientOriginalExtension();
        $filenametostore = $filename.".".$extension;
        // dd($filename);
        $filestore='assets\images\exhibition_images';
        // // $file->move('assets/images/profile_picture',$filenametostore);
        $req->image->move($filestore,$filenametostore);

        $newExbimages= new ExbImages;
        $newExbimages->exhibition_id=session()->get('exb_id');
        $newExbimages->image_caption=$req->image_caption;
        $newExbimages->image_name=$filenametostore;
        $newExbimages->about_image=$req->about_image;
        $newExbimages->save();
        return redirect()->back();
        // dd($req->session()->get('exb_id'));
    }
    public function editExhibitionImages($id)
    {
        $image=ExbImages::find($id);
        return view('admin.editExbImages',['image'=>$image]);
        dd($image);
    }
    public function editImage(Request $req)
    {
        $image="";
        if ($req->newimage=="") {
            $editedExbimages= ExbImages::find($req->id);
            // dd($editedExbimages->exhibition->id);
            $editedExbimages->image_caption=$req->image_caption;
            $editedExbimages->about_image=$req->about_image;
            $editedExbimages->save();
            // $image=ExbImages::find($editedExbimages->exhibition->id);
            $exhibition=Exhibition::where('id',$editedExbimages->exhibition->id)->get();
            $exb_images=$exhibition[0]->exb_images;
            return view('admin.addExhibitionImages',['exhibition'=>$exhibition,'exbImages'=>$exb_images]);
        }else{
            $filename   =   session()->get('exb_name').mt_rand(0, 1000);
            // dd($filename);
            $extension  =   $req->newimage->getClientOriginalExtension();
            $filenametostore = $filename.".".$extension;
            // dd($filename);
            $filestore='assets\images\exhibition_images';
            // // $file->move('assets/images/profile_picture',$filenametostore);
            $req->newimage->move($filestore,$filenametostore);
            $editedExbimages= ExbImages::find($req->id);
            $editedExbimages->image_caption=$req->image_caption;
            $editedExbimages->image_name=$filenametostore;
            $editedExbimages->about_image=$req->about_image;
            $editedExbimages->save();
            //return redirect()->back();
            // $image=ExbImages::find($editedExbimages->exhibition->id);
            $exhibition=Exhibition::where('id',$editedExbimages->exhibition->id)->get();
            $exb_images=$exhibition[0]->exb_images;
            return view('admin.addExhibitionImages',['exhibition'=>$exhibition,'exbImages'=>$exb_images]);

        }
    }
    public function editMainExhibition($id)
    {
        $exhibition = Exhibition::find($id);
        return view('admin.editMainExhibition',['exhibition'=>$exhibition]);
    }
    public function postEditMainExhibition(Request $req)
    {
        // dd($req->exhibition_id);
        $editedExhibition= Exhibition::find($req->exhibition_id);
        $editedExhibition->exhibition_name=$req->exhibition_name;
        $editedExhibition->exhibition_address=$req->exhibition_address;
        $editedExhibition->about_exhibition=$req->about_exhibition;
        $editedExhibition->save();
        $exhibition=Exhibition::where('id',$req->exhibition_id)->get();
        $exb_images=$exhibition[0]->exb_images;
        return view('admin.addExhibitionImages',['exhibition'=>$exhibition,'exbImages'=>$exb_images]);
    }
    public function contests()
    {
        $contests=Contest::all();
        return view('admin.addcontest',['contests'=>$contests]);
    }
    public function addContest(Request $req)
    {
        // dd($req->reg_deadline);
        // $month=substr($req->reg_deadline,5,-3); //month
        // $date=substr($req->reg_deadline,-2); //date
        // dd($date);
        // if (date("Y-m-d")<$req->reg_deadline) {
        //     echo "upcoming";
        // }else
        // {
        //     echo "running";
        // }
        // dd();
        $filename   =  str_replace(' ', '', $req->title).mt_rand(0, 1000);
        $extension  =   $req->image->getClientOriginalExtension();
        $filenametostore = $filename.".".$extension;
        $filestore='assets\images\contests';
        $req->image->move($filestore,$filenametostore);

        $newContest= new Contest;
        $newContest->title=$req->title;
        $newContest->image=$filenametostore;
        $newContest->description=$req->description;
        $newContest->reg_deadline=$req->reg_deadline;
        $newContest->contest_from=$req->contest_from;
        $newContest->contest_to=$req->contest_to;
        $newContest->entry_fee=$req->entry_fee;
        if (date("Y-m-d")<$req->reg_deadline) {
            $newContest->status="upcoming";
        }elseif (date("Y-m-d")>=$req->contest_from && date("Y-m-d")<=$req->contest_to){
            $newContest->status="running";
        }else{
            $newContest->status="expired"; 
        }
        $newContest->save();
        return redirect()->back();

    }
}
