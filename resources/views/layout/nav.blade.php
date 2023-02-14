<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #4ea8de!important">
    <a class="navbar-brand" href="/">
        <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Blog
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="profile">Profile</a>
            </li>
        </ul>
        @auth
            <a href="logout" class="my-2 my-lg-0 nav-item loginBTN">Logout</a>
        @else
        <a href="register" class="my-2 my-lg-0 nav-item registerBTN">Register</a> |
        <a href="login" class="my-2 my-lg-0 nav-item loginBTN">Login</a>
        @endauth
    </div>
</nav>
