<?php

namespace App\Http\Controllers\ProfileMy;

use App\Http\Controllers\Controller;
use App\Short_link;
use Illuminate\Http\Request;

class My extends Controller
{
    public function genarationShortLink()
    {
        $generateArray = array_merge(range('A', 'Z'), range('a', 'z'));
        $count = 3;
        $generateURL = '';
        for ($i = 0; $i < $count; $i++) {
            $index = rand(0, count($generateArray) - 1);
            $generateURL .= $generateArray[$index];
        }
        return $generateURL;
    }

    public function createLinks(Request $request)
    {
        $checkPost = $request->post('subHttp');
        if(!is_null($checkPost)) {
            $link = new Short_link();
            $link->id_user = $id_user = '1';
            $link->long_link = $request->post('originalHttp');
            $link->short_link = $this->genarationShortLink();
//            dd('isnull');
            return view('ProfileMy/createlinks', ['originalHttp' => $link->short_link]);
        } else {
            $link = new Short_link();
            $link->id_user = $id_user = '1';
            $link->long_link = $request->post('originalHttp');
            $link->short_link = $this->genarationShortLink();
            dd($request);
            $link->save();
            return view('ProfileMy/createlinks', ['originalHttp' => $link->short_link]);
        }
    }

    public function listLinks()
    {
        return 'listlinks';
    }

}