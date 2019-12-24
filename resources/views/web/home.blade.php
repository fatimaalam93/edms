@include('web.header')
<body cz-shortcut-listen="true" class="" style="">
    <div class="wrapper">

    <div class="preloader" style="display: none;"></div>

    <!-- Page-wrapper Start-->
    <div class="page-wrapper">

    @include('web.menu')
        

        <!-- Slider start-->
        <section class="slider-wrapper">
            <div id="slider-style-one" class="carousel slide bs-slider control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#slider-style-one" data-slide-to="0" class="active"></li>
                    <li data-target="#slider-style-one" data-slide-to="1" class=""></li>
                    <li data-target="#slider-style-one" data-slide-to="2" class=""></li>
                </ol>

                <!-- Wrapper For Slides -->
                <div class="carousel-inner" role="listbox">


                    <!-- Third Slide -->
                    <div class="item active">

                        <!-- Slide Background -->
                        <img src="{{asset('public/web_assets/img/1.jpg')}}" alt="Slider Images" class="slide-image">
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide-style-left">
                                    <h4 data-animation="animated fadeInLeft" class="">Get best medical service</h4><br>
                                    <h2 class="" data-animation="animated fadeInLeft">Life Wellness<span class="color-defult"> Programs</span></h2><br>
                                    <a href="http://heatmaponline.com/html/hseba/index-two.html#" class="btn btn-default" data-animation="animated fadeInLeft">check our services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->

                    <!-- Third Slide -->
                    <div class="item">

                        <!-- Slide Background -->
                        <img src="{{asset('public/web_assets/img/2.jpg')}}" alt="Slider Images" class="slide-image">
                        <div class="bs-slider-overlay"></div>
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide-style-right">
                            <h4 data-animation="animated fadeInLeft" class="">Get best medical service</h4><br>
                            <h2 data-animation="animated fadeInLeft" class="">Life Wellness Programs</h2><br>
                            <a href="http://heatmaponline.com/html/hseba/index-two.html#" class="btn btn-default" data-animation="animated fadeInLeft">check our services</a>
                        </div>
                    </div>
                    <!-- End of Slide -->


                    <!-- Third Slide -->
                    <div class="item">

                        <!-- Slide Background -->
                        <img src="{{asset('public/web_assets/img/3.jpg')}}" alt="Slider Images" class="slide-image">
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide-style-left">
                                    <h4 data-animation="animated fadeInLeft" class="">Get best medical service</h4><br>
                                    <h2 class="" data-animation="animated fadeInLeft">Life Wellness<span class="color-defult"> Programs</span></h2><br>
                                    <a href="http://heatmaponline.com/html/hseba/index-two.html#" class="btn btn-default" data-animation="animated fadeInLeft">check our services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->


                </div><!-- End of Wrapper For Slides -->

                <!-- Left Control -->
                <a class="left carousel-control" href="http://heatmaponline.com/html/hseba/index-two.html#slider-style-one" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <!-- Right Control -->
                <a class="right carousel-control" href="http://heatmaponline.com/html/hseba/index-two.html#slider-style-one" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div> <!-- End  slider-style-one Slider -->
        </section>
        <!-- Slider End -->

        <!-- Welcome Section Start -->
        <section class="welcome-section pt-100 pb-70 bg-f9">
            <div class="container">
                <div class="row welcome-feature">
                    <div class="col-md-7">
                        <div class="divider-content why-choose">
                            <h6>Our Key Feature</h6>
                            <h3>Welcome To<span> ADON</span></h3>
                            <div class="border-style-2 mb-50"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="welcome-item">
                                    <div class="content">
                                        <i class="fa fa-table" style="font-size:36px; color: #2facde;"></i>
                                        <h3><span> Support Plan</span></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <span class="serial-number">1</span>
                                        <a class="welcome-btn" href="#">view more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="welcome-item">
                                    <div class="content">
                                        <i class="fa fa-table" style="font-size:36px; color: #2facde;"></i>
                                        <h3><span>Education</span></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <span class="serial-number">2</span>
                                        <a class="welcome-btn" href="#">view more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="welcome-item">
                                    <div class="content">
                                        <i class="fa fa-table" style="font-size:36px; color: #2facde;"></i>
                                        <h3><span>Home Security</span></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <span class="serial-number">3</span>
                                        <a class="welcome-btn" href="#">view more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="welcome-item">
                                    <div class="content">
                                        <i class="fa fa-table" style="font-size:36px; color: #2facde;"></i>
                                        <h3>Risk Management Plan</span></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <span class="serial-number">4</span>
                                        <a class="welcome-btn" href="#">view more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="thumb">
                            <img alt="" src="{{asset('public/web_assets/img/wel-1.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Welcome Section End -->


         <div class="site-footer-space"></div>

        <!-- Footer Style One Start -->
        @include('web.footer')
        <!-- Footer Style One End -->

        <section class="sign-in-model">
            <!-- Login -->
            <div class="modal fade theme-login theme-model" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Login</h4>
                            <a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sign-name-1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="sign-password-1" placeholder="Password">
                                </div>
                                <a class="btn btn-theme mt-2" href="http://heatmaponline.com/html/hseba/index-two.html#">Sign In</a>
                                <div class="row mt-5">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"> Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="http://heatmaponline.com/html/hseba/index-two.html#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="mb-2"> Don't Have an Account? <a href="http://heatmaponline.com/html/hseba/index-two.html#" class="theme-color">Register Now</a></div>
                            <ul class="theme-media-blog">
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-twitter "></i></a></li>
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-facebook "></i></a></li>
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-google "></i></a></li>
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-github "></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login -->

            <!-- Register -->
            <div class="modal fade theme-register theme-model" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Register</h4>
                            <a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sign-username" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sign-email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="sign-password" placeholder="Password">
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"> I Agree to the Terms and Conditions</label>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <a class="btn btn-theme" href="http://heatmaponline.com/html/hseba/index-two.html#">Sign Up</a>
                            </form>
                        </div>
                        <div class="modal-footer text-center">
                            <div class="mb-3"> Already Have an Account? <a href="http://heatmaponline.com/html/hseba/index-two.html#" class="theme-color">Login</a></div>
                            <ul class="theme-media-blog">
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-twitter "></i></a></li>
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-facebook "></i></a></li>
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-google "></i></a></li>
                                <li><a href="http://heatmaponline.com/html/hseba/index-two.html#"><i class="fa fa-github "></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Register -->
        </section>

    </div>
    <!-- Page-wrapper End -->

    <a href="#" class="scrollup" style="display: none;"><i class="pe-7s-up-arrow" aria-hidden="true"></i></a>

    <!-- Main JavaScript -->
    @include('web.footer_js')
    

  </div><style type="text/css">.txt-rotate > .wrap { border-right: 0.08em solid #666 }</style></body></html>