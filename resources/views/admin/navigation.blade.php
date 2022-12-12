<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						@empty(Auth::user()->foto)
							<img src="{{ url('admin/images/nophotos.png') }}" alt="Profile" class="img-radius">
						@else
							<img src="{{ url('admin/images')}}/{{Auth::user()->foto}}" alt="Profile" class="img-radius">
						@endempty
						<div class="user-details">
                            <span>{{ Auth::user()->nama }}</span>
							<div id="more-details">{{ Auth::user()->role }}
							{{-- <i class="fa fa-chevron-down m-l-5"></i> --}}
							</div>
						</div>
					</div>
					{{-- <div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div> --}}
				</div>
				
				<ul class="nav pcoded-inner-navbar "></br>
					<li class="nav-item">
					    <a href="{{ url('/administrator') }}" class="nav-link "><span class="pcoded-micon">
							<i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Master Data</label>
					</li>
					<li class="nav-item">
					    <a href="{{ url('/anak_asuh') }}" class="nav-link "><span class="pcoded-micon">
							<i class="feather icon-layout"></i></span><span class="pcoded-mtext">Anak Asuh</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ url('/donatur') }}" class="nav-link "><span class="pcoded-micon">
							<i class="feather icon-layout"></i></span><span class="pcoded-mtext">Donatur</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ url('/donasi') }}" class="nav-link "><span class="pcoded-micon">
							<i class="feather icon-layout"></i></span><span class="pcoded-mtext">Donasi</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ url('/kategori_kegiatan') }}" class="nav-link "><span class="pcoded-micon">
							<i class="feather icon-layout"></i></span><span class="pcoded-mtext">Kategori Kegiatan</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ url('/kegiatan') }}" class="nav-link "><span class="pcoded-micon">
							<i class="feather icon-layout"></i></span><span class="pcoded-mtext">Kegiatan</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Setting</label>
					</li>
					<li class="nav-item">
					    <a href="{{ url('/user') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Kelola User</span></a>
					</li>
				</ul>
				
			</div>
		</div>
	</nav>
