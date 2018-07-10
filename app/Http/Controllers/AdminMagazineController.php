<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Magazine;
use App\Photo;

class AdminMagazineController extends Controller
{
    
    public function index()
    {
        $magazines = Magazine::all();
        return view('admin.magazine.index',  compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.magazine.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo_id' => 'required',
            'file_download' => 'required',
            'count' => 'required',
        ]);
         $input = $request->all();
        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            // create to table Photo
            $photo = Photo::create(['file'=>$name]);
            //get photo_id to user
            $input['photo_id'] = $photo->id;  
        }
        
        Magazine::create($input);
        
        Session::flash('create_magazine','The user has been successful!!!');
        
        return back();
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $magazine = Magazine::find($id);
        
        return view('admin.magazine.edit',  compact('magazine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'file_download' => 'required',
        ]);
        $magazine = Magazine::find($id);
        $input = $request->all();
        
        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            // create to table Photo
            $photo = Photo::create(['file'=>$name]);
            //get photo_id to user
            $input['photo_id'] = $photo->id;  
        }
        
        $magazine->update($input);
        
         return redirect('admin/magazine');
    }

    public function destroy($id)
    {
        $magazine = Magazine::find($id);
        
        $photoid = $magazine->photo->id;
        $photodelete = Photo::find($photoid)->delete();
        
        unlink(public_path() . $magazine->photo->file);
        $magazine->id;
        $magazine->delete();
        
        Session::flash('delete_magazine','The magazine has been deleted!!!');
        
        return redirect('admin/magazine');
    }
}
