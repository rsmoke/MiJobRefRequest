$(document).ready( function(){
  var host = window.location.hostname;
  if (host === "csgrsmoke.lsait.lsa.umich.edu"){
    $('body').prepend("<div class='bg-danger text-center'>THIS IS A DEVELOPMENT ENVIRONMENT -- THIS IS A DEVELOPMENT ENVIRONMENT -- THIS IS A DEVELOPMENT ENVIRONMENT -- THIS IS A DEVELOPMENT ENVIRONMENT </div>");
  }
	updates();
});


$("#newWriter").click( function(){
	var reg = /^[a-z]{1,8}$/;
	if (!reg.test($("#myForm :input").val())){
    alert ("!! You did not enter a uniqname here !!");
    } else {
	      $.post( "php/myFormSubmit.php", $("#myForm :input").serializeArray() );
    }
    done();
	clearInput();
});


$("#myForm").submit( function() {
	return false;
});


function clearInput(){
		$("#myForm :input").each( function() {
			$(this).val('');
		});
}


function done(){
	setTimeout( function(){
	updates();
//	done();
	}, 200);
}

function updates(){
	$.getJSON("php/myFormView.php", function(data){
	   	$("#writers").empty();
	   	$.each(data.result, function(){
	   		$("#writers").append(this['writer'] + " -- " + this['fName'] + " " + this['lName'] + "<br />");
	   	    });
	});

}

$("#reqSub").click( function(){
	window.location = 'php/reqSubmit.php';
});

$("#indDwnld").click( function(){
	window.location = 'php/SRL_IndividualOutput.php';
});

$( "#datepicker" ).datepicker({
  numberOfMonths: 2,
  showButtonPanel: true,
  dateFormat: "yy-mm-dd"
});





