@extends('layouts.admin')

@section('content')
<script>
	(function(){
		$.ajax({
	    url: '/admin/car/33',
	    type: 'DELETE',
	    success: function(result) {
	        // Do something with the result
	    }
	});
	})();
</script>
@endsection
