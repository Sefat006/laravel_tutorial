<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() {
        $allUser = User::orderBy('id', 'DESC')->get();
        return view('admin.user.all', compact('allUser'));
    }

    public function view() {
        return view('admin.user.view');
    }

    public function edit() {
        return view('admin.user.edit');
    }

    public function add() {
        return view('admin.user.add');
    }
}
