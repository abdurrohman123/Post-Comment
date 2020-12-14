<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function storeUpdate(Request $request, $id)
    {
        if ($request->pilih == 'post'){
            $inputReport = [
                'user_id' => Auth::user()->id,
                'post_id' => $id,
                'comment_id' => null,
            ];

            $cek = Report::where('post_id', $id)->where('user_id', Auth::user()->id);
            if ($cek->count() > 0){
                $cek->delete();
                return redirect()->back()->with('info', 'Batal Mereport');
            } 

        } else {
                $inputReport = [
                    'user_id' => Auth::user()->id,
                    'post_id' => null,
                    'comment_id' => $id,
                ];
            $cek = Report::where('comment_id', $id)->where('user_id', Auth::user()->id);
            if ($cek->count() > 0){
                $cek->delete();
                return redirect()->back()->with('info', 'Batal Mereport');
            }
        }

            Report::create($inputReport);
        return redirect()->back()->with('success', 'Berhasil Direport');

    }

}
