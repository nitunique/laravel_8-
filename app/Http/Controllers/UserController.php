<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Encryption\DecryptException;
use Validator;
use Session;
use Crypt;
use App\Models\User;
use App\Models\Usermodel;
use App\Models\Rolemodel;

class UserController extends Controller
{
    //List of Roles
    public function list()
    {
        $users = DB::table('usermodels')
        ->join('rolemodels', 'rolemodels.id', '=', 'usermodels.role_id')
        ->select('rolemodels.role', DB::raw('count(*) as total'))
        ->groupBy('role_id','role')
        ->get();
        return view('list',compact('users'));
    }

    //User Register
    public function register()
    {
        return view('user.register');  
    }

    public function registerUser(Request $request)
    {
        $request->validate([  
            'name'=>'required',  
            'email'=>'required',
            'password'=>'required',   
        ]);  
        $users = new User;  
        $users->name =  $request->input('name');  
        $users->email = $request->input('email');  
        $users->password = Crypt::encrypt($request->input('password'));
        $users->save(); 
        $request->session()->put('users',$request->input('name'));
        return redirect('/');
    }

    //User Login
    public function login()
    {
        return view('user.login');  
    }

    public function loginuser(Request $request)
    {
        $user =  User::where("email",$request->input('email'))->get();
        if(Crypt::decrypt($user[0]->password)==$request->get('password'))
        {
            $request->session()->put('users',$user[0]->name);
            return redirect('/');
        }else{
            return redirect('/login');
        } 
    }

    //User Logout
    public function logout(Request $request)
    {
        Session::forget('users');
        return redirect('/login');
    }

    public function movieList()
    {
        $movies = Http::get('https://www.omdbapi.com/?s=batman&apikey=d8e76205')->json();
        return view('movielist',compact('movies'));
    }

    public function search(Request $request)
    {
        $query = $request->get('input');
        $movies = Http::get('https://www.omdbapi.com/?s=batman&apikey=d8e76205')->json();
        $datas = $movies['Search'];
        if($datas!=null)
        {
            dd($datas);
        }
        // where('Title','like','%'.$request->input('query').'%')->get();
        // dd($result);
       // return view('search',compact('movies'));
    }

    public function favMark()
    {
        return "FavMark";
    }
}
