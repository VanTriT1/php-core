$('#search-role').on('change', function() {
	var role = $(this).val();
	if(role==0){
		window.location.href = '/QLDMC/admin/user/index.php';
	}else{
	    $.ajax({
	        type: "POST",
	        url: '/QLDMC/admin/user/search.php?filter=role',
	        data: {'role':role},
	        success: function(data){
	        	$('ul.pagination').hide();
	            $('#tableUser tbody').html(data);                          
	        }
	    });
	    var length = $('#tableUser tbody tr').length;
	    $(".summary b.start").html(length);
	    $(".summary b.end").html(length);
	}
});

$('#search-username').on('keyup', function() {
	var username = $(this).val();
	if(username==""){
		window.location.href = '/QLDMC/admin/user/index.php';
	}
    $.ajax({
        type: "POST",
        url: '/QLDMC/admin/user/search.php?filter=username',
        data: {'username':username},
        success: function(data){
        	$('ul.pagination').hide();
            $('#tableUser tbody').html(data);                          
        }
    });
    var length = $('#tableUser tbody tr').length;
    $(".summary b.start").html(length);
    $(".summary b.end").html(length);
});


