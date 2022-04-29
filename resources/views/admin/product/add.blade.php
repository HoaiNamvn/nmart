@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                商品登録
            </div>
            <div class="card-body">
                {!! Form::open(['url' => 'admin/product/store', 'method' => 'POST', 'files' => true]) !!}
                @csrf

                <div class="form-group">
                    <label for="name">商品名</label>
                    <input class="form-control" type="text" name="name" id="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="value">値段</label>
                    <input class="form-control" type="number" name="value" id="value">
                    @error('value')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="intro">説明</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                </div>


                <div class="form-group">
                    <label for="">カテゴリー</label>
                    <select class="form-control" id="">
                        <option>選択</option>
                        <option>カテゴリー１</option>
                        <option>カテゴリー２</option>
                        <option>カテゴリー３</option>
                        <option>カテゴリー４</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">状態</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            許可リクエスト
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            直ぐ公開
                        </label>
                    </div>
                </div>

                {!! Form::file('file', ['class' => 'form-control-file']) !!}
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
@endsection
