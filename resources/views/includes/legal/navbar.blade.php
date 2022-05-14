<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home') }}" class="logo">
                        <img src="/images/logo.png" alt="" class="logo" />
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ route('regulation.index') }}">Regulasi</a></li>
                        <li class="scroll-to-section"><a href="{{ route('statistic') }}">Statistik Pekerjaan</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('information.index') }}">Informasi</a>
                        </li>
                        <li class="scroll-to-section"><a href="{{ route('database.index') }}">Database</a></li>
                        <li class="scroll-to-section">
                            <a href="{{ route('contact-us') }}">Hubungi Kami</a>
                        </li>
                        @guest
                            <li class="scroll-to-section">
                                <div class="main-red-button">
                                    <a href="{{ route('login') }}">Login</a>
                                </div>
                            </li>
                        @endguest
                        @auth
                            <a href="{{ route('logout') }}" style="margin-top: 7px; color: black">Hi,
                                {{ auth()->user()->name }}</a>
                        @endauth
                    </ul>
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
    <div class="red-line">
        @php
            use Illuminate\Support\Carbon;
        @endphp
        <span>{{ Carbon::now()->translatedFormat('l, d F Y | H:i') }} WIB</span>
        <span>Selamat Datang di Legal Service Access</span>
    </div>
</header>
<!-- ***** Header Area End ***** -->
