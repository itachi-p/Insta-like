<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class HomeController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('index', ['images' => $images]);
    }


}