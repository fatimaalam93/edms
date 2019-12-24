<nav class="pcoded-navbar">
		<div class="sidebar_toggle"><a href=""><i class="icon-close icons"></i></a></div>
		<div class="pcoded-inner-navbar main-menu">
			<div class="">
				<div class="main-menu-header">
					<img class="img-80 img-radius" src="{{asset('public/assets/images/user_icon.png')}}" alt="User-Profile-Image">
					<div class="user-details">
						<span id="more-details">{{Auth::user()->name}}<i class="fa fa-caret-down"></i></span>
					</div>
				</div>
				<div class="main-menu-content">
					<ul>
						<li class="more-details">
							<a href=""><i class="ti-user"></i>View Profile</a>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="ti-layout-sidebar-left"></i>{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</li>
					</ul>
				</div>
			</div>

			<div class="pcoded-navigation-label">Navigation</div>
			<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu dashboard active pcoded-trigger">
				<a href="{{url('/')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
					<span class="pcoded-mtext">Dashboard</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>

			<li class="patient">
				<a href="{{url('patient')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-agenda"></i><b>P</b></span>
					<span class="pcoded-mtext">Patient</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>

            @canany(['Add User','View User List', 'Add/Edit Role'])
			<li class="pcoded-hasmenu settings">
				<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-settings"></i><b>P</b></span>
					<span class="pcoded-mtext">Settings</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					@canany('Add User')
					<li class="user">
						<a href="{{route('user.create')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Add User</span>
						</a>
					</li>
					@endcanany

					@canany('View User List')
					<li class="user">
						<a href="{{url('user')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Users List</span>
						</a>
					</li>
					@endcanany

					@can('Add/Edit Role')
					<li class="role">
						<a href="{{url('role')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Role</span>
						</a>
					</li>
					@endcan
					<!-- <li class="module_link">
						<a href="{{url('module_link')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Module links</span>
						</a>
					</li> -->
				</ul>
			</li>
			@endcanany
		</ul>
	</div>
</nav>