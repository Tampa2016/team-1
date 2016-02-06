

$(function() {  //  document.ready


$(".toCreate").click( function() { console.log("click");
	$('.login').modal('hide');
});
$(".toLogin").click( function() { console.log("click");
	$('.review').modal('hide');
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

$(".btn-login").click( function() { console.log("click");
	
	var user = $('input[name="loginUsername"]').val(),
		pass = $('input[name="loginPassword"]').val();

	$.ajax({
		url: "_include/ajax-functions.php",
		type: "POST",
		data: {
			'func':'account-login', 'user':user, 'pass':pass
		},
		success: function(data) {
			if(data == "loggedin"){location.reload();}
			$("#login-results").html(data);
		}
	});
});


$(".logout").click( function() { console.log("click");
	
	$.ajax({
		url: "_include/ajax-functions.php",
		type: "POST",
		data: {
			'func':'account-logout'
		},
		success: function(data) {
			console.log(data);
			location.reload();
			/*$("#login-results").html(data);*/
		}
	});
});

});// doc ready close