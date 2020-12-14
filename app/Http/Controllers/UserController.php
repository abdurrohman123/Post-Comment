<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $dataUser = User::filterTableModel()->paginate(4);

        return view('user.index', compact('dataUser'));
    }
}
