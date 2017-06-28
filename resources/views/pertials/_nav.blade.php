<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Laravel Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li><a class="{{ \Illuminate\Support\Facades\Request::is('/')?"active":""  }}"
               href="/">Home</a></li>
               <li><a class="{{ \Illuminate\Support\Facades\Request::is('blog')?"active":""  }}"
                   href="/blog">Blog</a></li>
                   <li><a class="{{ \Illuminate\Support\Facades\Request::is('about')?"active":""  }}"
                       href="/about">About</a></li>
                       <li><a class="{{ \Illuminate\Support\Facades\Request::is('contact')?"active":""  }}"
                           href="/contact">Contact</a></li>
                       </ul>


                       <ul class="nav navbar-nav navbar-right">
                        @if(auth::check())
                        <li class="dropdown">
                            <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i>{{Auth::user()->name}}</i> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                                <li><a href="{{route('category.index')}}">Categories</a></li>
                                <li><a href="{{route('tag.index')}}">Tags</a></li>
                                <!-- <li><a href="#"></a></li> -->
                                <li role="separator" class="divider"></li>
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

                    @else
                    <li><a href="{{ route('login')}}" class="btn btn-default">Get in</a></li>
                    @endif

                </ul>

                

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>