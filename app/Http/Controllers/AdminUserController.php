<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    function __construct()
    {    // tạo sesion cho active menu
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'user']);
            return $next($request);
        });
    }
    function list(Request $request)
    {
        // tạo biến gán bằng giá trị của status trên url
        $status = $request->input('status');
        // gán trước cho $count 2 trường hợp để chạy trươc khi bị  return
        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];
        //chia 2 truong hợp khi ấn vào danh mục
        #1. chung hoặc đã kích hoạt
        $list_act = [
            'delete' => '臨時削除'
        ];
        #2. đang vô hiệu hóa
        // or nếu đã xóa tạm thời
        if ($status == "trash") {
            $list_act = [
                'restore' => '復元c',
                'forceDelete' => '完全削除'
            ];
            $users = User::onlyTrashed()->paginate(10);
            return view('admin.user.list', compact('users', 'count', 'list_act'));    // compact data to view

        } else {

            $key = ""; // set null search key
            if ($request->input('keyword')) {   // if true
                $key = $request->input('keyword');
            }  // get input form by name keyword
            $users = User::where('name', 'Like', "%{$key}%")->paginate(10);   // ORM
            // $users = User::withTrashed()->where('name', 'Like', "%{$key}%")->paginate(10);   // ORM hiện cả những thành viên đã xóa tạm thời

        }
        // điều hướng và truyền dữ diệu qua view
        return view('admin.user.list', compact('users', 'key', 'count', 'list_act'));    // compact data to view

    }
    function add()
    {
        return view('admin.user.add');
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ':attribute が必要 ',
                'min' => ':attribute は最低 :min 文字',
                'max' => ':attribute は最低 :max 文字 ',
                'confirmed' => 'パスワードの確認用が合わなかった  '
            ],
            [
                'name' => '名前',
                'email' => 'メール',
                'password' => 'パスワード'
            ]
        );

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('admin/user/list')->with('status', 'ユーザー追加が完了しました ');
    }

    function delete($id)
    {
        // ngoài việc không hiện nút xóa trên người dùng htai thì ta cũng nên tránh tình trạng tự xóa trên đường dẫn,tự nhập id
        if (Auth::id() != $id) {
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('status', "ユーザー : {$user->name}が削除しました");
        } else {
            return redirect('admin/user/list')->with('status', 'あなた自身が自分の削除することはできません！');
        }
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            // duyệt từng id và lưu từng index tương ứng vào $k
            foreach ($list_check as $k => $id) {
                if (Auth::id() == $id) {
                    unset($list_check[$k]);  // loại bỏ biến thứ k vì trùng với id đang đăng nhập
                }
            }
            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == "delete") {
                    User::destroy($list_check);
                    return  redirect('admin/user/list')->with('status', '削除が完了しました');
                }
                if ($act == "restore") {
                    User::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return  redirect('admin/user/list')->with('status', 'ユーザーの復元が完了しました ');
                }
                if ($act == "forceDelete") {
                    User::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return  redirect('admin/user/list')->with('status', 'ユーザーを完全削除しました ');
                }
            }
            return  redirect('admin/user/list')->with('status', '自分自身に操作できません ');
        } else {
            return  redirect('admin/user/list')->with('status', '1つ以上のユーザを選択してください');
        }
    }
    function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    function update($id, Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ':attribute が必要 ',
                'min' => ':attribute は最低 :min 文字',
                'max' => ':attribute は最低 :max 文字 ',
                'confirmed' => 'パスワードの確認用が合わなかった  '
            ],
            [
                'name' => '名前',
                'password' => 'パスワード'
            ]
        );
        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('admin/user/list')->with('status', '最新情報の更新が完了しました');
    }
}
