<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">
		<div class="navbar-logo">
			<a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
				<i class="ti-menu"></i>
			</a>
			<div class="mobile-search waves-effect waves-light">
				<div class="header-search">
					<div class="main-search morphsearch-search">
						<div class="input-group">
							<span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
							<input type="text" class="form-control" placeholder="Enter Keyword">
							<span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
						</div>
					</div>
				</div>
			</div>
			 <a href="#" style="margin: 0 auto; font-size: 25px; font-weight: bold;">
				EDMS
			</a> 
			 <!-- <img src="{{asset('public/images/new_logo.png')}}" height="44" width="145" style="color: #FFFFFF;"> -->
			<a class="mobile-options waves-effect waves-light">
				<i class="ti-more"></i>
			</a>
		</div>
		<div class="navbar-container container-fluid">
			<ul class="nav-left">
				<li>
					<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
				</li>
				<li class="header-search">
					<div class="main-search morphsearch-search">
						<div class="input-group">
							<span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
							<input type="text" class="form-control" placeholder="Enter Keyword">
							<span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
						</div>
					</div>
				</li>
				<li>
					<a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
						<i class="ti-fullscreen"></i>
					</a>
				</li>
			</ul>
			<ul class="nav-right">
				<li class="user-profile header-notification">
					<a class="waves-effect waves-light">
						<img src="{{asset('public/assets/images/user_icon.png')}}" class="img-radius" alt="User-Profile-Image">
						<span>{{ Auth::user()->name }}</span>
						<i class="ti-angle-down"></i>
					</a>
					<ul class="show-notification profile-notification">
						<li class="waves-effect waves-light">
							<a href="">
								<i class="ti-user"></i> Profile
							</a>
						</li>

						<li class="waves-effect waves-light">
                            <a href="{{ url('user/editPassword',Auth::user()->id) }}">
                                <i class="ti-settings"></i> Change Password
                            </a>
                        </li>

						<li class="waves-effect waves-light">
							<a class="dropdown-item" href="{{ route('logout') }}"" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</li>
						
					</ul> 
				</li>
			</ul>
		</div>
	</div>
</nav>