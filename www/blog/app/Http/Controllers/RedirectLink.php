<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Short_link;
use Illuminate\Http\Request;

class RedirectLink extends Controller
{
    public function redirectToLongLink($slug) {
        $shortLinkSlug = Short_link::where([
            'short_link' => $slug,
        ])->firstOrFail();
        $longLink = $shortLinkSlug['long_link'];
        $shortCount = $shortLinkSlug['count']+1;
        Short_link::query()
            ->where([
                'short_link' => $slug,
            ])
            ->update(['count' => $shortCount]);
        return redirect("$longLink");
    }
}