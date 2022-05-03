<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('home/font/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/global.css') }}">
    <title>栄昇ラーメン屋さん </title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="container justify-content">
                <a id="logo" href="{{ url('esyo/home') }}"><img src="{{ asset('home/images/lo-go.png') }}"
                        alt="写真がない" width="50" height="60"></a>
                <!-- end-logo  -->
                <form action="" id="search">
                    <input type="text" name="q" placeholder=" 何をお探しですか ">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="container">
                <nav>
                    <ul id="main-menu" class="d-flex">
                        <li><a href="{{ url('esyo/home') }}">ホームページ</a></li>
                        <li><a href="{{ url('esyo/news') }}">ニュース</a></li>
                        <li><a href="{{ url('esyo/access') }}"> アクセス</a></li>
                        <li><a href="{{ url('esyo/campaign') }}">キャンペーン情報</a></li>
                        <li><a href="{{ url('esyo/corona') }}">コロナ対策</a></li>
                        <li><a href="{{ url('esyo/job') }}">求人情報</a></li>
                        <li><a href="{{ url('esyo/contact') }}">お問い合わせ</a></li>
                        <li><a href="{{ url('dashboard') }}">管理者向けのサイトへ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- end-header  -->
        @yield('content')
        <!-- end-wp-content  -->
        <div id="footer">
            <div class="container">
                <div class="box logo-footer">
                    <div class="box-body">
                        <a href=""> <img src="{{ asset('home/images/lo-go.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="box about-us">
                    <div class="box-head">
                        <h3>店舗について </h3>
                    </div>
                    <div class="box-body">
                        <p>津田沼駅の前にあるラーメン屋さん。 </p>
                        <p>2018年に一号を並び、開店しました。 </p>
                        <a href="#">home page</a>
                    </div>
                </div>
                <div class="box follow-us">
                    <div class="box-head">
                        <h3> FOLLOW </h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-social d-flex">
                            <ul class="list-social-media">
                                <li><a href="" class="facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </a></li>
                                <li><a href="" class="google">
                                        <i class="fab fa-google"></i>
                                        <i class="fab fa-google"></i>
                                    </a></li>
                                <li><a href="" class="youtube">
                                        <i class="fab fa-youtube"></i>
                                        <i class="fab fa-youtube"></i>
                                    </a></li>
                                <li><a href="" class="twitter">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-twitter"></i>
                                    </a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- end-footer  -->
        <div id="wp-coppyright">
            <div class="container justify-content">
                <p class="coppyright"> © coppyright by ナム（当店のスタッフ） </p>
                <ul id="footer-id" class="d-flex">
                    <li><a href="">情報セキュリテイ</a></li>
                    <li class="active"><a href=""> 広告</a></li>
                    <li><a href="">contact</a></li>
                </ul>
            </div>
        </div>
        <!-- end-coppy-right  -->
    </div>
</body>

</html>
