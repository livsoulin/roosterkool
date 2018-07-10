<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Photo;
use App\Logo;

class AdminLogoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $photos = Logo::orderBy('id', 'DESC')->get();

        return view('admin.logo.index', compact('photos'));
    }

    public function store(Request $request) {
        $input = $request->all();
        if ($request->name != "") {
            if ($file = $request->file('name')) {

                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);

                // create to table Photo
                $photo = Photo::create(['file' => $name]);

                $input['photo_id'] = $photo->id;
            }

            Logo::create($input);


            Session::flash('create_logo', 'The user has been successful!!!');
        }
        return back();
    }

    public function updatelogo(Request $request) {

        if (isset($request->updatedata)) {
            // update before
            Logo::where('is_active', 1)->update(['is_active' => 0]);

            $id = $request->id;
            if ($id != "") {
                $logo = Logo::find($id)->update(['is_active' => 1]);
            }
            return back();
        }
    }

    public function deletelogo($id) {

        $logo = Logo::find($id);

        $photoid = $logo->photo->id;
        $photodelete = Photo::find($photoid)->delete();

        unlink(public_path() . $logo->photo->file);
        $logo->id;

        $logo->delete();

        return back();
    }

}
