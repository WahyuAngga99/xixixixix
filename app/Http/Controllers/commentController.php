<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\comment;
use App\Models\upload;
use App\Models\User;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function index()
    {
        $upload = upload::all();
        $album = album::all();
        $user = User::all();
        return view('upload.index', compact('upload','album','user'));
    }
    public function create()
    {
        return view('comments.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'album_id' => 'required|exists:albums,id',
            'upload_id' => 'required|exists:upload,id',
            'content' => 'required|string',
        ]);
        $comment = comment::create([
            'user_id' => $request->user_id,
            'album_id' => $request->album_id,
            'upload_id' => $request->upload_id,
            'content' => $request->content,
        ]);
        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }

    public function destroy($id)
    {
        $comment = comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Data pengeluaran berhasil disimpan');
    }

}


