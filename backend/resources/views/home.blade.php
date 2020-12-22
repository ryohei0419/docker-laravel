<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPage</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            color: #6c757d;
            background: #f7f7f7;
        }

        /* チェックボックス非表示 */
        /* .col-8 input[type="checkbox"] {
            display: none;
        } */
        
        img.checked {
        /* チェックが入った状態だと、枠が表示されるようにします。
        border: 6px solid blue;
        /* 線をwidthとheightに含めるようにします。 */
        box-sizing: border-box;
        }

        */
    </style>
</head>

<body>
    <div class="container">

        <!-- top -->
        <div class="">
            <nav class="navbar navbar-light bg-light">
                <h1 class="navbar-brand">TITLE</h1>

                <a class="text-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf

            </nav>

        </div>

        <div class="row">
            <!-- left -->
            <div class="col-xl-3 col-sm-4 sidebar bg-warning ">

                <!--ユーザーアイコンとユーザーネーム-->
                <div class="user-icon-name d-flex justify-content-center ">
                    <div class="profile-usertitle-name">
                        <img src="https://placehold.jp/100x100.png" alt="" class="m-3">
                        <h3 class="font-weight-bold">{{Auth::user()->name}}</h3>
                    </div>
                </div>

                <!--戦績-->
                <div class="profile-user-point-record font-weight-bold">
                    <div class="profile-user-point-title ">POINTS</div>
                    <div class="profile-user-point col-8 border border-dark bg-white mx-auto m-2">
                        <div>
                            <tr>
                                <td>
                                    <font size="+2">{{Auth::user()->point}}</font>
                                </td>
                                <td>pt</td>
                            </tr>
                        </div>

                    </div>
                    <div class="profile-user-recordtitle">Battle Record</div>
                    <div class="profile-user-record col-8 border border-dark bg-white mx-auto m-2">
                        <div>
                            <tr>
                                <td>
                                    <font size="+2">{{Auth::user()->wincount}}</font>
                                </td>
                                <td>win</td>
                                <td>
                                    <font size="+2">{{Auth::user()->losecount}}</font>
                                </td>
                                <td>lose</td>
                            </tr>
                        </div>

                    </div>
                </div>
            </div>

            <!-- right -->
            <div class="col-xl-9 col-sm-8 main">
                <!--ゲームのメニュー-->
                <div class="main-operation">
                    <!--準備-->
                    <div class="row my-4">

                        <div class="room-set mx-auto">
                            <button type="button" class="btn btn-primary btn-md ">CharacterSet</button>
                        </div>

                        <div class="room-set mx-auto">
                            <a href="/room"><button type="button" class="btn btn-primary btn-md">BattleRoom</button></a>
                        </div>

                        <div class="room-set mx-auto">
                            <button type="button" class="btn btn-primary btn-md">BetRoom</button>
                        </div>

                    </div>

                    <div class="main-today-news bg-white text-dark">
                        <!--ニュース-->
                        <div class="m-4">
                            <ul>
                                <p>Today's News</p>
                                <li>テストテストテスト</li>
                                <li>テストテストテスト</li>
                                <li>テストテストテスト</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="main-team bg-info">
                    <!--スターティングメンバ―-->
                    <div class="main-team-starting my-2">
                        <div class="main-team-best">
                            <h3 class="p-4 font-weight-bold">YOUR TEAM</h3>
                            <div class="row col-8 mx-auto">
                                <div class="m-3">
                                    <img src="https://placehold.jp/140x200.png" alt="">
                                </div>
                                <div class="m-3">
                                    <img src="https://placehold.jp/140x200.png" alt="">
                                </div>
                                <div class="m-3">
                                    <img src="https://placehold.jp/140x200.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--ストック-->
                    <div class="main-team-stock">
                        <div class="main-team-stock-name sm-5">
                            <h3 class="p-4 font-weight-bold">Stock CharactorsStock</h3>
                            <form action="{{ url('teams') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                <div>
                                    <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    </div>
                                </div>
                                <div class="row col-8 mx-auto">
                                        @foreach ($characters as $character)
                                        <div class="m-3">
                                            <label for="{{$character->id}}"><img src={{$character->pictoURL}} alt="" width="120" height="120"></label>
                                            <input type="checkbox" id="{{$character->id}}" value="{{$character->id}">
                                        </div>
                                        @endforeach
                                </div> 
                            </form>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script>
        $("input[type=checkbox]").click(function(){
            var $count = $("input[type=checkbox]:checked").length;
            var $not = $('input[type=checkbox]').not(':checked')
        
            //チェックが3つ付いたら、チェックされてないチェックボックスにdisabledを加える
            if($count >= 3) {
                $not.attr("disabled",true);
            }else{
                //3つ以下ならisabledを外す
                $not.attr("disabled",false);
            }
        });
    </script>
</body>
</html>
