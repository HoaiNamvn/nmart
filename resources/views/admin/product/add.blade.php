@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold bg-success">
                商品登録
                <p> <small>(※)がついた項目は必須</small></p>
            </div>
            <div class="card-body">
                {!! Form::open(['url' => 'admin/product/store', 'method' => 'POST', 'files' => true]) !!}
                @csrf
                {{-- tên sản phẩm --}}
                <div class="form-group">
                    <label for="name">商品名 (※)</label>
                    <input class="form-control" type="text" name="name" id="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- giá --}}
                <div class="form-group">
                    <label for="value">値段 (※) </label>
                    <input class="form-control" type="number" name="value" id="value">
                    @error('value')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>
                {{-- thuyết minh --}}
                <div class="form-group">
                    <label for="intro">説明 (※)</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- danh mục --}}
                <div class="form-group">
                    <label for="">カテゴリー</label>
                    <select class="form-control" id="" name="category">
                        <option value="">選択</option>
                        <option value="smart_phone">スマートフォン</option>
                        <option value="laptop">ノートパソコン</option>
                        <option value="smart_watch">時計</option>
                        <option value="tv">TV</option>
                        <option value="fridge">冷蔵庫</option>
                        <option value="camera">カメラ</option>
                        <option value="washing_machine">洗濯機</option>
                    </select>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- chọn trạng thái --}}
                <div class="form-group">
                    <label for="">状態 (※)</label>
                    <select class="form-control" id="" name="check_status">
                        <option value="">選択</option>
                        <option value="wait">公開申請</option>
                        <option value="public">即公開</option>

                    </select>
                    @error('check_status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- 在庫の有無 --}}
                <div class="form-group">
                    <div class="form-group">
                        <label for="">在庫状態 (※)</label>
                        <select class="form-control" id="" name="status">
                            <option value="">選択</option>
                            <option value="out_of_stock">売り切れ</option>
                            <option value="stocking">在庫あり</option>

                        </select>
                    </div>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>
                {{-- ảnh bắt buộc --}}
                <div class="form-group">
                    写真 (※) {!! Form::file('file', ['class' => 'form-control-file']) !!}
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
@endsection
