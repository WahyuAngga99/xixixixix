<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\comment;
use App\Models\upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class welcomeController extends Controller
{
    //
    public function index(){
        $upload = upload::all();
        $comment = comment::all();
        // $users = Upload::with('user')->get();
        $users = album::with('user')->get();

        return view('welcome', compact('upload','comment','users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'album_id' => 'exists:albums,id',
            'upload_id' => 'exists:upload,id',
            'content' => 'string',
        ]);
        $comment = comment::create([
            'user_id' => auth()->id(),
            'album_id' => $request->album_id,
            'upload_id' => $request->upload_id,
            'content' => $request->content,
        ]);
        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }

    public function edit($id){
        $user = User::find($id);
        return view('edit', compact('user'));
    }

    protected function update(array $data, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
             
            return null;
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],

            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);

        if (isset($data['image'])) {
            Storage::disk('public')->delete($user->image);
            $imagePath = $data['image']->store('profile', 'public');
            $user->update(['image' => $imagePath]);
        }
        return $user;
    }

}
