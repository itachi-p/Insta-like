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
        $user_id = $users[0]['id'];
        $user_name = $users[0]['name'];

        $request = new Request;
        $request->merge([
            'user_id' => $user_id,
            'user_name' => $user_name,
        ]);
        return view('user', $request);
    }
}