<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $messages = DB::table('messages')
                        ->join('users', 'users.id', '=', 'messages.userid')
                        ->select('users.id', 'users.name', 'messages.mid', 'messages.title', 'messages.body', 'messages.read', 'messages.created_at')
                        ->orderBy('users.name', 'asc')
                        ->orderBy('messages.mid', 'desc')
                        ->get();

        return view('message.index', ['messages' => $messages, 'buttons' => $_GET['buttons']]);
    }


    public function create()
    {
        $users = DB::table('users')
        ->join('role_user', function($join){
            $join->on('users.id', '=', 'role_user.user_id');
        })
        ->orderBy('users.name', 'asc')
        ->get();
    //    dd($users);
        return view('message.create', ['users' => $users]);
    }


    public function store(Request $request)
    {
 //e-mail a feltöltött üzivel

        $adminid = Auth::id();

        if ($request->m_body != null) {
            DB::table('messages')->insert([
                'creator'    => $adminid,
                'userid'     => $request->m_user,
                'title'      => $request->m_title,
                'body'       => $request->m_body,
                'read'       => 0,
                'created_at' => now(),
                'updated_at' => now(),
                ]);

            return redirect()->back()->with('success', 'Sikeres üzenetküldés!');
        }
        else {
            return redirect()->back()->with('error', 'Kérem írja be az üzenet szövegét!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }


    public function edit(Request $request)
    {
        $users = DB::table('users')
        ->join('role_user', function($join){
            $join->on('users.id', '=', 'role_user.user_id');
        })
        ->orderBy('users.name', 'asc')
        ->get();

        $messages = DB::table('messages')
                        ->join('users', 'users.id', '=', 'messages.userid')
                        ->select('users.id', 'users.name', 'messages.mid', 'messages.title', 'messages.body')
                        ->where('messages.mid', '=', $request->m_id)
                        ->get();
        //dd($messages);
        return view('message.edit', ['messages' => $messages], ['users' => $users]);
    }

    public function update(Request $request)
    {
        $updated_at = now();
        //dd($u_id);
        DB::table('messages')
                ->where('mid', '=', $request->m_id)
                ->update(['title' => $request->m_title , 'body' => $request->m_body, 'userid' => $request->m_user, 'read' => 0, 'updated_at' => $updated_at]);
        
        return redirect()->back()->with('success', 'Sikeres módosítás!');
    }

    public function destroy(Request $request)
    {
        DB::table('messages')
                ->where('mid', '=', $request->m_id)
                ->delete();

        return redirect()->back()->with('success', 'Sikeres üzenet törlés!');
    }
}
