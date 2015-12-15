@extends('layouts.admin')
@section('title', 'pages')

@section('content')
	<h2 class="page-header">pages</h2>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>title</th>
				<th>slug</th>
				<th>type</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->title }}</td>
					<td>{{ $page->slug }}</td>
					<td>{{ $page->type }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
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