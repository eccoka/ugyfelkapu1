<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class FileController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //felhsználók akikhez van file.
        return view('file.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')
            ->join('role_user', function($join){
                $join->on('users.id', '=', 'role_user.user_id');
            })
            ->orderBy('users.name', 'asc')
            ->get();
        //    dd($users);
        return view('file.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // dump(request()->all());
        // E-mail-t küldjön h fel lett a usernek föltve file!!
        $filees = array();
        $userid = $request->userid;
        $filepath_1 = DB::table('users')
                        ->select('path')
                        ->where('id', '=', $userid)
                        ->get();
        $filepath_11 = $filepath_1[0]->path;
        $path_array = array('downloads', $filepath_11);
        $path = implode("/", $path_array);               

        if($files = $request->file('filenames')){
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $file->move($path, $name);
                $filees[] = $name;
            
                DB::table('files')->insert([
                    'userid' => $userid,
                    'filename'  => $name,
                    'filepath'  => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ]);
            }
        }
        //echo $filepath_11;
        //dd($filepath_11);
        return redirect()->back()->with('message', 'Successfully Save Your Image file.'); // feltöltve üzi kell. Email küldés kell.
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //usert választva ahhoz tartozó fileokat megjeleníti - törlés gomb egyesével!
    }


    public function edit(File $file)
    {
        //
    }

 
    public function update(File $file)
    {
        //
    }

    public function destroy(File $file)
    {
        // show-ból meghatározott user meghatározott file-ját törli.
        // törlés a files táblából
        // File törlése a könyvtárból!
    }
}
