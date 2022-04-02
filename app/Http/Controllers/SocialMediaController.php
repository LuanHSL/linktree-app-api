<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::get();
        return response()->json($socialMedia, 200);
    }
    
    public function save(Request $request)
    {
        $socialMedia = new SocialMedia;

        $socialMedia->name = $request->name;
        $socialMedia->url = $request->url;
        $socialMedia->slug = $request->slug;
        
        $socialMedia->save();

        return response()->json($socialMedia, 201);
    }

    public function delete(int $id)
    {
        $socialMedia = SocialMedia::find($id);
        $socialMedia->delete();

        return response()->json(["message" => "Rede Social deletada"], 200);
    }

    public function edit(Request $request, int $id)
    {
        SocialMedia::where('id', $id)
            ->update([
                'name' => $request->name,
                'url' => $request->url,
                'slug' => $request->slug,
            ]);
        $socialMedia = SocialMedia::find($id);
        
        return response()->json($socialMedia, 200);
    }
}
