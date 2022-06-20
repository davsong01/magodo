 <!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="/dashboard">
                <img class="align-content" src="{{ asset('images/gofamintmagodo.png') }}" alt="">
            </a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/gofamintmagodo2.png') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
               
            </div>

            <div class="user-area dropdown float-right">
                <a href="{{ route('updateprofile') }}" class="" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ asset(auth()->user()->avatar)}}" alt="pp">
                </a>

            </div>

        </div>
    </div>
</header>