<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class HomeController extends Controller
{
    public function home()
    {
        $images = Image::all();
        return view('home', ['images' => $images]);
    }


}