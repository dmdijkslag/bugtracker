   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/ie10-viewport-workaround.js"></script>
    <script>
    	$('div.alert').not('.alert-important').delay(3000).slideUp(300);

		$(".rowSelection").click(function(event) {
			document.location.href=$(this).data('href');
		});

    </script>