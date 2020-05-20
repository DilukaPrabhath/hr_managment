
//add settlement Table items 
$(document).ready(function(){
    $('#sttlplus').on('click', function(){
    var invsno = $('#invsno').val();
    var dscrp = $('#dscrp').val();
    var amount = $('#amount').val();
    if(invsno!='' && dscrp!='' && amount!=''){
        $('#stlmdata').append(
            "<tr>"+
            "<td> <input type='hidden' value='"+invsno+"' name='invno[]'>"+invsno+"</td>"+
            "<td> <input type='hidden' value='"+dscrp+"' name='descp[]'>"+dscrp+"</td>"+
            "<td> <input type='hidden' value='"+amount+"' name='amount[]'>"+amount+"</td>"+
            "<td><button type='button' class='btn btn-danger btn-sm del' id='cloase'><i class='fas fa-times'></i></button></td>"+
            "</tr>"
        )}
        $('#invsno').val('');
        $('#dscrp').val('');
        $('#amount').val('');
    });
});

//remove settelement items
$("#stlmdata").on("click", "#cloase", function(){
    var tr= $(this).closest('tr');
    tr.remove();
 });

 //Press enter key focus next element
$(document).ready(function(){
	$('input,textarea,select').not($(":button")).keypress(function(evt){
		if(evt.keyCode==13){
			iname=$(this).val();
			if(iname!=='Submit'){
				var fields=$(this).parents('form:eq(0),body').find('input:visible:not([disabled],[readonly]),textarea,select:visible:not([disabled],[readonly])');
				var index=fields.index(this);
				if(index>-1 && (index+1)<fields.length){
					fields.eq(index+1).focus();
				}
				return false;
			}
		}
	});
});

// password double click
$(document).ready(function() { 
	$("#passed").dblclick(function() { 
		$("#passed").attr("readonly", false); 
	}); 
}); 

// conform password double click
$(document).ready(function() { 
	$("#comfrm").dblclick(function() { 
		$("#comfrm").attr("readonly", false); 
	}); 
}); 


//Numeric value validation
$(document).ready(function(){
	$('#cost, #amount').keydown(function(event){
		// Allow: backspace, delete, tab, escape, decimal and enter
		if(event.keyCode==46 || event.keyCode==8 || event.keyCode==9 || event.keyCode==27 || event.keyCode==13 || event.keyCode==190 || event.keyCode==110 ||
			// Allow: Ctrl+A
			(event.keyCode==65 && event.ctrlKey===true) || 
			// Allow: home, end, left, right
			(event.keyCode>=35 && event.keyCode<=39)){
			// let it happen, don't do anything
			return;
		}else{
			// Ensure that it is a number and stop the keypress
			if(event.shiftKey || (event.keyCode<48 || event.keyCode>57) && (event.keyCode<96 || event.keyCode>105)){event.preventDefault();}
		}
	});
});