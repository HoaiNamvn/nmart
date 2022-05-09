@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                ユーザー登録
            </div>
            <div class="card-body">

                {{-- Form khai báo --}}
                <form action="{{ url('admin/user/store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input class="form-control" type="text" name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input class="form-control" type="password" name="password" id="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"> パスワード確認</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">権</label>
                        <select class="form-control" id="">
                            <option>権選択</option>
                            <option>権1</option>
                            <option>権2</option>
                            <option>権3</option>
                            <option>権4</option>
                        </select>
                    </div>
                    {{-- end form --}}

                    <button type="submit" class="btn btn-primary" name="btn-add" value="">送信</button>
                </form>
            </div>
        </div>
    </div>
@endsection
