<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>PET SHOP</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css">

        <link rel="stylesheet" href="{{ URL::asset('css/style3.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-switch.min.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/navigation.css') }}">
        <link rel="stylesheet" type="text/css" href="/css/demo2.css" />
        <link rel="stylesheet" type="text/css" href="/css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="/css/style1.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <script src="https://cdn.jsdelivr.net/sweetalert2/4.0.4/sweetalert2.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/4.0.4/sweetalert2.min.css">
    </head>
    <body>
{{--       <div class=" demo-2">
      <div class="content">
                <div id="large-header" class="large-header">
                    <canvas id="demo-canvas"></canvas>
    
                </div>
                
            </div>

            </div> --}}
        @section('nav')
          <div class="top-bar">
                <div class="top-bar-left">
                    <ul class="menu">

                        <li><a href="{{ URL::to('/') }}"><img class="logo" src="{{ URL::asset('image/logo-pet.jpg') }}" alt=""></a></li>
                        <li class="has-form">
                            <div class="row collapse" id="row_top_bar">
                              <form method="GET" action="search" style="width:444px;">
                              <input type="search"  id="txt_search" placeholder="Search" name="search">
                              <a type="submit" id="btn_search" class="alert button expand" ><i class="fa fa-search" aria-hidden="true" style="text-align: left"></i></a>
                              </form>
                        </li>

                      </ul>
                </div>

                <div class="top-bar-right">
                    <div id="menu" class="menu">
                          <ul>
                            @if (Auth::check())
                            @if (Auth::user()->role=="admin")
                                 <li class="menu-text cl-effect-21"><a><i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;Admin</a>
                                 <ul class="sub-menu" id="sub-menu1">
                                     <li class="menu-text cl-effect-21"><a href="{{ URL::to('admin/userlist') }}">Users List</a>
                                     </li>
                                     <li class="menu-text cl-effect-21"><a href="{{ URL::to('userprofile') }}">Update Profile</a></li>
                                    <li class="menu-text cl-effect-21"><a href="{{ URL::to('upload') }}">Upload</a></li>
                                 </ul>
                                </li>
                                 <li class="menu-text cl-effect-21"><a href="{{ URL::to('auth/logout') }}">Logout</a></li>
                            @else
                             <li class="menu-text cl-effect-21" ><a><i class="fa fa-user" aria-hidden="true"></i>&nbsp;User</a>
                                <ul class="sub-menu" >
                                    <li class="menu-text cl-effect-21"><a href="{{ URL::to('userprofile') }}">Update Profile</a></li>
                                    <li class="menu-text cl-effect-21"><a href="{{ URL::to('changepassword') }}">Change password</a></li>
                                    <li class="menu-text cl-effect-21"><a href="{{ URL::to('upload') }}">Upload</a></li>
                                   <!-- <li class="menu-text cl-effect-21"><a href="{{ URL::to('auth/logout') }}">Logout</a></li> -->
                               </ul>
                            </li>
                            <li class="menu-text cl-effect-21"><a href="{{ URL::to('auth/logout') }}">Logout</a></li>
                            @endif
                             @else
                                <li class="menu-text cl-effect-21"><a href="{{ URL::to('auth/login') }}">Login</a></li>
                                <li class="menu-text cl-effect-21"><a href="{{ URL::to('auth/register') }}">Register</a></li>
                             @endif
                          </ul>
                    </div>
                </div>
            </div>


        @show
        @section('sidebar')
            <nav class="main-menu">
            <ul>
                <li>
                    <a href="{{ URL::to('/') }}">
                        <i class="fa fa-home fa-2x edit"></i>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="{{ URL::to('list/all') }}">
                        <i class="fa fa-paw fa-2x edit"></i>
                        <span class="nav-text">
                            Chó thuần chủng
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="{{ URL::to('list/lai') }}">
                       <i class="fa fa-adjust fa-2x edit"></i>
                        <span class="nav-text">
                            Chó lai
                        </span>
                    </a>
                    
                </li>
                <!-- <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-list fa-2x edit"></i>
                        <span class="nav-text">
                            Kiến thức
                        </span>
                    </a>
                    
                </li> -->
                <!-- <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Pages
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                            Typography and Icons
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Tables
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul> -->
        </nav>
        @show

        <div class="container">
            @if(Auth::check() and Auth::user()->status=="blocked")
              <p style="text-align:center; color: red; font-size: 50px; margin-top: 150px">Your account was blocked!!!</p>
              <div class="input-group-button">
                <div class="menu-text"><a href="{{ URL::to('auth/logout') }}">Try again</a></div>
              </div>
            @else
                @yield('content')
            @endif
        </div>

        <!-- <script src="{{  URL::asset('js/demo-2.js') }}"></script>
        <script src="{{  URL::asset('js/rAF.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.js"></script>
        <script>
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
              }
          });
      </script>
        <script src="{{  URL::asset('js/app.js') }}"></script>

        <script src="//js.pusher.com/2.2/pusher.min.js"></script>
       <script>
           var pusher = new Pusher("fd7be52b85db926dab94");
       </script>
       <script src="{{  URL::asset('js/pusher.js') }}"></script> -->
      
    </body>
</html>
