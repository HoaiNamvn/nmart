@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách thành viên</h5>
                <div class="form-search form-inline ">
                    <form action="#" class="d-flex">
                        {{-- cho  value = {{request()->input('keywork')} để ô tìm kiếm phần placeholder được hiện ra keyword đã tìm kiếm --}}
                        <input type="text" class="form-control form-search" name="keyword"
                            value="{{ request()->input('keyword') }}" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    {{-- tạo url hiện tại kèm tham số --}}
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Đã kích
                        hoạt
                        <span class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary"> Đang vô
                        hiệu
                        hóa<span class="text-muted">({{ $count[1] }})</span></a>
                </div>

                {{-- FORM --}}
                <form action="{{ url('admin/user/action') }}" method="">
                    <div class="form-action form-inline py-3">
                        {{-- name="act" để lấy những gì nhận được trong $list_act bên dưới sau khi giải nén thành $k => $act và gửi qua @action --}}
                        <select class="form-control mr-1" name="act" id="">
                            <option>Chọn</option>
                            {{-- duyệt theo value của $list_act được chia trong AdminUserCOntroller@list --}}
                            @foreach ($list_act as $k => $act)
                                <option value="{{ $k }}">{{ $act }}</option>
                            @endforeach
                        </select>
                        {{-- thực hiện hành vi đẩy form  action --}}
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($users->total() > 0)
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($users as $user)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{-- name="list_check[]  để lưu nhưng gì đã check gửi qua @action --}}
                                            <input type="checkbox" name="list_check[]" value="{{ $user->id }}">
                                        </td>
                                        <th scope="row">{{ $t }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>Admintrator</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i></a>
                                            {{-- nếu là người đăng nhập thì không được xóa --}}
                                            @if (Auth::id() != $user->id)
                                                <a href="{{ route('delete_user', $user->id) }}"

                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="bg-white"> không tồn tại người dùng đã tìm kiếm, vui lòng
                                        thay thế tìm kiếm khác </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </form>
                {{-- END-FORM --}}

                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
