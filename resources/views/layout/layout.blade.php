<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')

    <style>
        /* .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Show it is fixed to the top */
        /* body {
            min-height: 75rem;
            padding-top: 5.5rem;
        }  */
        body {
    overflow-x: hidden;
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
    color: #EEFFF3;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
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

    </style>

</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br/>
                <li class="sidebar-brand">
                    <a href="#" class="h2">
                        SEHATKUU
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('dashboard/pasien') }}">Dashboard</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('rekam/asisten') }}">Asisten Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('obat/apoteker') }}">Apoteker</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('Pasien/pasien') }}">Resepsionis</a>
                </li>
                <br>
                <br>
                <br>
                <li class="nav-item">
                    <a class="logout btn btn-outline-danger" style="color:white; background-color:red; width: 100px; margin-left:20px; padding-right:90px" href="{{ url('logout') }}">Logout</a>
                </li>
                
            </ul>
        </div>
    {{-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SEHATKUU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('dashboard/pasien') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('pasien/resepsionis') }}">Resepsionis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('rekam/asisten') }}">Asisten Dokter</a>
                    </li>
                    <!-- @endif -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('transaksi/klinik') }}">Transaksi Klinik</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('obat/apoteker') }}">Apoteker</a>
                    </li>
                </ul>
                <form class="d-flex mt-2">
                    <a class="btn btn-outline-danger" href="{{ url('logout') }}">Logout</a>
                </form>
            </div>
        </div>
    </nav> --}}

    <div class="container">
        <br/>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">▶ </a>
        @include('layout.flash-message')
        @yield('content')
       <br/>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
<footer>
    @yield('footer')
</footer>
<html>


