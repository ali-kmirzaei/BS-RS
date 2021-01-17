
@include('notifications')

<div style="display: flex; flex-wrap: wrap; justify-content: center;">
        @foreach ($genres as $genre)
            <div class="card">
                <div class="card-header">{{ $genre->genre_name }}</div>
                <div class="card-body">
                    @if ( count($genre->books) > 0 )
                        <a class="cardBtn" href="{{ route('single_genre',$genre->id) }}">نمایش کتب</a>
                    @else
                        <div style="padding: 10px; color: #922B21;">کتابی موجود نیست</div>
                    @endif
                </div>
            </div>
        @endforeach
</div>
{{ $genres->links() }}



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
        background-color: whitesmoke;
        color: black;
        border: 0px;
        border-radius: 5px;
        padding: 5px;
        margin: 5px;
        margin-top: 15px;
        text-decoration: none;
    }
    .cardBtn:hover{
        background-color: #34495e;
        color: white;
        padding: 5px;
        margin: 5px;
        margin-top: 10px;
        cursor: pointer;
        box-shadow: darkgray 0px 0px 5px;
        text-decoration: none;
        transition: 100ms;
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

    .abilan > img {
        width: 120px;
        margin-bottom: 30px;
        margin-left: -8px;
    }


    .avatar > img {
        width: 35px;
        border-radius: 10px;
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

    .card {
        background-color: white;
        border-radius: 4px;
        margin-top: 8px;
        margin-bottom: 5px;
        padding: 25px 25px 15px 25px;
        transition: 0.3s;
        overflow: hidden;
    }
    .card:hover {
        box-shadow: 5px 1px 20px 1px #ddd;
        transform: scale(0.96);
    }

    .mails > img {
        width: 35px;
        border-radius: 10px;
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
