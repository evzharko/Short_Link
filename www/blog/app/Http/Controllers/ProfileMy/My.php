<?php

namespace App\Http\Controllers\ProfileMy;

use App\Http\Controllers\Controller;
use App\Short_link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class My extends Controller
{
    /**
     * @return string
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function formLinks()
    {
        return view('ProfileMy/createlinks');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function linksPost(Request $request)
    {
        $originalHttp = $request->post('originalHttp');
        $link = new Short_link();
        $link->id_user = $id_user = Auth::user()->getAuthIdentifier();
        $link->long_link = $request->post('originalHttp');
        $link->short_link = $this->genarationShortLink();
        $link->count = 0;
        $link->save();

        return Redirect::back()->with('short_msg',$link->short_link);
    }

        public
        function listLinks()
        {
            $allLinks = Short_link::query()->select('long_link', 'short_link', 'count')
                ->where('id_user', '=', Auth::user()->getAuthIdentifier())
                ->paginate('5');
            return view('ProfileMy/listlinks', ['allLinks' => $allLinks]);
        }

    }