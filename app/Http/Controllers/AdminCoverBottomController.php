<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Photo;
use App\CoverBottom;

class AdminCoverBottomController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $photos = CoverBottom::orderBy('id', 'DESC')->get();

        return view('admin.coverbottom.index', compact('photos'));
    }

    public function store(Request $request) {
        
        if (isset($request->createcoverbottom)) {
            
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

                CoverBottom::create($input);


                Session::flash('create_cover', 'The user has been successful!!!');
            }
        }
        return back();
    }

    public function updatecoverbottom(Request $request) {

        if (isset($request->updatedata)) {
            // update before
            CoverBottom::where('is_active', 1)->update(['is_active' => 0]);

            $id = $request->id;
            if ($id != "") {
                $covebottom = CoverBottom::find($id)->update(['is_active' => 1]);
            }
            return back();
        }
    }

    public function deletecoverbottom($id) {

        $coverbottom = CoverBottom::find($id);

        $photoid = $coverbottom->photo->id;
        $photodelete = Photo::find($photoid)->delete();

        unlink(public_path() . $coverbottom->photo->file);
        $coverbottom->id;

        $coverbottom->delete();

        return back();
    }

}
