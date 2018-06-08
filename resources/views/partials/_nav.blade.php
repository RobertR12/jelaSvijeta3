<nav class="navbar navbar-default">

    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">



            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="/jelaSvijeta/public/">Meals</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="nav navbar-nav">

            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else

                <li class="dropdown">

                <li><a class="{{ Request::is('/') ? "active" : "" }}" href="/jelaSvijeta/public/">Home</a></li>
                <li><a class="{{ Request::is('meals/create') ? "active" : "" }}" href="/jelaSvijeta/public/meals/create">Unos Jela</a></li>
                <li><a class="{{ Request::is('meals') ? "active" : "" }}" href="/jelaSvijeta/public/meals">Pregled Jela</a></li>

                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

                <!--////////////////////////////////////////////////////////////////////////////-->

                <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        <i class="fa fa-bell"></i>

                    @if(auth()->user()->unreadnotifications->count())
                        <span class="badge badge-light">{{auth()->user()->unreadnotifications->count()}}</span>
                    @endif
                    </a>


                    <ul class="dropdown-menu">


                            @foreach(auth()->user()->unreadNotifications as $notification)

                            <li style="background-color: #41FF8E"><a href="{{route('markRead')}}">{{$notification->data['data']}}</a></li>
                            @endforeach

                            @foreach(auth()->user()->readNotifications as $notification)

                                <li><a style="background-color: whitesmoke" href="{{route('readNotifi')}}">{{$notification->data['data']}}</a></li>
                            @endforeach

                    </ul>
                </li>

            @endguest



            {{--<ul class="nav navbar-nav">
                <li><a class="{{ Request::is('/') ? "active" : "" }}" href="/jelaSvijeta/public/">Home</a></li>
                <li><a class="{{ Request::is('meals/create') ? "active" : "" }}" href="/jelaSvijeta/public/meals/create">Unos Jela</a></li>
                <li><a class="{{ Request::is('meals') ? "active" : "" }}" href="/jelaSvijeta/public/meals">Pregled Jela</a></li>


            </ul>--}}



            {{-- Desni dropdown, ZAKOMENTIRAN ISPOD--}}
            {{--<ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>--}}
            {{-- Desni dropdown, ZAKOMENTIRAN GORE--}}
        </div><!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>