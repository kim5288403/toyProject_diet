<!-- Header -->
<section id="header">
    <div class="container">

        <!-- Logo -->
        <h1 id="logo"><a href=""></a></h1>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a class="icon solid fa-home" href="{{route("index")}}"><span>main</span></a></li>
                <li><a class="icon solid fa-cog" href="{{route("meal.meal")}}"><span>Make Meal</span></a></li>
                <li><a class="icon solid fa-retweet" href="right-sidebar.html"><span>Right Sidebar</span></a></li>
                <li><a class="icon solid fa-sitemap" href="{{route("users.detail",empty(Auth::user()->id) ? 0 : Auth::user()->id)}}"><span>my page</span></a></li>
                <li>
                    <a href="#" class="icon fa-chart-bar"><span>Dropdown</span></a>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                        <li>
                            <a href="#">Phasellus consequat</a>
                            <ul>
                                <li><a href="#">Magna phasellus</a></li>
                                <li><a href="#">Etiam dolore nisl</a></li>
                                <li><a href="#">Phasellus consequat</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Veroeros feugiat</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>
</section>