<div class="wrapper">
	<a href="{{ URL::route('admin.home') }}" class="admin-logo col-md-3">CARVEGO Dashboard</a>
	<nav class="top-menu col-md-6">
		<ul class="list-unstyled">
			<li class="active">
				<a href="{{ URL::route('admin.home') }}">
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.systemuser.index') }}">
					<span class="text">System Users</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.user.index') }}">
					<span class="text">Users</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.role.index') }}">
					<span class="text">User's Roles</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.car.index') }}">
					<span class="text">Cars</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.city.index') }}">
					<span class="text">Cities</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.page.index') }}">
					<span class="text">Pages</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.comment.index') }}">
					<span class="text">Comments</span>
				</a>
			</li>
			<li>
				<a href="">
					<span class="text">Advertisements</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.option.index') }}">
					<span class="text">Options</span>
				</a>
			</li>
		</ul>
	</nav>
	<div class="col-md-3">
		<a href="{{ URL::route('admin.logout') }}" class="btn">Log Out</a>
		<a href="#" class="btn">Go To Website</a>
	</div>
</div>