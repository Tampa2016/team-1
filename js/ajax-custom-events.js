

$(function() {  //  document.ready


$(".toCreate").click( function() { console.log("click");
	$('.login').modal('hide');
});
$(".toLogin").click( function() { console.log("click");
	$('.create').modal('hide');
	$('.login').modal('show');
});


});// doc ready close