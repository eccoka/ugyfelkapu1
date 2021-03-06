<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use File;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }


    public function index()
    {
        $users = DB::table('users')
            ->join('role_user', function($join){
                $join->on('users.id', '=', 'role_user.user_id');
            })
            ->orderBy('users.name', 'asc')
            ->get();
        //    dd($users);
        return view('admin.index', ['users' => $users]);
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function edit(Request $request)
    {

    }

    public function store(Request $request) {
        
        DB::table('role_user')
            ->where('user_id', $request->user_id)
            ->update(['role_id' => 1]);
        return redirect()->route('admin.index'); //message - létrehozva
    }

    public function update(Request $request) {
        if ($request->user_id != 1){
            DB::table('role_user')
                ->where('user_id', $request->user_id)
                ->update(['role_id' => 2]);
        }
        return redirect()->route('admin.index'); //message - törölve
    }

    public function destroy(Request $request) {
        if ($request->user_id != 1){

            $dir = DB::table('users')
                ->select('path')    
                ->where('id', '=', $request->user_id)
                ->get();
                
            $path_a[] = 'downloads';
            $path_a[] = $dir[0]->path; 
            $path = implode('/', $path_a);
            
            File::deleteDirectory($path);

            DB::table('files')
                ->where('userid', $request->user_id)
                ->delete();    

            DB::table('role_user')
                ->where('user_id', $request->user_id)
                ->delete();

            DB::table('users')
                ->where('id', $request->user_id)
                ->delete();
                
            DB::table('messages')
                ->where('userid', $request->user_id)
                ->delete();
// üzeneteket is töröljem majd!!!    
        }
        return redirect()->route('admin.index')->with('success', 'A törlés sikeres!'); 
//message - törölve
    }
}
