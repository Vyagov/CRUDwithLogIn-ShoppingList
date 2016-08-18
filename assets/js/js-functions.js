
function correctInput() {
	$("#error p").text("Email and password is success!")
					.css("color", "#00ee00");
	
	$("input").css({
			"border-color": "#00ee00",
			"width": "90%",
			"box-shadow": "0px 0px 10px #00ee00"
	});
	
	$("form span").removeClass("fa fa-times")
					.addClass("fa fa-check")
					.css("color", "#00ee00");
}

function error() {
	$("#error p").text("Email or password is incorrect!")
					.css("color", "#ee0000");
	
	$("input").css({
			"border-color": "#ee0000",
			"width": "90%", 
			"box-shadow": "0px 0px 10px #ee0000"
	});
	
	$("form span").addClass("fa fa-times")
					.css("color", "#ee0000");
}

function createTableRows(data)
{
	var row = '';
	var action = '<td><button class="fa fa-pencil"></button><button class="fa fa-times"></button></td>';
	$.each(data, function(index, rows) {
		var rowNum = parseInt(index) + 1;
		row += "<tr id='" + index + "'><td>" + rowNum + "</td>";
		$.each(rows, function(key, value) {
			row += "<td>" + value + "</td>";
		});
		row += action + "</tr>";
	});
		
	$("tbody").html(row);
}



