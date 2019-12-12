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
    // 1-es id-t ne lehessen átírni
        DB::table('role_user')
            ->where('user_id', $request->user_id)
            ->update(['role_id' => 2]);
        return redirect()->route('admin.index'); //message - törölve
    }

    public function destroy(Request $request) {
    //1-es id-t ne lehessen törölni    
        DB::table('role_user')
            ->where('user_id', $request->user_id)
            ->update(['role_id' => 2]);
        return redirect()->route('admin.index'); //message - törölve
    }
}
