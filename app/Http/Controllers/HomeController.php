<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Shoot;
use App\Categories;
use App\View;
use App\Like;
use App\Exhibition;
use App\Contest;
use Artisan;
// use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Auth::user()->type);
        
        if(Auth::check()){
            if(Auth::user()->type=="photographer"){
                return redirect()->action("PhotographerController@index");
            }elseif(Auth::user()->type=="client"){
                return redirect()->action("ClientController@index");
            }elseif(Auth::user()->type=="admin"){
                return redirect()->action("AdminController@index");
            }
        }else{
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
            $exhibitions=Exhibition::all();
            $upcomingContest=Contest::where('status','upcoming')->get();
            $runningContest=Contest::where('status','running')->get();
            // dd($contest[0]->title);
            dd($runningContest);
            return view('home',['shoots'=>$shoots,'exhibitions'=>$exhibitions,'upcomingContest'=>$upcomingContest[0],'runningContest'=>$runningContest[0]]);
        }
        // dd($shoots[0]->id);        
        
        // return "";
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

        return view('ajaxShootDetails')->with('results',$results);
    }
    public function ajaxShootsCategory($category){
        if($category=="trend")
        {
            $shoots=Shoot::orderBy('view','desc')->take(10)->get();
            return view('ajaxShootsCategory')->with('categoey_shoots',$shoots);
        }else{
            $category_id=Categories::where('category',$category)->get();
            // dd($category_id[0]->id);
            $categoey_shoots=Shoot::where('category_id',$category_id[0]->id)->take(10)->get();
            return view('ajaxShootsCategory')->with('categoey_shoots',$categoey_shoots);
        } 
        
    }

    public function ajaxSearchShoots($str)
    {
        $shoots=Shoot::where('search_tags','like','%'.$str.'%')->get();

        return view('ajaxSearchShoots',['shoots'=>$shoots]);
    }
    public function exhibition($id)
    {
        $exhibition=Exhibition::find($id);
        return view('exhibition',['exhibition'=>$exhibition]);
    }
    public function popup()
    {
        return view('popupcontest');
    }
}
