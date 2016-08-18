
$(function() {
	logIn();
	createTable();
	deleteRow();
	createRow();
	editRow();
});

function logIn() {
var username, pass, result;
	
	$("#formLog").submit(function(e) {
		 
		e.preventDefault();
		
		username = $("#name").val();
		pass = $("#pass").val();
		
		$.ajax({
			method: "POST",
			url: "serverLogIn.php",
			data: {
				user: username, 
				password: pass
			},
			success: function(response) {
				result = response;
			}
		}).then(function() {
		    if (result == "true") {
		    	correctInput();
		    	username = $("#name").val("");
				pass = $("#pass").val("");
				window.location.replace("table.php");
				return;
		    }
		    
		    if (result == "false" && $("#error p").length == 1) {
		    	error();
		    }
		});
	});
}

function createTable() {
	$.ajax({
		url: "manageTable.php",
		success: function(response) {
			createTableRows(response);
		},
		async: true,
		dataType: "json"
	});
}

function deleteRow() {
	$(document).on("click", ".fa-times", function(event) {
		
		var confirmDelete = confirm("Are you sure you want to delete this row?");
		
	 	if(confirmDelete == true) {
		 	var rowIndex = $(this).closest("tr").attr("id");
		 	
		 	$.ajax({
				url: "delete.php",
				method: "POST",
				data: {index: rowIndex},
				success: function(response) {
					createTableRows(response);
				},
				dataType: "json"
			});
	 	}
	 	
	 	event.preventDefault();
	});
}

function createRow() {
	$(".fa-plus").on("click", function() {
		window.location.replace("form.php");
	});
}

function editRow() {
	$(document).on("click", ".fa-pencil", function(event) {
		window.location.replace("form.php");
	});
}