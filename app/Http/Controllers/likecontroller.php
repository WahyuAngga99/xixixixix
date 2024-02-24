<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;

class likecontroller extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'album_id' => 'required|exists:albums,id',
            'upload_id' => 'required|exists:upload,id',
        ]);

        
        $existingLike = Like::where([
            'user_id' => $request->user_id,
            'album_id' => $request->album_id,
            'upload_id' => $request->upload_id,
        ])->first();

        if ($existingLike) {
             
            $existingLike->delete();
        } else {
             
            Like::create([
                'user_id' => $request->user_id,
                'album_id' => $request->album_id,
                'upload_id' => $request->upload_id,
            ]);
        }

        return redirect()->back();
    }
    public function index()
    {
        $like = like::all();
        return view('upload.index', compact('like'));
    }
}
