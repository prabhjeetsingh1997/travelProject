$(function () {
	$("#massDelete").click(function() {
	    var checked = $("input:checkbox[name=mass_delete]:checked").length > 0;
	    if (!checked){
	        alert("Please check at least one checkbox");
	        return false;
	    }

	    var result = confirm("Are you sure to delete?");
    	if(result){
	    	var base_url = $("#baseurl").val();
	       	var selected = new Array();
	        $("input:checkbox[name=mass_delete]:checked").each(function(){
	          	selected.push($(this).val());
	        });
	        $.ajax({
	          	type:"POST",
              	url:base_url+'/deleteMassClient',
              	data:{ids:selected},    // multiple data sent using ajax
              	beforeSend:function() {
                	$("#custom-loader").css("display","block");
              	},
              	success: function(html)
              	{	
                	if(html == 1)
                	{
                  		swal("Good job!", "Query is Deleted Succesfully","success").then( () => {
                      		location.reload();
                  		})
                	}
                	else
                	{
                  		swal("Oops!", "There is something problem!","error").then( () => {
                      		location.reload();
                  		})
                	}
              	},
              	complete: function() {
                	$("#custom-loader").css("display","none");
              	}
        	});
    	}else{
        	return false;
    	}
	});

    $("#ckbCheckAll").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });

    $(document).on('click',".advanceSearch",function(){
        $("#advanceSearchPopup").modal();
    });

    $("#advanceSearchSumbit").click(function() {
        if ($("#ad_name").val() == '' && $("#ad_email").val() == '' && $("#ad_number").val() == '' && $("#ad_organization").val() == '') {
            swal("Oops!", "Please Select atleast one field to search!","error").then( () => {
                return false;
            });
        }else{
            var base_url = $("#base_url").val();
            $.ajax({
            type:"POST",
                url:base_url+'/advanceClientSearch',
                data:$("#advanceSearchForm").serialize(),    // multiple data sent using ajax
                beforeSend:function() {
                    $("#custom-loader").css("display","block");
                },
                success: function(html)
                {   
                    $("#advancetable").html(html);
                    $("#advanceSearchPopup").modal('hide');
                },
                complete: function() {
                    $("#custom-loader").css("display","none");
                }
            });
        }
    });
});