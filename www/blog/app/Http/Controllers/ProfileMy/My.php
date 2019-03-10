<?php

namespace App\Http\Controllers\ProfileMy;

use App\Http\Controllers\Controller;
use App\Short_link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $originalHttp = $request->post('originalHttp');
        $link = new Short_link();
        $link->id_user = $id_user = Auth::user()->getAuthIdentifier();
        $link->long_link = $request->post('originalHttp');
        $link->short_link = $this->genarationShortLink();
        $link->count = 0;

        if (is_null($originalHttp)) {
            return view('ProfileMy/createlinks');
        } else {
            $link->save();
            return view('ProfileMy/createlinks', ['originalHttp' => $link->short_link]);
        }
    }

    public
    function listLinks()
    {
        $allLinks = Short_link::query()->select('long_link', 'short_link', 'count')
            ->where('id_user','=', Auth::user()->getAuthIdentifier())
            ->get();
        return view('ProfileMy/listlinks', ['allLinks' => $allLinks]);
    }

}