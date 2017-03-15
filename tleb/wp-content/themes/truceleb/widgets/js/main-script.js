jQuery.noConflict();
jQuery(document).ready(function(){
	jQuery(document).on("change",".sidecategory", function(){
		var sval = jQuery(this).val();
		var current = jQuery('.prevd').val();
		if(sval	!== "all"){
			var separator = sval.split("_");
			if(confirm('Are you sure selected this category?')){
				jQuery(".cattitle").val(separator[1]);
				jQuery('.prevd').val(sval);
			}else{
				jQuery(this).val(current);
			}
		return false;
		}else{
			if(confirm('Are you sure selected this category?')){
				jQuery(".cattitle").val("Title");
				jQuery('.prevd').val(sval);
			}else{
				jQuery(this).val(current);
			}
		return false;
		}
	});
	
	jQuery(document).on("change",".featcategory", function(){
		var fsval = jQuery(this).val();
		var fscurrent = jQuery('.dprev').val();
		if(fsval	!== "all"){
			var separator = fsval.split("_");
			if(confirm('Are you sure selected this category?')){
				jQuery(".fcattitle").val(separator[1]);
				jQuery('.dprev').val(fsval);
			}else{
				jQuery(this).val(fscurrent);
			}
		return false;
		}else{
			if(confirm('Are you sure selected this category?')){
				jQuery(".fcattitle").val("Title");
				jQuery('.dprev').val(fsval);
			}else{
				jQuery(this).val(fscurrent);
			}
		return false;
		}
	});
});