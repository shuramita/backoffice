
<nav class="navbar navbar-expand-md navbar-light navbar-backoffice">
    {{--<span class="join-ico">--}}
        {{--<a href="https://shura.io/?utm_source=demo&utm_medium=header&utm_campaign=demo" title="Join the ICO" target="_blank"><i class="fas fa-question"></i></a>--}}
    {{--</span>--}}
    <div class="container-fluid">

        <span class="navbar-btn">
        </span>
        <!-- Navbar brand -->
        <a class="navbar-brand px-lg-4 mr-0" href="{{route('backoffice.dashboard')}}">
            <img src="/images/logo-red-red-01.svg" height="30" alt="">
        </a>
        <div class="" id="">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu pull-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>
