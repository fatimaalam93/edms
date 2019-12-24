<header class="main-herader">
            <!-- Header top start -->
            <div class="top_header">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-topbar-col center767">
                                <ul class="list-inline pull-left address center767">
                                    <li><i class="fa fa-envelope"></i><a href="#">info@yourmail.com</a></li>
                                    <li class="display-n-768"><i class="fa fa-map-marker"></i><a href="#">121 Road, Melbourne</a></li>
                                </ul>
                                <ul class="socials-icon pull-right center767">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Navigation -->
            <div class="wrap-sticky" style="height: 80px;"><nav id="navbar-main" class="navbar bootsnav on no-full affix-top navbar-default navbar-sticky">
                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container p-0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" placeholder="Search" class="form-control">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->
                <div class="container p-0">
                   

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button data-target="#navbar-menu" data-toggle="collapse" class="navbar-toggle collapsed" type="button" aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a href="" class="navbar-brand"><img alt="" class="logo" src="{{asset('public/web_assets/img/logo.png')}}"></a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div id="navbar-menu" class="navbar-collapse collapse" aria-expanded="false" role="navigation" style="height: 0px;">
                        <ul data-out="fadeOutDown" data-in="fadeInUp" class="nav navbar-nav navbar-right">
                            
                            <li class="dropdown">
                                <a  class="dropdown-toggle" href="{{url('home')}}">Home </a>
                                <ul class="dropdown-menu animated fadeOutDown" style="display: none; opacity: 1;">
                                    <li class="dropdown">
                                        <a href="">Cardilogists Depertment</a>
                                       
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">Support Plan </a> -->
                                <a class="dropdown-toggle" href="{{url('support_plan')}}">Support Plan</a>
                                <ul class="dropdown-menu animated fadeOutDown" style="display: none; opacity: 1;">
                                    <li class="dropdown">
                                        <a href="">Support Plan in Place</a>
                                       
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="{{route('behabiour')}}">Behabiour </a> -->
                                <a class="dropdown-toggle" href="{{url('behabiour')}}">Behabiour </a>
                            
                            </li>
                            
                            
                            
                            <li class="dropdown">
                                <a href="">Contact</a>
                            </li>
                        </ul>
                    
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav></div>
            <!-- End Navigation -->
        </header>