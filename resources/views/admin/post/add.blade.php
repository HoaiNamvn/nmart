@extends('layouts.admin')

@section('content')
    <div id="content" class="mx-3">
        <div id="title" class="ml-5 mt-3">
            <h3>投稿</h3>
        </div>
        {!! Form::open(['url' => 'admin/post/store', 'method' => 'POST', 'files' => true]) !!}
        @csrf
        {{-- title --}}
        <div class="form-group">
            <label for="tilte">タイトル</label>
            <input class="form-control  col-8" type="text" name="title" id="title">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        {{-- content --}}
        <div class="form-group">
            <label for="content">内容 </label> <br>
            <textarea name="content" id="content" cols="30" class="col-8"></textarea> <br>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        {{-- author --}}
        <div class="form-group">
            <label for="user_id">投稿者のID：＊ (変更不可) ＊</label><br>
            @php
                $tmp = Auth::user()->id;
                $user_id = (int) $tmp;
            @endphp
            <input type="text" name="user_id" id="" value=" {{ $user_id }}" >
        </div>
        <div class="form-group">
            <label for="user_name">投稿者：＊ (変更不可) ＊</label><br>
            <input type="text" name="user_name" id="" value=" {{ Auth::user()->name }}" disabled>
        </div>
        {{-- image --}}
        <div class="form-group">
            <label for="thumbnail">ファイル選択</label>
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        </div>

        <button type="submit" class="btn btn-primary">投稿</button>
        {!! Form::close() !!}


    </div>
@endsection
