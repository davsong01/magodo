<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <meta name="The Gospel Faith Mission International - Wonders Cathedral" content="Gospel, The Gospel Faith Mission International, Mission, GOFAMINT,  Wonders Cathedral, Magodo Assembly, Region 12 HQ, Magodo Lagos, Wonders Cathedral, Magodo Assembly, Region 12 HQ, Magodo Lagos" />
    <meta name="description" content="The Gospel Faith Mission International (GOFAMINT) - Wonders Cathedral, Magodo Assembly, Region 12 HQ, Magodo Lagos.">
    <meta name="author" content="The Gospel Faith Mission International">
	 
    <title>@yield('pageTitle')</title>
    <!-- Required meta tags -->
   
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
    
    @yield('topCss')
    
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400,500,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fontawsome -->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Animate CSS-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <!-- menu CSS-->
    <link href="{{asset('assets/css/bootstrap-4-navbar.css')}}" rel="stylesheet">   
    <!-- Portfolio Gallery -->
    <link href="{{asset('assets/css/filterizer.css')}}" rel="stylesheet">
    <!-- Lightbox Gallery -->
    <link href="{{asset('assets/js/lightbox/css/jquery.fancybox.css')}}" rel="stylesheet">
    <!-- OWL Carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <!-- Preloader CSS-->
    <link href="{{asset('assets/css/fakeLoader.css')}}" rel="stylesheet">
    <!-- Main CSS -->
    <link href="{{asset('assets/style.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('assets/animate.css')}}" rel="stylesheet"> --}}

    <!-- Responsive CSS -->
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <style>
        .sliders {
            height: 400px !important;
        }
        .business-nav {
            margin-right: 0 !important;
        }
        .single-bolg.hover01 {
            margin-bottom: 20px;
        }
    </style>
    <!--For Partial styles-->
    @yield('belowCss') 
    <!--for AJAX URL-->
    <script> var murl = "{{ url('/')}}"; </script>
	@yield('upperScript')
  </head>
  <body>
  
   <!-- Preloader -->
    <div id="fakeloader"></div>
    <div class="top-menu-1x">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-menu-left">
                   <strong>THE GOSPEL FAITH MISSION INTERNATIONAL - WONDERS CATHEDRAL</strong>
                  </div>                
                </div>              
                <div class="col-md-6">
                    <div class="top-menu-right">
                        <div class="footer-info-right">
                            <ul>
                                <li><a href="{{ $setting->facebook }}"> <i class="fa fa-facebook"></i> </a></li>                                       
                                <li><a href="{{ $setting->twitter }}"> <i class="fa fa-twitter"></i> </a></li>                                            
                                <li><a href="{{ $setting->youtube }}"> <i class="fa fa-youtube"></i> </a></li>                                    
                                <li><a href="{{ $setting->instagram }}"> <i class="fa fa-instagram"></i> </a></li>
                                <li><a href="{{ $setting->mail }}"> <i class="fa fa-envelope"></i> </a></li>   
                                @auth
                                <li title="My Account"><a href=""> <i class="fa fa-user"></i> </a></li>   
                                <li title="Logout" class="nav-item">
                                        <a href="{{route('logout')}}" aria-haspopup="true" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                        </a> 
                                    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        
                                </li>                          
                                @endauth
                                @guest
                                <li title="Login"><a href="/login"> <i class="fa fa-sign-in"></i> </a></li>   
                                @endguest
                            </ul>                   
                        </div>                  
                    </div>              
                </div>
            </div>
        </div>
    </div>

    <div class="bussiness-main-menu-1x" style="border-bottom: 1px solid #f9f9f9;">    
        <div class="container">
            <div class="row">
                <div class="col-md-12">     
                    <div class="business-main-menu">
                        {{-- Navbar         --}}
                        <nav class="navbar navbar-expand-lg navbar-light bg-light btco-hover-menu">
                            <a class="navbar-brand" href="{{route('index')}}">
                                <img src="{{asset('images/gofamintmagodo.png')}}" width="100" height="30" class="d-inline-block align-top" alt="">                       
                            </a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          
                            <ul class="navbar-nav ml-auto business-nav">

                                <li class="nav-item {{ Request::is('/') ? 'active' : ''  }}">
                                        <a class="nav-link" href="{{route('index')}}">
                                            Home
                                        </a> 
                                </li>
                                <li class="nav-item {{ Request::is('about') ? 'active' : ''  }}">
                                    <a class="nav-link" href="{{route('about')}}">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item dropdown {{  Request::is('districts/view', 'assemblies/view', 'single/*') || Request::is('assemblies') ? 'active' : ''  }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Locations
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                        <li><a class="dropdown-item" href="{{route('districts')}}">Districts</a></li>
                                        <li><a class="dropdown-item" href="{{route('assemblies')}}">Assemblies</a></li>                                
                                    </ul>
                                </li>
                                <li class="nav-item {{ Request::is('church-leadership') ? 'active' : ''  }}">
                                    <a class="nav-link" href="{{route('church-leadership')}}">
                                        Leadership
                                    </a>
                                </li>
                                <li class="nav-item dropdown {{ Request::is('livestream', 'livestream/youtube', 'livestream/mixlr') ? 'active' : ''  }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Live
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                        @if(!is_null(\App\Setting::value('mixlr_livestream_link')))
                                        <li><a target="_blank" class="dropdown-item" href="{{ \App\Setting::value('mixlr_livestream_link') }}">Radio</a></li>
                                        @endif
                                        @if(!is_null(\App\Setting::value('youtube_livestream_link')))
                                        <li><a class="dropdown-item" href="{{route('livestream.youtube')}}">Youtube TV</a></li>  
                                        @endif  
                                         @if(!is_null(\App\Setting::value('facebook_livestream_link')))
                                        <li><a class="dropdown-item" href="{{route('livestream.facebook')}}">Facebook TV</a></li>  
                                        @endif  
                                        
                                    </ul>
                                </li>   
                             
                              <li class="nav-item {{ Request::is('media-gallery') ? 'active' : ''  }}">
                                    <a class="nav-link" href="{{route('media.gallery')}}" aria-haspopup="true" aria-expanded="false">
                                        Media
                                    </a> 
                              </li>
                              <li class="nav-item {{ Request::is('donate') ? 'active' : ''  }}">
                                    <a class="nav-link" href="{{route('donate')}}" aria-haspopup="true" aria-expanded="false">
                                        Donate
                                    </a> 
                              </li>
                              
                              <li class="nav-item {{ Request::is('contact') ? 'active' : ''  }}">
                                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                              </li> 
                                 
                            </ul>
                            
                          </div>
                        </nav>
                        {{-- Navbar end --}}
                    </div>
                </div>
            </div>
        </div>
    </div> 
<!-- end:page header --> 

@yield('businessBanner')

@yield('content')  
    <!-- Start Footer -->
	<footer class="bussiness-footer-1x">		
		  <div class="bussiness-footer-content ">
				<div class="container">
					<div class="row">
						<div class="col-md-4">	
							<div class="bussiness-footer-address">	
								<a href="#"><img src="{{asset('images/logo-white.png')}}" alt="Logo"></a><br>
								
									<p> <i class="fa fa-phone"></i>+234909 877 1847 </p>				
									<p> <i class="fa fa-envelope"></i>info@gofamintmagodo.org.ng </p>								
									<p> <i class="fa fa-map-marker"></i> 20, Adekunle Banjo Street, <br />Magodo GRA, Shangisha, Lagos</p>											
							</div>
						</div>
						<div class="col-md-4">	
							<h5>Useful links</h5>
							<ul>
								<li><a href="#"> About Us</a></li>													
								<li><a href="{{ route('districts') }}"> Our Districts </a></li>				
								<li><a href="{{ route('assemblies') }}"> Our Assemblies  </a></li>	
                                <li><a href="{{ route('login') }}"> Login </a></li>			
							</ul>			
						</div>
						<div class="col-md-4">	
							<h5> Subscribe </h5>								
							<div class="subscriber-form">
								<form>
									<div class="form-group">
										<input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Enter Your E-mail">
									</div>									
									<a href="#" class=" btn bussiness-btn-larg">Submit</a>
								</form>
							</div>									
						</div>					
 
                        <div class="container">	
                            <div class="">
                                <div class="col-md-12 footer-info">
                                    <div class="row">	
                                        <div class="col-md-6">	
                                            <div class="footer-info-left">	
                                                <p>Copyright &copy; GOFAMINT Magodo {{ date('Y') }}. All Rights Reserved.</p>
                                            </div>			
                                        </div>			
                                        				
                                    </div>					
                                </div>					
                            </div>	  
						</div>
				
					</div>					
				</div>			
		  </div>		  
	</footer>	     
      
    <!-- End Footer -->  
            
    @yield('TopLowerScript')
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/js/ajax/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/ajax/popper.min.js')}}" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Wow Script -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- Counter Script -->
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Masonry Portfolio Script -->
    <script src="{{asset('assets/js/jquery.filterizr.min.js')}}"></script>
    <script src="{{asset('assets/js/filterizer-controls.js')}}"></script>
    <!-- OWL Carousel js-->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>  
    <!-- Lightbox js -->
    <script src="{{asset('assets/js/lightbox/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('assets/js/lightbox/js/lightbox.js')}}"></script>
    <!-- Google map js -->
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa6w23do1qZsmF1Xo3atuFzzMYadTuTu0"></script>    
    <script src="{{asset('assets/js/map.js')}}"></script>
    <!-- loader js-->
    <script src="{{asset('assets/js/fakeLoader.min.js')}}"></script>
    <!-- Scroll bottom to top -->
    <script src="{{asset('assets/js/scrolltopcontrol.js')}}"></script>
    <!-- menu -->
    <script src="{{asset('assets/js/bootstrap-4-navbar.js')}}"></script>    
    <!-- Stiky menu -->
    <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>  
    <!-- youtube popup video -->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>  
    <!-- Custom script -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    
    @yield('belowLowerScript')
    
  </body>
</html>     