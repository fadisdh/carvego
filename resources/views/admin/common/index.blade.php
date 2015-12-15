@extends('layouts.admin')
@section('title', 'pages')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Dashboard</h2>
	</div>
	<div class="row dashboard">
        <div class="col-md-6">
            <div class="dashboard-box main-chart">
                {!! Html::image('/assets/admin/images/chart1.jpg') !!}             
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-box">
                 sfsdfs               
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-box">
                 sfsdfs               
            </div>
        </div>
	</div>

	<div class="row dashboard">
        <div class="col-md-3">
            <div class="dashboard-box clients">
                <h3 class="stat">New Clients Today</h3>
                <h2 class="stat-result">254</h2>              
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-box visitors">
                <h3 class="stat">New Visitors Today</h3>
                <h2 class="stat-result">1326</h2>                  
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-box listings">
            	<h3 class="stat">New Listings Today</h3>
                <h2 class="stat-result">112</h2>             
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-box others">
            	<h3 class="stat"></h3>
                <h2 class="stat-result">More Statistics</h2>               
            </div>
        </div>
	</div>

	<div class="row dashboard">
        <div class="col-md-3">
            <a href="{{ URL::route('admin.systemuser.index') }}" class="dashboard-box">
            	{!! Html::image('/assets/admin/images/systemuser.png') !!}
                <h3>System Users</h3>           
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ URL::route('admin.user.index') }}" class="dashboard-box">
            	{!! Html::image('/assets/admin/images/user.png') !!}
                <h3>Users</h3>           
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ URL::route('admin.role.index') }}" class="dashboard-box">
            	{!! Html::image('/assets/admin/images/roles.png') !!}
                <h3>Users Roles</h3>           
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ URL::route('admin.car.index') }}" class="dashboard-box">
            	{!! Html::image('/assets/admin/images/cars.png') !!}
                <h3>Cars</h3>           
            </a>
        </div>
	</div>

	<div class="row dashboard">
        <div class="col-md-3">
            <a href="{{ URL::route('admin.city.index') }}" class="dashboard-box">
                {!! Html::image('/assets/admin/images/ads.png') !!}
                <h3>Cities</h3>           
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ URL::route('admin.page.index') }}" class="dashboard-box">
            	{!! Html::image('/assets/admin/images/pages.png') !!}
                <h3>Informative Pages</h3>           
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ URL::route('admin.comment.index') }}" class="dashboard-box">
            	{!! Html::image('/assets/admin/images/comments.png') !!}
                <h3>Users Comments</h3>           
            </a>
        </div>
        <div class="col-md-3">
            <a class="dashboard-box">
            	{!! Html::image('/assets/admin/images/ads.png') !!}
                <h3>Advertisements</h3>           
            </a>
        </div>
	</div>
    <div class="row dashboard">
        <div class="col-md-3">
            <a class="dashboard-box">
                {!! Html::image('/assets/admin/images/reports.png') !!}
                <h3>Reports</h3>           
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ URL::route('admin.option.index') }}" class="dashboard-box">
                {!! Html::image('/assets/admin/images/options.png') !!}
                <h3>Options</h3>           
            </a>
        </div>
    </div>

@endsection