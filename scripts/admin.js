


$('input#search11').on('click', function(){
		var search = $('input#search').val();
			$.post('../php/adminpost.php', {search: search}, function(data){
				$('div#admin').html(data);
			});
	});


$('input#search22').on('click', function(){
	var search2 = $('input#search2').val();
	//if($.trim(search) != ''){
		$.post('../php/adminpost.php', {search2: search2}, function(data){
			$('div#admin').html(data);
		});
	//}
});


$('input#search33').on('click', function(){
	var search3 = $('input#search3').val();
	//if($.trim(search) != ''){
		$.post('../php/adminpost.php', {search3: search3}, function(data){
			$('div#admin').html(data);
		});
	//}
});

