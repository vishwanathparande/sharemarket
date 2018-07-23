<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Input;
use Session;
use App\Model\Files;
use App\Model\UserFiles;

class FilesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;

        if ($role == 'user') {

            $query = "SELECT f.id, f.name, f.description, f.path, f.type, uf.start_date, uf.end_date "
                    . "FROM files as f JOIN user_files as uf ON (f.id = uf.file_id) "
                    . "WHERE f.status = 'Active' AND uf.user_id = $user_id "
                    . "AND uf.start_date <= '" . date('Y-m-d') . "' AND uf.end_date >= '" . date('Y-m-d') . "'";

            $result = DB::select(DB::raw($query));
        } else {
            $query = "SELECT f.id, f.name, f.description, f.path, f.type, f.status "
                    . "FROM files as f "
                    . "WHERE f.status = 'Active'";
            $result = DB::select(DB::raw($query));
        }
        return View::make('files.index')->with(compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'file' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('files/create')
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $file = Input::file('file');
            /*
              //Display File Name
              echo 'File Name: ' . $file->getClientOriginalName();
              echo '<br>';
              //Display File Extension
              echo 'File Extension: ' . $file->getClientOriginalExtension();
              echo '<br>';
              //Display File Real Path
              echo 'File Real Path: ' . $file->getRealPath();
              echo '<br>';
              //Display File Size
              echo 'File Size: ' . $file->getSize();
              echo '<br>';
              //Display File Mime Type
              echo 'File Mime Type: ' . $file->getMimeType();
             */
            //Move Uploaded File
            $destinationPath = 'uploads/files';
            $filename = date('dmYHis') . $file->getClientOriginalName();
            $path = $destinationPath . '/' . $filename;
            $file->move($destinationPath, $filename);
            chmod($path, 0777);

            $file = new Files;
            $file->name = Input::get('name');
            $file->description = Input::get('description');
            $file->path = $path;
            $file->created_by = Auth::user()->id;
            $file->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('files');
        }
    }

    public function edit($id = 0) {

        $role = Auth::user()->role;

        if ($role == 'super_admin' || $role == 'admin') {
            $file = Files::find($id);
            if ($file) {
                return View::make('files.edit')->with('file', $file);
            }
            return redirect('files');
        }
        return redirect('files');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id = null) {
        //return Redirect::route('home');
        //return Redirect::to('files');
        return redirect('files');
    }

    public function deletefiles(Request $request) {

        if ($request->ajax()) {

            $userFile = UserFiles::where('file_id', $request->fileId)->first();

            if (!$userFile) {
                $file = Files::find($request->fileId);
                $file->delete();
                $data['message'] = 'success';
            }else{
                $data['message'] = 'You can not delete this video. First unassign the users of this video.';
            }
            echo json_encode($data);
            exit();
        }
    }

}

//https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers