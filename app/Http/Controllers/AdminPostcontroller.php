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
    function list()
    {
        $posts=post::all();
        return view('admin.post.list', compact('posts'));
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
        $file = $request->thumbnail;
        $file->move('public/images/', $file->getClientOriginalName());
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
            'thumbnail' => 'images/' . $file->getClientOriginalName()
        ]);



        return redirect('admin/post/list')->with('status', '投稿が完了しました。 ');
    }
}
