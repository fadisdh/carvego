@extends('layouts.admin')
@section('title', 'pages')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">Informative Pages</h2>
		<a href="{{ URL::route('admin.page.create') }}" class="btn col-md-2">Add New Page</a>
	</div>
	<table class="table table-responsive table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Slug</th>
				<th>Type</th>
				<th width="15"><span class="fa fa-eye"></span></th>
				<th width="15"><span class="fa fa-edit"></span></th>
				<th width="15"><span class="fa fa-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->title }}</td>
					<td>{{ $page->slug }}</td>
					<td>{{ $page->type }}</td>
					<td><a href="{{ URL::route('admin.page.show', $page->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.page.edit', $page->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.page.destroy', $page->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		<?php echo $pages->render(); ?>
	</div>
	
	<input type="text" name="user" class="form-control autocomplete" data-url="{{ route('admin.user.index') }}" autocomplete="off">
	<script type="text/javascript" src="{{ asset('assets/vendor/jquery.autocomplete/jquery.autocomplete.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			$('.autocomplete').autocomplete({
			    minChars: 2,
			    lookup: function(query, result){
			        $.getJSON("{{ route('admin.user.index') }}", { autocomplete: true, q: query})
			        .done(function(data){
			        	result({
			        		suggestions: 	$.map(data, function(key, val){
							        			return { value: key, data: val}
							        		})
			        	});
			        })
			        .fail(function(){
			        	alert('ERROR IN CONNECTION');
			        });
			    }
			});
		});
	</script>

@endsection