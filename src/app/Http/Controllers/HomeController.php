<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $images = Image::all();
//dd($images[0]); //debug
        // (仮)
        $request->merge(['user_id' => $images[0]['user_id'],]);
//dd($request); //debug
        return view('home', ['images' => $images, 'request' => $request]);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                'required', // 入力必須であること    
                'file',     // アップロードされたファイルであること
                'image',    // 画像ファイルであること
                'mimes:jpeg,png',   // MIMEタイプを指定
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            //storeメソッドを使うとlocalhost:8000に固定されてしまうので他のやり方に回避(画像ファイル名加工なし)
            //$path = $request->file->store('public');
            $filename = $request->file->getClientOriginalName(); //一意なID発行の方が望ましい
            $move = $request->file->move('./images/', $filename);
            $message = $request->message;

            //仮実装
//dd($request); //debug
            $user_id = $request->user_id;
echo "user_id" . $user_id . "<br>";

            $images = new Image;
            $images->fill(['user_id' => $user_id, 'filename' => $filename])->save();
echo "images->fill->save() finished. <br>";
            $images = Image::all();
            $parameters = ['user_id' => $user_id, 'filename' => $filename, 'images' => $images];
echo "\$parameters setting finished.";
//dd($parameters); //debug
            return view('home', $parameters);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}
