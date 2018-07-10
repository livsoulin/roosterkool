<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Userquest;
use Illuminate\Support\Facades\Session;
use App\Role;
use App\User;
use App\Photo;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',  compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        $roles = Role::all()->pluck('name','id');
        
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Userquest $request)
    {
          if(trim($request->password == '')){
            
            $input = $request->except('password');
            
        }  else {
           
            $input = $request->all();
            
            $input['password'] = bcrypt($request->password);
        }
        
        
       // $input = $request->all();
        if($file = $request->file('photo_id')){
            
            // 
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            // create to table Photo
            $photo = Photo::create(['file'=>$name]);
            
            //get photo_id to user
            $input['photo_id'] = $photo->id;
           
        }
        
        User::create($input);
        
        Session::flash('create_user','The user has been successful!!!');
        
        return back();
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all()->pluck('name','id');
        return view('admin.user.edit',  compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Userquest $request, $id)
    {
        $user = User::find($id);
        
        if(trim($request->password == '')){
            
            $input = $request->except('password');
            
        }  else {
           
            $input = $request->all();
            
            $input['password'] = bcrypt($request->password);
        }
        
        //$input = $request->all();
        
        if ($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            
            $file->move('images',$name);
            
            $photo = Photo::create(['file'=> $name]);
            
            $input['photo_id'] = $photo->id;
            
        }
        
        $user->update($input);
        
        return redirect('admin/user');
        
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        $photoid = $user->photo->id;
        $photodelete = Photo::find($photoid)->delete();
        
        unlink(public_path() . $user->photo->file);
        $user->id;
        $user->delete();
        
        Session::flash('delete_user','The user has been deleted!!!');
        
        return redirect('admin/user');
    }
}

       
      