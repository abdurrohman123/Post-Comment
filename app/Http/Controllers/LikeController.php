<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{   
    public function storeUpdate(Request $request, $id)
    {
        // return $request->jenis;

        if ($request->jenis == 'post'){
            $inputLike = [
                'user_id' => Auth::user()->id,
                'post_id' => $id,
                'comment_id'=> null,
            ];

            $check = Like::where('post_id', $id)->where('user_id', Auth::user()->id);
            if ($check->count() > 0){
                $check->delete();
                return redirect()->back()->with('info', 'Anda Telah Unlike');
            }
          

        } else {
            $inputLike = [
                'user_id' => Auth::user()->id,
                'post_id' => null,
                'comment_id'=> $id,
            ];   
            
            $check = Like::where('comment_id', $id)->where('user_id', Auth::user()->id);
            if ($check->count() > 0){
                $check->delete();
                return redirect()->back()->with('info', 'Anda Telah Unlike');
            }
        
        }
          
        Like::create($inputLike);
          
        return redirect()->back()->with('success', 'Like Success');

        // $diCheck = Like::where('post_id', $post->id)->where('user_id', Auth::user()->id);

        // if ($diCheck->count() > 0 ){
        //     $diCheck->delete();
        //     return redirect()->back()->with('info', 'Anda Telah Unlike');
        // }
        // $like = [
        //     'user_id' => Auth::user()->id,
        //     'post_id' => $post->id,
        // ];
        // // return $like;
        // Like::create($like);

        // return redirect()->back()->with('success', 'Like Success');
    }
}
