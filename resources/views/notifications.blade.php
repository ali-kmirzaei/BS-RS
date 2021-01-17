
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

@if($errors->any())
    <div class="alert alert-danger" style="font-family:'B Yekan'; font-size: 15px; color: black; background-color: white; border: #229954 3px; padding: 10px; margin: 15px; display:inline-block;">
        @foreach($errors->all() as $error)
            <p>{{ $error }}&nbsp;<i class='fas fa-exclamation-triangle' style="color: #f1c40f ;"></i></p>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-danger" style="font-family:'B Yekan'; font-size: 15px; color: black; background-color: white; border: #229954 3px; padding: 10px; margin: 15px; display:inline-block;">
        <p style="padding: 20px;">{{ session('success') }}&nbsp;<i class='fas fa-check-circle' style="color:green;"></i></p>
    </div>
@endif

@if(session('sanitize'))
    <div class="alert alert-danger" style="font-family:'B Yekan'; font-size: 15px; color: black; background-color: white; border: #229954 3px; padding: 10px; margin: 15px; display:inline-block;">
        <p>{{ session('sanitize') }}&nbsp;<i class='fas fa-exclamation-triangle' style="color: #f1c40f ;"></i></p>
    </div>
@endif
