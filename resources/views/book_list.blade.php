
@extends('layouts.master')

@section('content')
<body>
    <section dir="rtl">
      <h1>All Available Books</h1>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align: center;">نام کتاب</th>
                <th style="text-align: center;">نویسنده</th>
                <th style="text-align: center;">قیمت</th>
              <th style="text-align: center;">ژانر</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">

        @include('notifications')
        <table cellpadding="0" cellspacing="0">
          <tbody>
                @foreach($books as $book)
                <tr>
                    <td style="text-align: center;">{{ $book->book_name }}</td>
                    <td style="text-align: center;">{{ $book->author }}</td>
                    <td style="text-align: center;">{{ $book->cost }}</td>
                    <td style="text-align: center;">
                        @for($i=0 ; $i<count($book->genres)-1 ; $i++)
                            {{ $book->genres[$i]->genre_name }} ,
                        @endfor
                        @if(count($book->genres)-1 == -1)
                            <?php dd($book); ?>
                        @endif
                        {{ $book->genres[count($book->genres)-1]->genre_name }}
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </section>

    </body>

@endsection

    <style>

    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  padding: 5px 7px;
  background-color: transparent;
  color: white;
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  padding: 5px 7px;
  background-color: transparent;
  color: white;
  border: 2px solid red;
}

.button2:hover {
  background-color: red;
  color: white;
}


h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: black;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: black;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%);
  height: 1000px;
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}

.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


::-webkit-scrollbar {
    width: 6px;
}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}


    </style>
