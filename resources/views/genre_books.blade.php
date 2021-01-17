
@extends('layouts.master')

@section('content')

    <div class="container" dir="rtl">
        <div class="row justify-content-center">


            @include('notifications')

            @foreach ($books as $book)
                <div class="card">
                    <div class="card-header">{{ $book->book_name }}</div>
                    <div class="card-header"><span style="font-size: small; color: #95999c">نویسنده:</span>&nbsp;{{ $book->author }}</div>
                    <div class="card-header"><span style="font-size: small; color: #95999c">قیمت:</span>&nbsp;{{ $book->cost }}</div>
                    @if ( Auth::check() == true )
                        <div class="card-body">
                            <a class="cardBtn" href="{{ route('buy_book',$book->id) }}">خرید</a>
                        </div>
                    @endif
                </div>
            @endforeach

        </div>
    </div>

@endsection







<style>
    * {
        box-sizing: border-box;
        outline: none;
    }
    body {
        margin: 0;
        font-family: Sans-serif;
        overflow: hidden;
    }

    .cardBtn{
        background-color: #34495e;
        color: white;
        border: 0px;
        border-radius: 5px;
        padding: 5px;
        margin: 5px;
        margin-top: 15px;
        text-decoration: none;
    }
    .cardBtn:hover{
        background-color: whitesmoke;
        color: black;
        padding: 5px;
        margin: 5px;
        margin-top: 10px;
        cursor: pointer;
        box-shadow: darkgray 0px 0px 5px;
        text-decoration: none;
        transition: 100ms;
    }

    .dashboard {
        height: 100vh;
        display: flex;
    }
    .left {
        height: 100%;
        display: flex;
    }

    .items > img {
        margin-bottom: 25px;
    }

    .profile > img {
        border-radius: 50%;
        width: 305px;
        height: 35px;
        border: 1px solid white;
    }

    .navigation {
        width: 270px;
        border-right: 1px solid #ddd;
    }
    .abilan > img {
        width: 120px;
        margin-bottom: 30px;
        margin-left: -8px;
    }

    .wrapper2 {
        padding: 0 25px;
        height: 100%;
        overflow: auto;
    }

    .folders {
        margin-top: 30px;
        color: #b8b8b8;
        font-size: 14px;
    }
    .folder-icons {
        margin-top: 20px;
        display: flex;
        align-items: center;
    }

    .icon-name {
        margin-left: 10px;
        color: grey;
        text-decoration: none;
    }
    .icon-name:hover{
        cursor: pointer;
        font-size: 15px;
        text-shadow: darkgray 1px 1px 5px;
        transition: 250ms;
    }


    .avatar > img {
        width: 35px;
        border-radius: 10px;
    }
    .right-side {
        background-color: #f2f3f7;
        width: 100%;
        padding: 8px 30px;
        display: flex;
        /*flex-direction: column;*/
    }
    .right-body {
        flex: 1;
        display: flex;
        overflow: hidden;
    }

    .profile2 > img {
        border-radius: 50%;
        width: 28px;
        height: 28px;
        border: 2px solid white;
        margin-left: 25px;
        margin-right: 5px;
    }

    .checkbox > input {
        width: 20px;
        height: 20px;
    }

    .down-arrow > img {
        width: 12px;
        height: 14px;
        margin-bottom: -2px;
        margin-left: 5px;
    }

    .has-search {
        padding-left: 30px;
        margin-left: 45px;
    }

    .scroll-cards {
        width: 370px;
        height: 100%;
        overflow: auto;

        padding: 20px 0px 5px 0px;
    }
    .card {
        background-color: white;
        border-radius: 4px;
        margin-top: 8px;
        margin-bottom: 5px;
        padding: 25px 25px 15px 25px;
        transition: 0.3s;
    }
    .card:hover {
        box-shadow: 5px 1px 20px 1px #ddd;
        transform: scale(0.96);
    }

    .addCard{
        background-color: #FFC300;
        border-radius: 4px;
        margin-top: 8px;
        margin-bottom: 5px;
        padding: 25px 25px 15px 25px;
        transition: 0.3s;
    }
    .addCard:hover {
        box-shadow: 5px 1px 20px 1px #ddd;
        transform: scale(0.96);
    }

    .mail-names {
        color: grey;
        font-weight: bold;
        font-size: 15px;
        margin-left: 10px;
    }

    .mails {
        display: flex;
        align-items: center;
    }
    .mails > img {
        width: 35px;
        border-radius: 10px;
    }
    .mail-info {
        margin: 10px 65px;
        margin-left: 0px;
        line-height: 1.7;
        font-weight: 600;
    }
    .check1 {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100px;
    }
    .bottom-info {
        display: flex;
        justify-content: space-between;
    }

    .person {
        width: 25px;
        height: 25px;
        border-radius: 10px;
        text-align: center;
        color: white;
        /*padding: 5px 3px 0px;*/
    }
    .border1 {
        background-color: white;
        color: #FFC300;
    }
    .border2 {
        background-color: #e32553;
    }
    .border3 {
        background-color: #01c828;
    }
    .inside-img > img {
        width: 100px;
        border-radius: 10px;
        margin-top: 20px;
    }
    .inside-img > img:hover {
        transform: scale(0.95);
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

</style>
