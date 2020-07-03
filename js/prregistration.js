
  var typed = $(".typed");

  $(function() {
    typed.typed({
      strings: ["TOUCHLESS PAY"],
      typeSpeed: 100,
      loop: true,
    });
  });

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new-product").click(function(){
		
		var index = $("table tbody tr:last-child").index();
		var row = '<tr>' +
		
            
            '<td><input type="text" class="form-control" name="productname[]"></td>' +
            '<td><input type="text" class="form-control" name="amount[]"></td>' + '   <td style="text-align: center;"><input type="checkbox" value="1" name="taxable[]"/></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new-product").removeAttr("disabled");
    });
});

