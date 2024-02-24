<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\like;
use App\Models\upload;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user = User::all();
        $album = album::all();
        return view('album.index', compact('album', 'user'));
    }
    public function create()
    {
        return view('album.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
        ]);
        $album = album::create([
            'name' => $request->input('name'),
            'user_id' => Auth::id(),
        ]);
        return redirect('home')->with('success', 'album created successfully.');
    }

    public function edit($id)
    {
        $album = album::find($id);
        return view('album.edit', compact('album'));
    }
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => ['required', 'min:3'],
        ]);
        $album = album::find($id);
        $album->update($data);
        return redirect('home')->with('success', 'Album updated successfully.');
    }
    public function show(upload $upload, $album_id)
    {
        session(['album_id' => $album_id]);
        $upload = upload::where('album_id', $album_id)->get();
        $loginId = Auth::id();
        $users = Upload::with('user')->get();
        $like = like::all();
        return view('upload.index', compact('upload', 'album_id', 'users', 'like'));
    }
    public function destroy($id)
    {
        $album = album::findOrFail($id);
        $album->delete();
        return redirect('home')->with('success', 'album berhasil dihapus.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
