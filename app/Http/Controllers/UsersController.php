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
use App\User;
use App\Model\Files;
use App\Model\UserFiles;

class UsersController extends Controller {

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

        if ($role == 'super_admin') {
            $query = "SELECT u.* "
                    . "FROM users as u  "
                    . "WHERE u.role in ('user','admin')";
            $result = DB::select(DB::raw($query));
            return View::make('users.index')->with(compact('result'));
        } else if ($role == 'admin') {
            $query = "SELECT u.* "
                    . "FROM users as u  "
                    . "WHERE u.role in ('user')";
            $result = DB::select(DB::raw($query));
            return View::make('users.index')->with(compact('result'));
        }
        return redirect('files');
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
            $queryUser = "SELECT u.* "
                    . "FROM users as u  "
                    . "WHERE u.id = $id";
            $data['user'] = DB::select(DB::raw($queryUser));

            $queryFiles = "SELECT f.id, f.name, f.description, f.path, f.type, f.status, "
                    . "uf.id as ufId, uf.user_id, uf.file_id, uf.start_date, uf.end_date, uf.created_by, uf.created_at "
                    . "FROM files as f LEFT JOIN user_files uf ON (f.id = uf.file_id AND uf.user_id = $id) "
                    . "WHERE f.status = 'Active'";
            $data['files'] = DB::select(DB::raw($queryFiles));

//            echo "<pre>";
//            print_r($data);
//            die;
            if ($data['user']) {
                return View::make('users.edit')->with('result', $data);
            }
            return redirect('users');
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
        return redirect('users');
    }

    public function assignfiles(Request $request) {

        if ($request->ajax()) {

            $userFile = new UserFiles;
            if ($request->userfileId) {
                $userFile->exists = true;
                $userFile->id = $request->userfileId;
            }
            $userFile->user_id = $request->userId;
            $userFile->file_id = $request->fileId;
            $userFile->start_date = $request->startDate;
            $userFile->end_date = $request->endDate;
            $userFile->created_by = Auth::user()->id;
            $userFile->created_at = date('Y-m-d H:i:s');
            $userFile->save();
            echo json_encode('success');
            exit();
        }
    }

    public function unassignfiles(Request $request) {

        if ($request->ajax()) {
            
            $userFile = UserFiles::find($request->userfileId);
            $userFile->delete();
            echo json_encode('success');
            exit();
        }
    }

}

//https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers
