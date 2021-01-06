<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Shoot;
use App\Categories;
use App\Comment;
use App\Like;
use App\View;
use App\Hire;
use App\Exhibition;
use App\Contest;
use Auth;
use DB;

class photographerController extends Controller
{
    //
    public function index(){
        
        $shoots=Shoot::orderBy('view','desc')->take(10)->get();
        foreach ($shoots as $shoot) {
            $views=View::where('shoot_id',$shoot->id)->get();
            $shoot=Shoot::find($shoot->id);
            $shoot->view=count($views);
            $shoot->save();

            $likes=Like::where('shoot_id',$shoot->id)->get();
            $shoot=Shoot::find($shoot->id);
            $shoot->like=count($likes);
            $shoot->save();
        }
        $user = Auth::user();
        // dd($user);
        $carts=$user->carts;

        // $hire_reqs=$user->hire_req->where('status');
        $hire_reqs_unseen=$user->photographer_req->where('views','unseen');
        $exhibitions=Exhibition::all();
        $upcomingContest=Contest::where('status','upcoming')->get();
        // dd($hire_reqs_unseen);
        return view('photographer.home')->with(['shoots'=>$shoots,'carts'=>$carts,'hire_reqs_unseen'=>$hire_reqs_unseen,'exhibitions'=>$exhibitions,'upcomingContest'=>$upcomingContest[0]]);
    }
    public function profile(){
        $user = Auth::user();
        $shoots=$user->shoots;

        $carts=$user->carts;
        $hire_reqs_unseen=$user->photographer_req->where('views','unseen');

        // dd($shoots);
        // dd($images);
        // dd($user->wedding_shoots('file_name'));
        // $users = User::get();
        // return view('photographer.profile')->with('users', $users);  
        return view('photographer.profile')->with(['shoots'=>$shoots,'carts'=>$carts,'hire_reqs_unseen'=>$hire_reqs_unseen]);
    }
    public function profileUpdate(Request $req){
        // dd($req->all());
        $req->validate([
            'name' => 'required|string|max:190',
            'tagline' => 'nullable|string|max:190',
            'facebook' => 'nullable|string|max:190',
            'instagram' => 'nullable|string|max:190',
            'address' => 'nullable|string|max:190',
        ]);
        $user= User::find(Auth::user()->id);
        $user->name=$req->name;
        $user->tagline=$req->tagline;
        $user->facebook=$req->facebook;
        $user->instagram=$req->instagram;
        $user->address=$req->address;
        $user->save();
        return redirect()->back();
        // dd($user);
    }
    public function addshoot(Request $req){
        // var sql="insert into "+ $req->category+" values ('')";
        //  $sql=DB::raw("insert into '?' (user_id,caption,file_name,price,about,capture_by,lens,software) values(':user_id',':caption',':file_name',':price',':about',':capture_by',':lens',':software')",[":table_name"=>$req->category, ":user_id"=>Auth::user()->id, ":caption"=>$req->caption, ":file_name"=>$req->file_name, ":price"=>$req->price, ":about"=>$req->about, ":capture_by"=>$req->capture_by, ":lens"=>$req->lens, ":software"=>$req->software]);
        // dd($sql);
        // dd($req->all());
            $req->validate([
                'price' => 'nullable|numeric|digits_between:1,10',
                'file_name' => 'required|image',
                'caption' => 'required|string|max:190',
                'about' => 'nullable|string',
                'capture_by' => 'nullable|string|max:190',
                'lens' => 'nullable|string|max:190',
                'software' => 'nullable|string|max:190',
                'searchTags' => 'required|string|max:190',
            ]);
            // $source_img = 'source.jpg';
            $destination_img = 'destination.jpg';
            // echo "<img src='/assets/images/$req->file_name'>";

            // $d = $this->compress($req->file_name, $destination_img, 70);
            // echo "<img src='$req->file_name'>";
            // dd(filesize($d));
            $email=Auth::user()->email;
            $filename   =   $email.mt_rand(0, 1000);
            // dd($filename);
            $extension  =   $req->file_name->getClientOriginalExtension();
            // $img_name  =   $data['image']->getClientOriginalName();
            $img_size  =   $req->file_name->getSize();
            $img_res =   getimagesize($req->file_name);
            // dd($req->category);
            $filenametostore = $filename.".".$extension;
            $filestore='assets/images/shoots';
            // // $file->move('assets/images/profile_picture',$filenametostore);
            $req->file_name->move($filestore,$filenametostore);
            $user_id=Auth::user()->id;
            // $category_id=DB::table('categories')->find($req->category);
            // $category_id=DB::table('categories')->where('id',1)->get();
            $category=Categories::where('category',$req->category)->get();
            // dd($category[0]->id);
            if($req->price==null){
                $shoot=new Shoot;
                $shoot->user_id=$user_id;
                $shoot->category_id=$category[0]->id;
                $shoot->caption=$req->caption;
                $shoot->file_name=$filenametostore;
                $shoot->capture_by=$req->capture_by;
                $shoot->price=0;
                $shoot->lens=$req->lens;
                $shoot->description=$req->description;
                $shoot->software=$req->software;
                $shoot->search_tags=$req->searchTags;
                $shoot->save();
            }else{
                $shoot=new Shoot;
                $shoot->user_id=$user_id;
                $shoot->category_id=$category[0]->id;
                $shoot->caption=$req->caption;
                $shoot->file_name=$filenametostore;
                $shoot->capture_by=$req->capture_by;
                $shoot->price=$req->price;
                $shoot->lens=$req->lens;
                $shoot->description=$req->description;
                $shoot->software=$req->software;
                $shoot->search_tags=$req->searchTags;
                $shoot->save();
            }
        
        // dd($sql);
        return redirect()->back();
    }

    public function ajaxShoots($shoot_id,$category_id){
        $shellexec = exec('getmac');
        // $shellexec = "F4-D1-08-0A-2E-C7   Media disconnected";
        $views=View::where('shoot_id',$shoot_id)->get();
        foreach ($views as $view) {
            if ($view->mac_address==$shellexec) {
                $shoot=Shoot::find($shoot_id);
                $shoot->view=count($views);
                $shoot->save(); 

                $similar_shoots=Shoot::where('category_id',$category_id)->take(10)->get();
                $shoot = Shoot::find($shoot_id);
                $shoot_comments=$shoot->comments;
                $results=['similar_shoots'=>$similar_shoots,'shoot_comments'=>$shoot_comments];

                return view('ajaxShootDetails')->with('results',$results);
            }
        }
        $view=new View;
        $view->shoot_id=$shoot_id;
        $view->mac_address=$shellexec;
        $view->save();

        $shoot=Shoot::find($shoot_id);
        $shoot->view=count($views);
        $shoot->save();

        $similar_shoots=Shoot::where('category_id',$category_id)->take(10)->get();
        $shoot = Shoot::find($shoot_id);
        $shoot_comments=$shoot->comments;
        // dd($shoot_comments[0]->user_id);
        $results=['similar_shoots'=>$similar_shoots,'shoot_comments'=>$shoot_comments];
        // $results=[$similar_shoots,$wedding_shoot_comments];
        // dd($shoot_id);

        return view('ajaxShootDetails')->with(['results'=>$results,'shoot_id'=>$shoot_id]);
    }

    public function ajaxShootsCategory($category){
        if($category=="trend")
        {
            $shoots=Shoot::orderBy('view','desc')->take(10)->get();
            return view('photographer.ajaxShootsCategory')->with('categoey_shoots',$shoots);
        }else{
            $category_id=Categories::where('category',$category)->get();
            // dd($category_id[0]->id);
            $categoey_shoots=Shoot::where('category_id',$category_id[0]->id)->take(10)->get();
            return view('photographer.ajaxShootsCategory')->with('categoey_shoots',$categoey_shoots);
        } 
        
    }

    public function orderDetails($shoot_id)
    {
        return "hello";
    }

    public function addComment(Request $req)
    {
        $req->validate([
            'comment' => 'required|string|max:190',
        ]);
        $comment=new Comment;
        $comment->user_id=Auth::user()->id;
        $comment->shoot_id=$req->shoot_id;
        $comment->comment=$req->comment;
        $comment->save();
        return redirect()->back();
    }

    public function addLike($shoot_id)
    {
        $likes=Like::where('shoot_id',$shoot_id)->get();
        foreach ($likes as $like) {
            if ($like->user_id==Auth::user()->id) {
                return 'already given';
            }
        }
        $like=new Like;
        $like->shoot_id=$shoot_id;
        $like->user_id=Auth::user()->id;
        $like->save();
        return "like done";
    }

