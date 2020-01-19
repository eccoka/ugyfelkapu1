<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function showMessages(){
        $id = Auth::user()->id;
        $messages = DB::table('messages')
                        ->where('userid', '=', $id)
                        ->orderBy('mid', 'desc')
                        ->get();
        
        return view('messages', ['messages' => $messages]);
    }

    public function showFiles(){
        $id = Auth::user()->id;
        $files = DB::table('files')
                    ->where('userid', '=', $id)
                    ->orderBy('fid', 'desc')
                    ->get();

        return view('files', ['files' => $files]);
    }

    public function readMessages(Request $request){  

        DB::table('messages')
                ->where('mid', '=', $request->mid)
                ->update(['read' =>1]);

        return redirect()->back()->with('success', 'Köszönjük, hogy elolvasta!');
    }

    public function changePersonal(){  
        $id = Auth::user()->id;
        $users = DB::table('users')
                    ->where('id', '=', $id)
                    ->get();

        return view('personal', ['users' => $users]);
    }

    public function storePersonal(Request $request){
        $id = Auth::user()->id;
        $password = Hash::make($request->password);
        $users = DB::table('users')
                    ->where('id', '=', $id)
                    ->update(['name' => $request->name, 'tel' => $request->tel, 'password' => $password]);

        return redirect()->back()->with('success', 'Sikeres adatmódosítás!');  
    }

}
