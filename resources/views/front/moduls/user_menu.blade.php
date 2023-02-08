<nav id="the-user-menu" class="main-menu-nav">
    @guest()
{{--        <ul class="menu horizontal align-right">--}}
{{--            <li class="to-left-more">--}}
{{--                <a href="{{route('login')}}" class="menu-single-icon"><i class="fa fa-user"></i></a>--}}
{{--            </li>--}}
{{--        </ul>--}}
    @endguest
    @auth()
        <ul class="menu horizontal align-right">


            <!-- User menu -->
            <li class="to-left-more">
                <div class="user-details-in-menu">
                    <a href="profile.php.htm" class="avatar"><img src="/assets/placeholder/people/50x50/2.jpg" alt=""/></a>
                </div>
                <ul class="sub-menu">
                    <li>
                        <a href="/admin/">Перейти в админку</a>
                    </li>

                    <li><a href="{{route('logout')}}">Выйти</a></li>
                </ul>
            </li>
        </ul>
    @endauth
</nav>
