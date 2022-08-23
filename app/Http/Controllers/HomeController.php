<?php

namespace App\Http\Controllers;

use App\Models\Namebord;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    function index(Request $request)
    {
        $user = Auth::user();
        $namebord = new Namebord();
        $namebord->name = $request->name;
        $namebord->userID = $user->id;
        $namebord->save();

//        $data['names'] = Namebord::where('userID',$user->id)->get();
        Session::flash('success', 'تم ارسال الاسم بنجاح');

        return redirect()->back();
    }

    function delete($id)
    {
        $user = Auth::user();

        $name = Namebord::find($id);
        if ($name->userID === $user->id)
        {
            $name->delete();
            Session::flash('success', 'تم حذف الاسم بنجاح');
        }
        return redirect()->back();

    }
}
