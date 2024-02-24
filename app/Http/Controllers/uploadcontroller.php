<?php

namespace App\Http\Controllers;


use App\Models\album;
use App\Models\comment;
use App\Models\upload;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class uploadcontroller extends Controller
{
    //

    public function index()
    {
        $uploads = Upload::with('user')->get();
        $albums = album::all();
        $users = User::all();
        return view('upload.index', compact('uploads', 'albums', 'users'));
    }

    public function create()
    {
        return view('upload.index');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi'   => 'required|min:8',
            'name'   => 'required|max:225',
            'album_id' => 'required|exists:albums,id',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/article', $image->hashName());
        upload::create([
            'image'     => $image->hashName(),
           'deskripsi'     =>$request->deskripsi,
           'name'     =>$request->name,
           'user_id' => Auth::id(),
           'album_id' => $request->album_id,
        ]);
        return redirect()->back()->with('success', 'Data pengeluaran berhasil disimpan');
    }

    public function show(upload $upload)
    {
        return view('upload.show', compact('upload'));
    }

    public function edit(string $id): View
    {
        $upload = upload::findOrFail($id);
        return view('upload.edit', compact('upload'));
    }
    public function update(Request $request, $id)
    {
     $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'deskripsi'   => 'required|min:8',
        'name'   => 'required|min:8',
    ]);
    $upload = upload::findOrFail($id);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image->storeAs('public/article', $image->hashName());
        Storage::delete('public/article/'.$upload->image);
        $upload->update([
            'image'     => $image->hashName(),
            'deskripsi'     =>$request->deskripsi,
            'name'     =>$request->name,
        ]);
    } else {
        $upload->update([
            'name'    =>$request->name                                                                                                                  ,
            'deskripsi'     =>$request->deskripsi,
        ]);
    }
    return redirect()->back()->with('success', 'Data pengeluaran berhasil disimpan');
}


    public function destroy($id): RedirectResponse
    {
        $upload = upload::findOrFail($id);
        Storage::delete('public/article/'. $upload->image);
        $upload->delete();
        return redirect()->back()->with('success', 'Data pengeluaran berhasil disimpan');
    }

    

}