    public function editShoot($shoot_id){
        $shoot = Shoot::find($shoot_id);
        $user = Auth::user();
        $carts=$user->carts;
        $hire_reqs_unseen=$user->photographer_req->where('views','unseen');
        return view('photographer.editShoot')->with(['shoot'=>$shoot,'carts'=>$carts,'hire_reqs_unseen'=>$hire_reqs_unseen]);;
    }
    public function editShootSubmit(Request $req)
    {
        $req->validate([
            'price' => 'nullable|numeric|digits_between:1,10',
            'file_name' => 'required|image',
            'edit_caption' => 'required|string|max:190',
            'about' => 'nullable|string',
            'capture_by' => 'nullable|string|max:190',
            'lens' => 'nullable|string|max:190',
            'software' => 'nullable|string|max:190',
            'edit_searchTags' => 'required|string|max:190',
        ]);
        $email=Auth::user()->email;
            $filename   =   $email.mt_rand(0, 1000);
            // dd($filename);
            $extension  =   $req->file_name->getClientOriginalExtension();
            // $img_name  =   $data['image']->getClientOriginalName();
            $img_size  =   $req->file_name->getSize();
            $img_res =   getimagesize($req->file_name);
            // dd($req->category);
            $filenametostore = $filename.".".$extension;
            $filestore='assets/images/shoots';
            // // $file->move('assets/images/profile_picture',$filenametostore);
            $req->file_name->move($filestore,$filenametostore);
            $user_id=Auth::user()->id;
            // $category_id=DB::table('categories')->find($req->category);
            // $category_id=DB::table('categories')->where('id',1)->get();
            $category=Categories::where('category',$req->category)->get();
            // dd($category[0]->id);
            if($req->price==null){
                $shoot=Shoot::find($req->shoot_id);
                $shoot->user_id=$user_id;
                $shoot->category_id=$category[0]->id;
                $shoot->caption=$req->edit_caption;
                $shoot->file_name=$filenametostore;
                $shoot->capture_by=$req->capture_by;
                $shoot->price=0;
                $shoot->lens=$req->lens;
                $shoot->description=$req->description;
                $shoot->software=$req->software;
                $shoot->search_tags=$req->edit_searchTags;
                $shoot->save();
            }else{
                $shoot=Shoot::find($req->shoot_id);
                $shoot->user_id=$user_id;
                $shoot->category_id=$category[0]->id;
                $shoot->caption=$req->edit_caption;
                $shoot->file_name=$filenametostore;
                $shoot->capture_by=$req->capture_by;
                $shoot->price=$req->price;
                $shoot->lens=$req->lens;
                $shoot->description=$req->description;
                $shoot->software=$req->software;
                $shoot->search_tags=$req->edit_searchTags;
                $shoot->save();
            }
        return redirect()->back();

    }
    
    public function rejectHireReq($hire_id){
        $reject=Hire::find($hire_id);
        $reject->status="reject";
        $reject->views="seen";
        $reject->save();
        return redirect()->back();
        // return "helllo";
    }
    public function acceptHireReq($hire_id){
        $reject=Hire::find($hire_id);
        $reject->status="accept";
        $reject->views="seen";
        $reject->save();
        return redirect()->back();
    }
    public function compress($source, $destination, $quality) {

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);
            
            // $destination=get_file_contents($image);
            // dd($destination);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}
    // public function jobs(){
    //     $user = Auth::user();
    //     $carts=$user->carts;

    //     // $hire_reqs=$user->hire_req->where('status');
    //     $hire_reqs_unseen=$user->hire_req->where('views','unseen');
    //     $myEvents=$user->hire_req;
    //     // dd($myEvent);
    //     return view('photographer.allEvents')->with(['carts'=>$carts,'myEvents'=>$myEvents,'hire_reqs_unseen'=>$hire_reqs_unseen]);
    //     return "";
    // }

    public function joinContest(Request $req)
    {
        $user=User::where('email',$req->email)->get();
        
        if (count($user)>0) {
            // echo "$req->passowrd";
            
            if (Hash::check($req->password, $user[0]->password)) 
            {
                Auth::login($user[0], true);
                echo "match";
            }
            else{
                // dd(Hash::make($req->password));
                // $value = Crypt::decrypt($user[0]->password);
                echo "don't' match ".$req->password."- - - - - - - -          ".Hash::make($req->password);
            }
        } else {
            echo "heelo";
        }
        
        // dd($req->all());
    }
    
}
