<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="/images/tmd2.png" width="191px" height="52px" alt=""></a>
        <div class="d-flex">
            <a href="/#home" class="nav-link">Home</a>
            <a href="/#blogs" class="nav-link">Blogs</a>
            @guest
                <a href="/login" class="nav-link">Login</a>
                <a href="/register" class="nav-link">Register</a>
            @endguest
            @auth
            <img src="{{auth()->user()->avatar}}" width="50" height="50" class="rounded-circle">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" href="/logout" class="nav-link btn btn-link">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>