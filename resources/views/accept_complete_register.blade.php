@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div style="margin:0 auto; box-sizing: border-box; text-align: center;">

                    @include('notifications')
                    <form method="post" enctype="multipart/form-data">
                        {{ csrf_field()  }}

                        <label class="title">کتب مورد علاقه</label><br>
                        <input type="text" name="books" placeholder="نمونه-نمونه-نمونه-...">
                        <br><br>

                        <label class="title" for="groupName">ژانرهای مورد علاقه</label><br>
                        <div class="genres">
                            @for($i=0 ; $i<count($genres) ; $i+=1)
                                <div class="genre">
                                    <label>{{ $genres[$i]->genre_name }}</label>
                                    <input type="checkbox" name="g{{$i+1}}" value="{{$genres[$i]->id}}">
                                </div>
                            @endfor
                        </div>
                        <br>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


<style>
.title{
    font-size: 25px;
    padding-top: 50px;
}
.genres{
    display: flex;
    flex-wrap: wrap;
    text-align: center;
}
.genre{
    margin-left: 25px;
    margin-bottom: 5px;
}


input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;

}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>
