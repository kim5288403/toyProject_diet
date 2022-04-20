<!-- Header -->
<section id="header">
    <div class="container">

        <!-- Logo -->
        <h1 id="logo"><a href=""></a></h1>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a class="icon solid fa-home" href="{{route("index")}}"><span>main</span></a></li>
                <li><a class="icon solid fa-retweet" href="{{route("meal.view")}}"><span>meal list</span></a></li>
                <li><a class="icon solid fa-cog" href="{{route("meal.meal")}}"><span>Make Meal</span></a></li>
                <li><a class="icon solid fa-sitemap" href="{{route("users.detail",empty(Auth::user()->id) ? 0 : Auth::user()->id)}}"><span>my page</span></a></li>
                @if(auth()->check())
                    <li><a href="{!! route("logout") !!}" class="icon fa-chart-bar"><span>logout</span></a></li>
                @endif
            </ul>
        </nav>

    </div>
</section>