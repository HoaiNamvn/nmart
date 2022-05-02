@extends('layouts.home')

@section('content')
<div class="container justify-content">
    <div class="box new-post">
        <div class="box-head">
            <h1>来店案内 </h1>
            <div> <img src="{{ asset('home/images/home.png') }}" alt="">
                <p> <a href="https://maps.app.goo.gl/mk3nWEqDRe89P2Xp9" target="_blank"> グーグルマップはこちら</a></p>
                <p>津田沼駅から、2分</p>
                <p>津田沼新京成駅から、直前</p>
                <p>注意：車で来店の場合駐車場がございませんので、周りの駐車場を借りるよう、お願い申し上げます。その際、味付け玉子を無料で提供いたしますので、スタッフまでお伝えください。</p>
            </div>
        </div>
    </div>
</div>
@endsection
