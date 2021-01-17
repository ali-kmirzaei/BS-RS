
@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">کتبی که خریده اید</div>

                    <div class="card-body">
                        @if ( $bought_books && count($bought_books) > 0 )
                            @foreach ($bought_books as $bought_book)
                                <div style="display: inline-block; padding: 10px;">{{ $bought_book->cost }}</div>
                                <div style="display: inline-block; padding: 10px;">{{ $bought_book->author }}</div>
                                <div style="display: inline-block; padding: 10px;">{{ $bought_book->book_name }}</div>
    <br><span style="color: #D0D3D4">______________________________________________________________________</span><br>
                            @endforeach
                        @else
                            <div> موردی یافت نشد </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
