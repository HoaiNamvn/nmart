@extends('layouts.admin')

@section('content')
    <div id="content" class="mx-3">
        <div id="title" class="ml-5 mt-3">
            <h3>投稿リスト</h3>
        </div>
        {!! Form::open(['url' => 'admin/product/store', 'method' => 'POST', 'files' => true]) !!}
        @csrf
        {{-- title --}}
        <div class="form-group">
            <label for="tilte">タイトル</label>
            <input class="form-control  col-8" type="text" name="title" id="title">
        </div>
        {{-- content --}}
        <div class="form-group">
            <label for="content">内容 </label> <br>
            <textarea name="content" id="content" cols="30" class="col-8"></textarea>
        </div>
        {{-- author --}}
        <div class="form-group">
            <label for="user_id">投稿者のID：＊ (変更不可) ＊</label><br>
            <input type="text" name="user_id" id="" value=" {{ Auth::user()->id }}" disabled>

            </select>
        </div>
        <div class="form-group">
            <label for="user_name">投稿者：＊ (変更不可) ＊</label><br>
            <input type="text" name="user_name" id="" value=" {{ Auth::user()->name }}" disabled>

            </select>
        </div>
        {{-- image --}}
        <div class="form-group">
            <label for="thumbnail">ファイル選択</label>
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        </div>
        {!! Form::close() !!}


    </div>
@endsection
