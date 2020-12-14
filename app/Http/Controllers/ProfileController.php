<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('postUser')->find(Auth::user()->id);

        return view('profile.index', compact('user'));
    }

    public function update( Request $request, $id)
    {
        $profile = User::find($id);
        // return $profile;
        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $extfile = $file->getClientOriginalExtension();
            $namaFile = '/avatar/' . $profile->email . date('YmdHis') . ".$extfile";
            Storage::disk('public')->put($namaFile, File::get($file));
        }

        $profile->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nohp' => $request->nohp,
            'avatar' => $namaFile ?? $profile->avatar,
            'alamat' => $request->alamat,
            'user_id' => auth()->id(),
            
        ]);
        // return $profile;
        return redirect()->route('profile.index')->with('info', 'Berhasil Diubah');
    }

    public function show($email)
    {
        $show = User::with('profileShow')->where('email', $email)->first();

       $pos = Post::with('postHides')->whereHas('postHides', function($query){
            $query->where('user_id', auth()->id());
            })->get();
    //    return $pos;
        return view('profile.show', compact('show', 'pos'));
    }
}
