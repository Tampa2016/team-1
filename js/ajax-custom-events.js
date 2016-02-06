

$(function() {  //  document.ready


$(".toCreate").click( function() { console.log("click");
	$('.login').modal('hide');
});
$(".toLogin").click( function() { console.log("click");
	$('.create').modal('hide');
	$('.login').modal('show');
});

$(".btn-create").click( function() { console.log("click");
	
	var email = $('input[name="createEmail"]').val(),
		user = $('input[name="createUsername"]').val(),
		pass = $('input[name="createPassword"]').val();

	$.ajax({
		url: "_include/ajax-functions.php",
		type: "POST",
		data: {
			'func':'create-account', 'email':email, 'user':user, 'pass':pass
		},
		success: function(data) {
			$("#create-results").html(data);
		}
	});
});



});// doc ready close