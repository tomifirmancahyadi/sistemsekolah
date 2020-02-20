/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addUserForm = $("#addDosen");
	
	var validator = addDosenForm.validate({
		
		rules:{
			
			nidn : { required : true},
			nama : { required : true },
			password : {required : true},
			fungsional : { required : true, selected : true}
			
		},
		messages:{
			
			nidn: { required : "This field is required"},
			nama : { required : "This field is required" },
			password : {required : "This field is required"},
			fungsional: {required : "This field is required"}
			
				
		}
	});
});
