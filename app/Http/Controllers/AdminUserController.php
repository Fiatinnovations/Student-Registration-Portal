<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prospect;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::all();
        $userStudent = $user->prospects()->where('student', '=', '2');
        $userProspect = $user->prospects()->where('student', '=', '1');
        $students = Prospect::all();
        return view('admin.index', compact('users', 'userStudents', 'userProspects', 'students'));
    }
}
