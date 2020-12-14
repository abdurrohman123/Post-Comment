<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'massage' => $request->massage,
        ]);
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        // return Comment::find($comment_id);
        $comment->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus');

    }

    public function update(Request $request, $id)
    {


        $comment = Comment::with('post','user')
                    ->find($id);
        // return $comment->user->email;
        // $user = User::where('email', $comment->user->email)->first();
        // // email dan alamat itu adalah nama kolom di tabel database
        // $users = User::where('name',$comment->user->name)->get();
        // return $users;
        // // $email = $comment->user;
        // return $user;
        $slug = $comment->post->slug;
        $comment->update([
            'massage' => $request->massage,
        ]);
        // return $comment;
        return redirect(url("/post/{$slug}"))->with('success', 'Komentar Ditambahkan');
        // return redirect()->back();

    }


}
