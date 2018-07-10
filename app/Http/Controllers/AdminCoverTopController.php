<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Photo;
use App\CoverTop;

class AdminCoverTopController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $photos = CoverTop::orderBy('id','DESC')->get();
        $users = CoverTop::all()->toArray();
        
       // $photoexists = CoverTop::where('is_active',1)->get();

        return view('admin.covertop.index', compact('photos','users'));
        
        

        
    }

    
    public function store(Request $request) {
        
        $input = $request->all();
        
        if ($request->name != ""){
            if ($file = $request->file('name')) {
                // 
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                // create to table Photo
                $photo = Photo::create(['file' => $name]);

                $input['photo_id'] = $photo->id;
            }

            CoverTop::create($input);

            Session::flash('create_cover', 'The user has been successful!!!');
        }
        
        return back();
    }


    public function updatecovertop(Request $request) {
                
        if(isset($request->updatedata)){
        // update before
            CoverTop::where('is_active',1)->update(['is_active' => 0]);

            $id = $request->id;
            if ($id != ""){
                $covetop = CoverTop::find($id)->update(['is_active' => 1]);
            }
            return back();
             
        }
    }
    public function deletecovertop($id) {
        
       $covertop = CoverTop::find($id);
       
       $photoid = $covertop->photo->id;
       
       $photodelete = Photo::find($photoid)->delete();
        
        unlink(public_path() . $covertop->photo->file);
        $covertop->id;
        
        $covertop->delete();
        
        return back();
    }

}
