<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Else_;
use Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        $postUpdate = Post::find($request->id);
        // return $postUpdate;
        if($postUpdate == null){
            $variabelUpdate = (object) [
                'action' => route('post.store'),
                'method' => 'POST'
            ];
        }
        else
        {
            $variabelUpdate = (object) [
                'action' => route('post.update', $request->id),
                'method' => 'PATCH'
            ];
            
        }
        // return $postUpdate;
        // $postz = Post::pencarian()
        // ->with('category', 'user', 'likes', 'comments')->where('status', '!=', 1)
        // ->get();
        $postz = Post::pencarian()
                    ->with('category', 'user', 'likes', 'comments', 'postHides')
                    ->where(function($q){
                        $q->whereHas('postHides', function($q){
                            $q->where('user_id', '!=', auth()->id());
                            })
                            ->orWhereDoesntHave('postHides');
                    })
                    ->get();
        // return $postz;
        
        // whereHas('participants', function ($query) {
        //     return $query->where('IDUser', '=', 1);
        // })->get();
        


        $categories = Category::all();
        
        // return $categories;
        return view('post.index', compact('categories', 'postz', 'postUpdate', 'variabelUpdate')); 
        // compact adalah suatu data yang di lempar pada view
    }


    public function store(Request $request)
    {
        // return $request;
        $this->validate(request(),[
            'title'=>'required',
            'content'=>'required',
        ]);

        // $postUpload = Post::find($id);
        // // return $postUpload;
        // if($request->hasFile('upload')){
        //     $file = $request->upload;
        //     $extfile = $file->getClientOriginalExtension();
        //     $namaFile = '/upload/' . date('YmdHis') . ".$extfile";
        //     Storage::disk('public')->put($namaFile, File::get($file));
        // }
       $input = [
           'title' => $request->title,
           'slug' => Str::slug($request->title),
           'content' => $request->content,
           'user_id' => auth()->id(),
           'upload' => $request->upload,
           'category_id' => $request->category_id,
       ];
    //    return $input;

       Post::create($input);
       return redirect()->route('post.index')->with('success', 'Post Anda Terkirim');
    
    }

    public function destroy(Post $post)
    {
        $post->delete();
        // return$post;

        return redirect()->route('post.index')->with('danger', 'Post Berhasil Dihapus');
    }

    public function show(Request $request, $slug)
    {
        // return $request;
        $posts = Post::with('reports', 'comments')->get();
        // relasinya
        $commentEdit = Comment::find($request->id);
        $post = Post::with('comments', 'user')->where('slug', $slug)->first();
        
        
        // return $post->user->id;
        if($commentEdit == null){
            $update = (object) [
                'action' => route('comment.store', $post->id),
                'method' => 'POST'
            ];
        }
        else
        {
            $update = (object) [
                'action' => route('comment.update', $request->id),
                'method' => 'PATCH'
            ];
        }


        return view('post.comment', compact('post', 'commentEdit', 'update'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
        ]);
        // return $post;
        return redirect()->route('post.index')->with('info', 'Berhasil Diubah');
    }

}