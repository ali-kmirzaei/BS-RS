<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <i class='fas fa-book-open' style="padding: 10px"></i>Book engine
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">درباره ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('book_list') }}">تمام کتب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">تمام ژانرها</a>
                </li>
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bought_books') }}">کتب شما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('suggestion') }}">پیشنهاد برای شما</a>
                    </li>
                    @if(auth()->user()->is_admin == 1)
                        <li class="nav-item">
                            <a style="color: black; background-color: #86cfda;" class="nav-link" href="{{ route('adminPanel.index') }}">پنل مدیریت</a>
                        </li>
                    @endif
                @endif
            </ul>

            <div style="display: flex; padding: 10px">
                @if(auth()->check())
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button style="border-radius: 0 0 0 0; " class="btn btn-danger">logout</button>
                    </form>
                @else
                    <a style="border-radius: 0 0 0 0; " href="{{ route('login') }}" class="btn btn-info">login</a>
                @endif
            </div>
        </div>
    </div>
</nav>
