<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Fungsi untuk menyimpan status sidebar
        function saveSidebarState(isToggled) {
            localStorage.setItem('sidebarToggled', isToggled);
        }

        // Fungsi untuk mengambil status sidebar dari penyimpanan lokal
        function getSidebarState() {
            return localStorage.getItem('sidebarToggled') === 'true';
        }

        $(document).ready(function () {
            // Mengambil status sidebar dari penyimpanan lokal
            var isSidebarToggled = getSidebarState();

            // Mengatur kelas 'toggled' berdasarkan status sidebar
            $("#wrapper").toggleClass("toggled", isSidebarToggled);

            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");

                // Menyimpan status sidebar ke penyimpanan lokal
                saveSidebarState($("#wrapper").hasClass("toggled"));
            });

            $(".nav-link").click(function () {
                var submenu = $(this).siblings(".sub-menu");

                if (submenu.length > 0) {
                    if ($(window).width() <= 768) {
                        // Toggle submenu untuk layar kecil
                        submenu.slideToggle();
                    } else {
                        // Toggle submenu untuk layar besar
                        submenu.toggleClass("show");
                        $(".sub-menu.show").not(submenu).removeClass("show");
                    }
                }
            });

            // Menutup submenu saat jendela diubah ukurannya
            $(window).resize(function () {
                if ($(window).width() > 768) {
                    $(".sub-menu").removeAttr("style");
                }
            });
        });
    </script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

header {
    background-color: #92E3A9;
    color: #fff;
    padding: 10px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 50px;
    border-radius: 30px;
}

.menu-toggle{
    cursor: pointer;
}

.navbar {
    display: flex;
}

.nav-list {
    list-style: none;
    display: flex;
}

.nav-item {
    margin: 0;
    cursor: pointer;
}

.button{
    cursor: pointer;
}


body {
overflow-x: hidden;
font-family: 'Poppins', sans-serif;
letter-spacing: 1px
}

/* Toggle Styles */

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #92E3A9;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #fff;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.nav-item {
    align-items: center;
    margin: 10px 0;
}

.nav-link {
    text-decoration: none;
    color: #ffffff;
    display: flex;
    align-items: center;
}

svg {
    fill: #ffffff;
    margin-right: 10px;
}


.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #FFFFFF';
}

.sidebar-nav > .sidebar-brand a:hover {
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }

    .logout{
        color: red;
    }
}

.sub-menu {
    display: none;
    list-style: none;
    padding-left: 20px;
}

.sub-menu.show {
    display: block;
}

    </style>

</head>

<body>
    <div id="wrapper" class="toggled">
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <br>
        <li class="sidebar-brand">
            <a href="{{ url('dashboard/pasien') }}" class="h2">
              <img src="{{ asset('gambar/logo.png') }}" style="width: 90%; margin-top: -58px; margin-left: 0%;">
            </a>
        </li>
        <br>
        <br>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('dashboard/pasien') }}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M192 48c0-26.5 21.5-48 48-48H400c26.5 0 48 21.5 48 48V512H368V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H192V48zM48 96H160V512H48c-26.5 0-48-21.5-48-48V320H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V224H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V144c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v48H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80v64H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80V464c0 26.5-21.5 48-48 48H480V96H592zM312 64c-8.8 0-16 7.2-16 16v24H272c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h24v24c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V152h24c8.8 0 16-7.2 16-16V120c0-8.8-7.2-16-16-16H344V80c0-8.8-7.2-16-16-16H312z"/></svg> ‎ ‎Dashboard</a>
        </li>

        @if (Auth::check() && Auth::user()->peran == 'asisten')
        <li class="nav-item">
            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg> ‎ ‎  Asisten Dokter</a>
            <ul id="asistenSubMenu" class="nav-list sub-menu">
                <!-- Add additional list items here -->
                <li><a href="{{ url('rekam/asisten') }}">Rekam Medis</a></li>
                <li><a href="{{url('resep/asisten')}}">Resep Dokter</a></li>
            </ul>
        </li>
        @endif
        
        @if (Auth::check() && Auth::user()->peran == 'apoteker')
        <li class="nav-item">
            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M175 389.4c-9.8 16-15 34.3-15 53.1c-10 3.5-20.8 5.5-32 5.5c-53 0-96-43-96-96V64C14.3 64 0 49.7 0 32S14.3 0 32 0H96h64 64c17.7 0 32 14.3 32 32s-14.3 32-32 32V309.9l-49 79.6zM96 64v96h64V64H96zM352 0H480h32c17.7 0 32 14.3 32 32s-14.3 32-32 32V214.9L629.7 406.2c6.7 10.9 10.3 23.5 10.3 36.4c0 38.3-31.1 69.4-69.4 69.4H261.4c-38.3 0-69.4-31.1-69.4-69.4c0-12.8 3.6-25.4 10.3-36.4L320 214.9V64c-17.7 0-32-14.3-32-32s14.3-32 32-32h32zm32 64V224c0 5.9-1.6 11.7-4.7 16.8L330.5 320h171l-48.8-79.2c-3.1-5-4.7-10.8-4.7-16.8V64H384z"/></svg> ‎  Apoteker</a>
            <ul id="asistenSubMenu" class="nav-list sub-menu">
                <!-- Add additional list items here -->
                <li><a href="{{ url('obat/apoteker') }}">Data Obat</a></li>
                <li><a href="{{ url('obat/tipe') }}">Tipe Obat</a></li>
            </ul>
        </li>
        @endif

        @if (Auth::check() && Auth::user()->peran == 'resepsionis')
        <li class="nav-item">
            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 96C0 43 43 0 96 0H384h32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32zM208 112v48H160c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h48v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V224h48c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H272V112c0-8.8-7.2-16-16-16H224c-8.8 0-16 7.2-16 16z"/></svg> ‎ ‎  Resepsionis</a>
            <ul id="asistenSubMenu" class="nav-list sub-menu">
                <!-- Add additional list items here -->
                <li><a href="{{ url('/resepsionis') }}">Pendaftaran</a></li>
                <li><a href="{{url('/dokter')}}">Dokter</a></li>
                <!-- <li><a href="{{url('dashboard/pasien')}}">Pasien</a></li> -->
                <li><a href="{{url('pendaftaran/poli')}}">Poli</a></li>
            </ul>
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{ url('transaksi/klinik') }}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"/></svg> ‎ ‎ History</a>
        </li>
      </br>
    </ul>
</div>

<div id="page-content-wrapper">
    <header>
        <div class="menu-toggle" class="btn button" id="menu-toggle">
            ☰ Menu
        </div>
        <nav class="navbar">
            <ul class="nav-list">
            </ul>
        </nav>
        <div class="dropdown text-end">
           <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('gambar/avatar.jpg') }}" width="32" height="32" class="rounded-circle">
           </a>
            <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="{{ url('/dashboard/profile') }}">Profile</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url('/auth/logout') }}" style="background-color: initial; color: initial;" onmouseover="this.style.backgroundColor='red'; this.style.color='white';" onmouseout="this.style.backgroundColor='initial'; this.style.color='initial';"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#1f2f4d}</style><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg> Logout</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <br/>
        @include('layout.flash-message')
        @yield('content')
       <br/>
    </div>
 </div>
</div>
    

    {{-- <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script> --}}

    
</body>
<footer>
    @yield('footer')
</footer>
<html>