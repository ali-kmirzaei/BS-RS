@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>برای تکمیل ثبت نام و دریافت کتب پیشنهادی باید فرم کتب مورد علاقه را هم تکمیل نمایید</h1>
                <a class="subtn" href="{{ route('accept_complete_register') }}">تایید</a>

            </div>
        </div>
    </div>

@endsection

<style>
.subtn{
    background-color: #1e7e34;
    text-decoration: none;
    color: white;
    padding: 1%;
    margin-right: 90%;
}

.subtn:hover{
    background-color: #4CAF50;
    text-decoration: none;
    color: white;
}

</style>

