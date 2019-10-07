<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->toArray();
//var_dump($users); //debug
//dd($users); //debug
        $username = $users[0]['name'];

        $request = new Request;
        $request->merge([
            'username' => $username,
        ]);
        return view('user', $request);
    }
}