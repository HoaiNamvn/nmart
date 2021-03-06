<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\product;

class AdminProductController extends Controller
{
    function __construct()
    {    // tạo sesion cho active menu
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }
    function list(Request $request)
    {

        $status = $request->input('status');
        // gán trước cho $count 2 trường hợp để chạy trươc khi bị  return
        $count_product_active = Product::count();
        $count_product_trash = Product::onlyTrashed()->count();
        $count = [$count_product_active, $count_product_trash];
        //chia 2 truong hợp khi ấn vào danh mục
        #1. chung hoặc đã kích hoạt

        $key = ""; // set null search key
        if ($request->input('keyword')) {   // if true
            $key = $request->input('keyword');
        }  // get input form by name keyword
        $products = Product::where('name', 'Like', "%{$key}%")->paginate(5);   // ORM
        // $users = User::withTrashed()->where('name', 'Like', "%{$key}%")->paginate(10);   // ORM hiện cả những thành viên đã xóa tạm thời

        #2. đang vô hiệu hóa
        // or nếu đã xóa tạm thời
        if ($status == "trash") {
            $list_act = [
                'restore' => '復元',
                'forceDelete' => '完全削除'
            ];
            $edit_delete_btn = false;
            $products = Product::onlyTrashed()->paginate(10);
            // return view('admin.product.list', compact('products', 'count', 'list_act'));    // compact data to view

        } else {
            $list_act = ['delete' => '臨時削除'];
            $edit_delete_btn = true;
        }
        // điều hướng và truyền dữ diệu qua view
        return view('admin.product.list', compact('products', 'key', 'count', 'list_act', 'edit_delete_btn'));    // compact data to view

    }
    function add()
    {
        return view('admin.product.add');
    }
    function store(Request $request)
    {

        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'value' => ['required', 'integer'],
                'check_status' => ['required'],
                'status' => ['required'],
                'category' => ['required'],

            ],
            [
                'required' => ':attribute が必要 ',
            ],
            [
                'name' => '商品名',
                'value' => '値段',
                'check_status' => '状態の選択',
                'status' => '在庫の選択',
                'category' => 'カテゴリーの選択',

            ]
        );
        $file = $request->file;
        $file->move('public/images/', $file->getClientOriginalName());
        product::create([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),

            'check_status' => $request->input('check_status'),
            'status' => $request->input('status'),
            'thumbnail' => 'images/' . $file->getClientOriginalName()
        ]);



        return redirect('admin/product/list')->with('status', '商品の登録が完了しました。 ');
    }

    function update(Request $request, $id)
    {
        $request->validate(
            [
                'value' => ['required', 'integer'],
                'description' => ['required', 'string', 'max:1000'],
                'check_status' => ['required'],
                'status' => ['required'],

            ],
            [
                'required' => ':attribute が必要 ',
            ],
            [
                'name' => '商品名',
                'value' => '値段',
                'description' => '説明文',
                'check_status' => '状態の選択',
                'status' => ['在庫の選択'],

            ]
        );
        $file = $request->file;
        $file->move('public/images/', $file->getClientOriginalName());
        product::where('id', $id)->update([
            'value' => $request->input('value'),
            'description' => $request->input('description'),
            'check_status' => $request->input('check_status'),
            'status' => $request->input('status'),
            'thumbnail' => 'images/' . $file->getClientOriginalName()
        ]);

        return redirect('admin/product/list')->with('status', "修正が完了しました");
    }
    function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product/list')->with('status', " {$product->name} が削除されました。");
    }

    function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    function action(Request $request)
    {
        // lấy listcheck từ http
        $list_check = $request->input('list_check');
        // ok da lay duoc list check


        $act = $request->input('act');
        if (!empty($list_check)) {
            $act = $request->input('act');
            if ($act == "delete") {
                Product::destroy($list_check);
                return  redirect('admin/product/list')->with('status', '削除が完了しました');
            }
            if ($act == "restore") {
                Product::withTrashed()
                    ->whereIn('id', $list_check)
                    ->restore();
                return  redirect('admin/product/list')->with('status', '復元が完了しました ');
            }
            if ($act == "forceDelete") {
                Product::withTrashed()
                    ->whereIn('id', $list_check)
                    ->forceDelete();
                return  redirect('admin/product/list')->with('status', '商品を完全削除しました ');
            }
        } else {
            return  redirect('admin/product/list')->with('status', '１つレコード以以上を選択してください');
        }
    }
}
