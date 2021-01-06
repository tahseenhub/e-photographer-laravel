<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/signin/type';
    protected function redirectTo()
    {
        // dd($user);
        if ( Auth::user()->type == 'admin' ) {// do your margic here
            return route('admin.index');
        }
        else if ( Auth::user()->type == 'photographer' ) {// do your margic here
            return route('photographer.index');
        }
        else if ( Auth::user()->type == 'client' ) {// do your margic here
            return route('client.index');
        }
        return redirect('/home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:190'],
            'email' => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'image' => ['required','image','mimes:jpeg,png,jpg','max:1000000'],
            'type' => ['required'],
            // 'image' => 'nullable| image|mimes:jpeg,png,jpg|max:10240'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        // $filename   =   $fromUser.Str::random(4).$toUser.($maxMessageId+1);
        // $data['image']->resize(null, 200, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        // dd($data['image']);
        $filename   =   $data['email'];
        $extension  =   $data['image']->getClientOriginalExtension();
        // $img_name  =   $data['image']->getClientOriginalName();
        // $img_size  =   $data['image']->getSize();
        
        $filenametostore = $filename.".".$extension;
        // $file->move('assets/images/profile_picture',$filenametostore);
        $data['image']->move('assets/images/profile_picture',$filenametostore);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $filenametostore,
            'type' => $data['type'],
        ]);
    }


    public function redirectToProvider($req)
    {
        // dd($req);

       session()->put('type',$req);
    //    dd(session()->get('type'));
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        // dd($req);
        $type=session()->get('type');
        session()->flush();
        // dd($type);
        $user = Socialite::driver('google')->stateless()->user();
        $img_url=$user->avatar;
        // dd($url);
        $email=$user->email;
        $checkEmail=User::where('email',$email)->get();
        // dd(count($checkEmail));
        if(count($checkEmail)==0)
        {
            // return "hello";
            
            // $get_image = file_get_contents($img_url);//Get the file
            $get_image=$this->curl_get_file_contents($img_url);
            // dd($get_image);
            // $extension=pathinfo($img_url, PATHINFO_EXTENSION);
            $extension='jpg';
            // dd($extension);
            $fileName=$email.".".$extension;
            $path=public_path('assets/images/profile_picture/');//public path
            // dd($path);
            // $get_image->move($path.$fileName,$filenametostore);
            // $saveImageIndirectory=file_put_contents($path.'/'.$fileName, $get_image);
            $this->file_put_contents($path.'/'.$fileName, $get_image);
            // dd($saveImageIndirectory);
            // echo "<img src ='$img_url' alt='hello'>";
            $new_user=new User;
            $new_user->name=$user->name;
            $new_user->email=$email;
            $new_user_pasd=mt_rand(100000, 999999);
            Mail::to($email)->send(new SendMail($new_user_pasd));
            $new_user->password=Hash::make($new_user_pasd);
            // $new_user->password=mt_rand(100000, 999999);
            $new_user->image=$fileName;
            $new_user->type=$type;
            // $new_user->updated_at=date('Y-m-d H:i:s');
            // $new_user->created_at=date('Y-m-d H:i:s');
            $new_user->save();
            auth()->login($new_user, true);
            if($type=="photographer")
            {
                return redirect()->action("PhotographerController@index");
            }
            else if($type=="client")
            {
                return redirect()->action("ClientController@index");
            }
        }
        else{
            $exist_user=User::where('email',$email)->get();
            // dd($exist_user);
            Auth::login($exist_user[0], true);
            if($exist_user[0]->type=="photographer")
            {
                return redirect()->action("PhotographerController@index");
            }
            else if($exist_user[0]->type=="client")
            {
                return redirect()->action("ClientController@index");
            }
            // dd($exist_user);
            // session()->put('email',$email.'already have an account');
            // return redirect()->action("SigninController@index");
        }
        // dd($checkEmail);

        // $user->token;
    }

    public function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }
    public function file_put_contents($filename, $filedata) 
    {
        if ($fp = fopen($filename, "wb")) 
        {
        fwrite($fp, $filedata);
        fclose($fp);
        return(true);
        }
        return(false);
    }
}
