@extends('layouts.admin')
@section('content')
    <div id="wrapper" class="mx-3">
        <div id="title" class="ml-5 mt-3">
            <h3>投稿リスト</h3>
        </div>
        <div id="content">
            <table>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-3">タイトル</th>
                    <th class="col-4">内容</th>
                    <a href=""></a>
                    <th class="col-3">投稿者ID</th>
                </tr>
                @php
                    $t = 0;

                @endphp
                @foreach ($posts as $post)
                    @php
                        $t++;
                        $user_id = $post->user_id;
                    @endphp
                    <tr>
                        <td>{{ $t }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td><a href="{{url("admin/user/list")}}">{{ $user_id }}</a></td>
                        <td>{{ $post->created_at }}</td>

                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
