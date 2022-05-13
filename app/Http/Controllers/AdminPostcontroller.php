<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;
use App\user;

class AdminPostcontroller extends Controller
{

    function __construct()
    {    // tạo sesion cho active menu
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'post']);
            return $next($request);
        });
    }
    function add()
    {
        return view('admin.post.add');
    }
    function store(Request $request)
    {

        $request->validate(
            [
                'title' => ['required', 'string', 'max:255'],
                'content' => ['required'],

            ],
            [
                'required' => ':attribute が必要 ',
            ],
            [
                'title' => 'タイトル',
                'content' => '内容'

            ]
        );
        $file = $request->file;
        $file->move('public/images/', $file->getClientOriginalName());
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),

            'check_status' => $request->input('check_status'),
            'status' => $request->input('status'),
            'thumbnail' => 'images/' . $file->getClientOriginalName()
        ]);



        return redirect('admin/product/list')->with('status', '商品の登録が完了しました。 ');
    }
}
