@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">カテゴリー</h5>
                <div class="form-search form-inline">
                    <form action="#" class="d-flex">
                        <input type="text" class="form-control form-search" name="keyword"
                            value="{{ request()->input('keyword') }}" placeholder="商品名入力">
                        <input type="submit" name="btn-search" value="探索" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    {{-- tạo url hiện tại cộng thêm status=active --}}
                    {{-- đẩy dữ liệu qua url gốc hiện tại, qua function rồi đẩy $list_action to view --}}
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">販売中<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">削除済<span
                            class="text-muted">({{ $count[1] }})</span></a>
                </div>

                <form action="{{ url('admin/product/action') }}" method="">

                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" name="category" id="">
                            <option active>作業選択 </option>
                            {{-- duyệt theo value của $list_act được chia trong AdminProductCOntroller@list --}}
                            @foreach ($list_act as $k => $act)
                                <option value="{{ $k }}">{{ $act }}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="btn-search" value="適用" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">No</th>
                                <th scope="col">イメージ</th>
                                <th scope="col">商品名</th>
                                <th scope="col">値段</th>
                                <th scope="col">カテゴリ</th>
                                <th scope="col">投稿日</th>
                                <th scope="col">在庫</th>
                                <th scope="col">公開ステータス</th>
                                <th scope="col">作業</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- lặp sản phẩm --}}
                            @if ($products->total() > 0)
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr class="">
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $product->id }}">
                                        </td>
                                        <td>{{ $t }}</td>
                                        <td><a href="#"><img src="{{ asset($product->thumbnail) }}" alt="" width="80"
                                                    height="100"></a></td>
                                        <td><a href="#">{{ $product->name }}</a></td>
                                        <td>{{ $product->value }} 円</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        @if ($product->status == 'stocking')
                                            <td><span class="badge badge-success">{{ $product->status }}</span></td>
                                        @else
                                            <td><span class="badge badge-warning">{{ $product->status }}</span></td>
                                        @endif


                                        @if ($product->check_status == 'public')
                                            <td><span class="badge badge-success">{{ $product->check_status }}</span></td>
                                        @else
                                            <td><span class="badge badge-warning">{{ $product->check_status }}</span></td>
                                        @endif
                                        </td>

                                        @if ($edit_delete_btn)
                                            <td>
                                                <a href="{{ route('product_edit', $product->id) }}"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('product_delete', $product->id) }}"
                                                    onclick="return confirm('Bạn có muốn xóa không ')"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        @else
                                            <td>
                                                臨時に消された商品のため、作業ボタンがつきません。修正したい場合は復元してから、再度お試しください。
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="bg-white"> 入力された商品が見つかりませんでし、他のキーワードをお試してください 。</td>
                                </tr>
                            @endif

                            {{-- kết thúc lặp sản phẩm --}}
                        </tbody>
                    </table>

                </form>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
