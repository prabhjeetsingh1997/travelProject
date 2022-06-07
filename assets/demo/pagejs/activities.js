$(function () {

})

function addMoreRows() {
	var count = $("#count_row").val();
	count = parseInt(count) + 1;
	$("#child_rows").append('<div data-row-span="5" id="child_price_row_'+count+'"><div data-field-span="1">\
		  <label>Per Child Cost(From Age)</label>\
		  	<Select class="form-control" id="from_age_'+count+'" name="from_age_'+count+'" required="true">\
			    <option value="">--Select Age --</option>\
			    <option value="1">1</option>\
			    <option value="2">2</option>\
			    <option value="3">3</option>\
			    <option value="4">4</option>\
			    <option value="5">5</option>\
			    <option value="6">6</option>\
			    <option value="7">7</option>\
			    <option value="8">8</option>\
			    <option value="9">9</option>\
			    <option value="10">10</option>\
			    <option value="11">11</option>\
			    <option value="12">12</option>\
		  	</Select>\
		</div>\
		<div data-field-span="1">\
		<label>To Age</label>\
		  	<Select class="form-control" id="to_age_'+count+'" name="to_age_'+count+'" required="true">\
			   	<option value="">--Select Age --</option>\
			    <option value="1">1</option>\
			    <option value="2">2</option>\
			    <option value="3">3</option>\
			    <option value="4">4</option>\
			    <option value="5">5</option>\
			    <option value="6">6</option>\
			    <option value="7">7</option>\
			    <option value="8">8</option>\
			    <option value="9">9</option>\
			    <option value="10">10</option>\
			    <option value="11">11</option>\
			    <option value="12">12</option>\
		  	</Select>\
		</div>\
		<div data-field-span="2">\
		<label>Price</label>\
		  <input type="number" class="form-control" id="child_price_'+count+'" name="child_price_'+count+'" required="true">\
		</div></div></div>');

	$("#count_row").val(count);

}

function deleteRows(argument) {
	var count = $("#count_row").val();
	if (parseInt(count) == 1) {
		swal("Oops!!", "Cant Delete First Row!", "error");
		return false;
	}else{
		$("#child_price_row_"+count).remove();
		count = parseInt(count) - 1;
		$("#count_row").val(count);
	}
}