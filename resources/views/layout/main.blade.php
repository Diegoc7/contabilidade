<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{session('msg')}}</p>
                @endif
            @yield('content');
            </div>
        </div>
    </main>

<footer>

</footer>
</body>
</html>