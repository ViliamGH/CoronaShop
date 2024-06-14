<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class SlideshowController extends Controller
{
    function listAll()
    {
        $slideshow = Slideshow::paginate(5);
        return view('admins.components.table', compact('slideshow'));
    }

    function clickEye(String $id, String $action)
    {
        $slideshow = Slideshow::find($id);
        $slideshow->enable = ($action == '1' ? 0 : 1);
        $slideshow->save();
        $slideshow = Slideshow::orderBy('ssorder', 'asc')->paginate(5);
        return redirect()->back();
    }

    function moveUD(String $id, String $action)
    {
        $slideshow = Slideshow::find($id);
        $upData = null;
        if ($action == "1") {
            $upData = Slideshow::where('ssorder', '<', $slideshow->ssorder)->orderBy('ssorder', 'asc')->first();
            if ($upData != null) {
                $tmp = $slideshow->ssorder;
                $slideshow->ssorder = $upData->ssorder;
                $upData->ssorder = $tmp;
                $slideshow->save();
                $upData->save();
            }
        } else {
            $downData = Slideshow::where('ssorder', '>', $slideshow->ssorder)->orderBy('ssorder', 'desc')->first();
            if ($downData != null) {
                $tmp = $slideshow->ssorder;
                $slideshow->ssorder = $downData->ssorder;
                $downData->ssorder = $tmp;
                $slideshow->save();
                $downData->save();
            }
        }
        return redirect("/admins/components");
    }
    function deleteID(String $id)
    {
        $slideshow = Slideshow::find($id);
        if ($slideshow != null) {
            $slideshow->delete();
            $iname = $slideshow->img;
            $image = public_path() . "/imgs/slideshows/" . $iname;
            $thumbnail = public_path() . "/imgs/slideshows/thumbnail/" . $iname;
            if (file_exists($image)) {
                unlink($image);
            }
            if (file_exists($thumbnail)) {
                unlink($thumbnail);
            }
            return redirect("/admins/components")->with('success', 'Slideshow has been deleted successfully!');
        } else {
            return redirect("/admins/components")->with('fail', 'Slideshow is not found!');
        }
    }
    function Form()
    {
        return view('admins.components.form');
    }
    function Add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'txtTitle' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {

            $slideshow = new Slideshow();

            $slideshow->title = $request->txtTitle;
            $slideshow->subtitle = $request->txtSubtitle;
            $slideshow->text = $request->txtText;
            $slideshow->link = $request->txtLink;
            $slideshow->enable = "0";
            $slideshow->ssorder = Slideshow::orderBy('ssorder', 'desc')->pluck('ssorder')->first() + 1;
            if ($request->has('txtEnable')) {
                $slideshow->enable = "1";
            }

            // name
            $exten = $request->file('txtFile')->getClientOriginalExtension();
            $iname = time() . "." . $exten;
            $pathname = public_path('imgs/slideshows');

            //thumbnail
            $image = Image::make($request->file('txtFile'));
            $image->resize(70, 70);
            $image->save($pathname . "/thumbnail/" . $iname); 

            // move image
            $request->file('txtFile')->move($pathname, $iname);
            $slideshow->img = $iname;
            $slideshow->save();

            return redirect('/admins/components');
        }
    }
    function Edit(String $id)
    {
        $slideshow = Slideshow::find($id);
        return view('admins.components.form', compact('slideshow'));
    }
    function Update(Request $request)
    {
        $id = $request->txtssid;
        $slideshow = Slideshow::find($id);
        if ($slideshow) {

            $slideshow->title = $request->txtTitle;
            $slideshow->subtitle = $request->txtSubtitle;
            $slideshow->text = $request->txtText;
            $slideshow->link = $request->txtLink;
            $slideshow->enable = 0;
            if (isset($slideshow['enable'])) {
                $slideshow->enable = 1;
            }
            if ($request->hasFile('txtFile')) {
                // name
                $exten = $request->file('txtFile')->getClientOriginalExtension();
                $iname = time() . "." . $exten;
                $pathname = public_path('imgs/slideshows');

                //thumbnail
                $image = Image::make($request->file('txtFile'));
                $image->resize(70, 70);
                $image->save($pathname . "/thumbnail/" . $iname);

                // move image
                $request->file('txtFile')->move($pathname, $iname);

                //delete image
                $oimage = $slideshow->img;
                unlink($pathname . "/thumbnail/" . $oimage);
                unlink($pathname . "/" . $oimage);

                $slideshow->img = $iname;
            }
            $slideshow->save();
        }
        return redirect('/admins/components');
    }
}
