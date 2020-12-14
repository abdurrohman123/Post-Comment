<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostHide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HideController extends Controller
{
    public function updateHide($post_id)
    {
        
        $input = [
            'user_id' => Auth()->id(),
            'post_id' => $post_id
        ];

        PostHide::create($input);
       
        return redirect()->back()->with('info', 'Post Berhasil Disembunyikan!');
    }

   
    public function storeUpdate(Request $request, $id)
    {
        if ( $request->tebak == 'hide'){
            $inputHide = [
                'user_id' => Auth::user()->id,
                'post_id' => $id,
                'hide' => null
            ];

            $check = PostHide::where('post_id', $id)->where('user', Auth::user()->id);
            if ($check->count() > 0){
                $check->delete();
                return redirect()->back()->with('info', 'U--hide');
            }
        } else {
            $inputHide = [
                'user_id' => Auth::user()->id,
                'post_id' => null,
                'hide' => $id,

            ];

            $check = PostHide::where('hide', $id)->where('user', Auth::user()->id);
            if ( $check->delete());
                return redirect()->back()->with('info', 'Unhide');
        
        PostHide::create($inputHide);
          
        return redirect()->back()->with('success', 'Like Success');
    }


    // public function storeUpdate(Request $request, $id)
    // {
    //     // return $request->jenis;

    //     if ($request->jenis == 'post'){
    //         $inputLike = [
    //             'user_id' => Auth::user()->id,
    //             'post_id' => $id,
    //             'comment_id'=> null,
    //         ];

    //         $check = Like::where('post_id', $id)->where('user_id', Auth::user()->id);
    //         if ($check->count() > 0){
    //             $check->delete();
    //             return redirect()->back()->with('info', 'Anda Telah Unlike');
    //         }
          

    //     } else {
    //         $inputLike = [
    //             'user_id' => Auth::user()->id,
    //             'post_id' => null,
    //             'comment_id'=> $id,
    //         ];   
            
    //         $check = Like::where('comment_id', $id)->where('user_id', Auth::user()->id);
    //         if ($check->count() > 0){
    //             $check->delete();
    //             return redirect()->back()->with('info', 'Anda Telah Unlike');
    //         }
        
    //     }
          
    //     Like::create($inputLike);
          
    //     return redirect()->back()->with('success', 'Like Success');

    // DIATAS ADALAH KODINGAN STATUS HIDE/UNHIDE TIDAK MENGGUNAKAN KOLOM STATUS



//     if ($request->q && !$request->e)
//     $select->where('name', 'like', "%$request->q%");
// else if (!$request->q && $request->e)
//     $select->where('experiences', $request->e);
// else if ( $request->q && $request->e)
//     $select->where('name', 'like', "%$request->q%")->where('experiences', $request->e);



    // public function updateHide(Request $request, $id)
    // {
    //     // return $request;
    //     $hide = Post::find($id);
    //     $hide->update([
    //         'status' => $request->status = 1
    //     ]);

    //     // // return $hide;
    //     return redirect()->route('post.index')->with('info', 'Berhasil Diubah');
    // //     $hide = Post::find($id);
    // //    if($hide->status == 1){
    // //        $hide->status = 0;
           
    // //    }
    // //    else{
    // //        $hide->status = 1;
    // //    }
       
    // //    if($hide->save());

    // //    return $hide;
    // //    return redirect()->route('post.index')->with('info', 'Berhasil Diubah');

    // }


    // DIATAS ADALAH KODINGAN STATUS HIDE/UNHIDE MENGGUNAKAN KOLOM STATUS

  
  
}
}