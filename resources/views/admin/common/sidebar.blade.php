<div class="wrapper">
	<nav class="main-menu">
		<ul class="list-unstyled">
			<li class="admin-info">
				{!! Html::image('/assets/admin/images/m.jpg') !!}
				<div class="info">
					<h3>Mohammad Tashtoush</h3>
					<h3>Administrator</h3>
				</div>
			</li>
			<li class="active">
				<a href="{{ URL::route('admin.home') }}">
					<i class="fa fa-home"></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.systemuser.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">System Users</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.user.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">Users</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.role.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">User's Roles</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.car.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">Cars</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.city.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">Cities</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.page.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">Pages</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.comment.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">Comments</span>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-home"></i>
					<span class="text">Advertisements</span>
				</a>
			</li>
			<li>
				<a href="{{ URL::route('admin.option.index') }}">
					<i class="fa fa-home"></i>
					<span class="text">Options</span>
				</a>
			</li>
		</ul>
	</nav>
</div>