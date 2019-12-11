<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;


class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('role_user', function($join){
                $join->on('users.id', '=', 'role_user.user_id');
            })
            ->get();
        //    dd($users);
        return view('admin.index', ['users' => $users]);
    }

    public function show(){
        $users = DB::table('users')
            ->join('role_user', function($join){
                $join->on('users.id', '=', 'role_user.user_id')
                    ->where('role_user.role_id', '=', '1');
            })
            ->get();
        //dd($users);

        return view('admin.show', ['users' => $users]);

    }

    public function create()
    {
        $users = DB::table('users')
            ->join('role_user', function($join){
                $join->on('users.id', '=', 'role_user.user_id')
                    ->where('role_user.role_id', '=', '2');
            })
            ->get();
        //dd($users);

        return view('admin.create', ['users' => $users]);
    }

    public function store(Request $request) {
        
        DB::table('role_user')
            ->where('user_id', $request->user_id)
            ->update(['role_id' => 1]);
        return redirect()->route('admin.create'); //message - létrehozva
    }

    public function destroy(Request $request) {
        
        DB::table('role_user')
            ->where('user_id', $request->user_id)
            ->update(['role_id' => 2]);
        return redirect()->route('admin.show'); //message - törölve
    }
}
