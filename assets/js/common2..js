/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteLaporan", function(){
		var userId = $(this).data("id_laporan"),
			hitURL = baseURL + "deleteLaporan",
			currentRow = $(this);
		
		var confirmation = confirm("Apakah kamu yakin hapus data ini ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id_laporan : id_laporan } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Data berhasil dihapus"); }
				else if(data.status = false) { alert("Data gagal dihapus"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
