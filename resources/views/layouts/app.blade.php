<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SI-KAJI</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <ul class="navbar-nav ms-auto ml-4">
                    <img
                        class="mt-1"
                        width="120px" height="44" 
                        src="https://www.ojk.go.id/SiteAssets/logo2.png">
                    </img>
                </ul>
            <div class="container">
                
                <ul class="navbar-nav ms-auto">
                    <img
                        class="mt-1"
                        width="30px" height="30" 
                        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.6MEn1wZkViQK-XUfpCl4ogHaHv%26pid%3DApi&f=1">
                    </img>
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">
                                Admin
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

            </div>
        </nav> -->
        <div class="container">
                <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
                    <el-menu-item index="1">Dashboard</el-menu-item>
                                <el-submenu index="2">
                                    <template slot="title">Workspace</template>
                                    <el-menu-item index="2-1">item one</el-menu-item>
                                    <el-menu-item index="2-2">item two</el-menu-item>
                                    <el-menu-item index="2-3">item three</el-menu-item>
                                    <el-submenu index="2-4">
                                    <template slot="title">item four</template>
                                    <el-menu-item index="2-4-1">item one</el-menu-item>
                                    <el-menu-item index="2-4-2">item two</el-menu-item>
                                    <el-menu-item index="2-4-3">item three</el-menu-item>
                                    </el-submenu>
                                </el-submenu>
                    <el-menu-item index="3" disabled>Info</el-menu-item>
                </el-menu>
        </div>
            
        <!-- @yield('subheader') -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="border-top: 1px outset; ">
            @yield('subheader')
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>

    </div>
    
</body>


</html>

