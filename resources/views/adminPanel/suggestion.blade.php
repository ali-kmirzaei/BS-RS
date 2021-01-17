@extends('adminPanel.index')

@section('content')

    <section>
        <h1 style="text-align: center">Upload Excel File</h1>
        <form method="post" enctype="multipart/form-data">
            {{ csrf_field()  }}
            <input type="file" id="fileToUpload" name="file">
            <input type="submit" value="Submit" name="submit">
        </form>
    </section>

@endsection