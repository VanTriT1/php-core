$('#search-room').on('change', function() {
	var id_room = $(this).val();
	if(id_room==0){
		window.location.href = '/QLDMC/admin/bill/index.php';
	}else{
	    $.ajax({
	        type: "POST",
	        url: '/QLDMC/admin/bill/search.php?filter=room',
	        data: {'id_room':id_room},
	        success: function(data){
	        	$('ul.pagination').hide();
	            $('#tableBill tbody').html(data);                          
	        }
	    });
	    var length = $('#tableUser tbody tr').length;
	    $(".summary b.start").html(length);
	    $(".summary b.end").html(length);
	}
});

$('#search-month').on('change', function() {
	var month = $(this).val();
	if(month==0){
		window.location.href = '/QLDMC/admin/bill/index.php';
	}else{
	    $.ajax({
	        type: "POST",
	        url: '/QLDMC/admin/bill/search.php?filter=month',
	        data: {'month':month},
	        success: function(data){
	        	$('ul.pagination').hide();
	            $('#tableBill tbody').html(data);                          
	        }
	    });
	    var length = $('#tableUser tbody tr').length;
	    $(".summary b.start").html(length);
	    $(".summary b.end").html(length);
	}
});



