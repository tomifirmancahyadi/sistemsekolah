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
	
	var addLaporanForm = $("#addLaporan");
	
	var validator = adaLaporanForm.validate({
		
		rules:{
			tanggal :{ required : true },
			nidn : { required : true},
			skema : { required : true },
			jml_dana : {required : true },
			sdh_unggah: { required : true },
			blm_unggah : { required : true},
			keterangan : { required : true}
		},
		messages:{
			tanggal :{ required : "This field is required" },
			nidn: { required : "This field is required"},
			skema : { required : "This field is required" },
			jml_dana : {required : "This field is required"},
			sdh_unggah: {required : "This field is required"},
			blm_unggah: {required : "This field is required"},
			keterangan : {required : "This field is required"}
				
		}
	});
});
