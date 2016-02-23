//Add tokens to Ajax Requests
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
});


// Auto Complete
$(function(){
	$('.autocomplete').each(function(){
		var $this = $(this);
		var url = $this.data('url');

		$this.autocomplete({
		    minChars: 2,
		    lookup: function(query, result){
		        $.getJSON(url, { autocomplete: true, q: query})
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
		});//autocomplete
	});//each
});//onLoad

// Drop Zone
Dropzone.autoDiscover = false;
$(function(){
	$('.dropzone').each(function(){
		var $this = $(this);
		var url = $this.data('url');
		var name = $this.data('name') || 'image';
		var multiple = $this.data('multiple') || false;

		$this.dropzone({
			url: url,
			uploadMultiple: false,
			paramName: name,
			addRemoveLinks: true,
			maxFiles: 1,
			params: {
				'_method': 'put'
			}
		});
	});
});