<?php

namespace App\Http\Controllers;

use App\Actions\ShortUrl;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    public function show(Request $request, $code)
    {
        $url = DB::table('urls')->where('code', $code)->first();

        if ($url) {
            //
            return redirect()->away($url->original_url);
        } else {
            abort(404);
        }
    }

    public function generate(Request $request)
    {
        $url = Url::query()->create([
            'original_url' => $request->original_url,
            'user_id' => auth()->id(),
        ]);

        $shortUrl = new ShortUrl();

        return response()->json([
            'short_url' => url('/') . '/' . $shortUrl->short($url),
        ]);
    }
}
