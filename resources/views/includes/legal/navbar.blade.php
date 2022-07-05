<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('legal-home') }}" class="logo">
                        <img src="/images/newlogo.png" alt="" class="logo" />
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ route('legal.regulation.index') }}">Database</a>
                        </li>
                        @if (auth()->user()->role == 'LEGAL')
                            <li class="scroll-to-section"><a href="{{ route('statistic') }}">Statistik Pekerjaan</a>
                        @endif
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('legal.service.index') }}">Service</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('legal.information.index') }}">Informasi</a>
                        </li>
                        <li class="scroll-to-section"><a href="{{ route('legal.database.index') }}">Regulasi</a></li>
                        <li class="scroll-to-section">
                            <a href="{{ route('legal.contact-us') }}">Hubungi Kami</a>
                        </li>
                        @guest
                            <li class="scroll-to-section">
                                <div class="main-red-button">
                                    <a href="{{ route('login') }}">Login</a>
                                </div>
                            </li>
                        @endguest
                        @auth
                            {{-- <a href="{{ route('logout') }}" style="margin-top: 7px; color: black">Hi,
                                {{ auth()->user()->name }}</a> --}}
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background: none; color:black; border:none">
                                    Hi,
                                    {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('legal.service.index') }}">Manajemen
                                            User</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    <li><a class="dropdown-item disabled" style="display: none" href="#">Another
                                            action</a></li>
                                </ul>
                            </div>
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
