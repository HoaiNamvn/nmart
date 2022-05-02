@extends('layouts.home')
@section('content')
    <div class="container justify-content">
        <div class="box new-post">
            <div class="box-head">
                <h1>休店情報のお知らせ </h1>
                <div> <img src="{{ asset('home/images/close.jpg') }}" alt="">
                    <p> 今日　2022/05/02 台風の影響で、開店することが難しいため、お休みにします。</p>
                    <p> 来店のお客様、大変お迷惑おかけしますが、ご了承ください。</p>
                    <p>また、よろしくお願いいたします。</p>
                    <p><small>店長</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
