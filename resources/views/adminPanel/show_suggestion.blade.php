@extends('adminPanel.index')

@section('content')

    <section dir="rtl">
        <h1 style="text-align: center">Best Books</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th style="text-align: center;">name</th>
                    <th style="text-align: center;">genres</th>
                    <th style="text-align: center;">author</th>
                    <th style="text-align: center;">cost</th>
                    <th style="text-align: center;">score(sort:Descending)</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">

            @include('notifications')
            <table cellpadding="0" cellspacing="0">
                <tbody>
                @foreach($new_books as $new_book)
                    <tr>
                        <td style="text-align: center;">{{ $new_book->name }}</td>
                        <td style="text-align: center;">{{ $new_book->genres }}</td>
                        <td style="text-align: center;">{{ $new_book->author }}</td>
                        <td style="text-align: center;">{{ $new_book->cost }}</td>
                        <td style="text-align: center;">{{ $new_book->score }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection

<style>


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


</style>

