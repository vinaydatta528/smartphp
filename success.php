<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/sa-main.css">
	<link rel="stylesheet" href="css/sa-resp.css">
	<link rel="stylesheet" href="css/font-css-pt-san.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="maskms"></div>
<div class="backToTop"></div>
<!--Header Format Starts-->
<div class="header-crm">
  <div class="menu-crm">
    <div class="menu-crm-sub">
      <div class="spar_logo">
        <div class="logo"><a href="index.php"><img src="images/s.png"></a></div>
        <a href="index.php" style="text-decoration:none;"><span>SPAR</span> Smart Analyzer</a></div>
      <div style="clear:both;"></div>
    </div>
  </div>
  <div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>
<!--Header Format Ends--> 
<!--Main form Format Starts-->
<div class="crm-form">
  <div class="crm-form-sub">
    <div class="box-1">
      <a href="index.php" style="text-decoration:none;"><div class="form-img"><img src="images/form-icon.png" /></div>
      <div class="form-text">Smart Analyzer</div></a>
    </div>
    <div class="container-fluid">
		  <div class="form-sub">
			<div class="row"> 
			<?php
			 $namel = $_POST['nfile'];
			?>
			</div>
		 </div>
	</div>

	<div class="container">
		<div class="table-responsive">
			<div id="employee_table"></div>
			<div align="center">
				 <form id="upform" action="success.php" method="post" enctype="multipart/form-data">
				 <button type="button" name="load_data" id="load_data" class="btn btn-primary">Ok</button>     
				</form>
			</div>
		</div>
	</div>
  </div>
  </div>
  <!--Footer Format-->
<div style="clear:both;margin-top:20px;"></div>
<div class="footer-crm" >
  <div class="footer-crm-sub">
    <div class="foot-text1">2018 Developed by <span> SPAR</span> Information Systems LLC </div>
    <div class="foot-text2">Powered by <span>Sparinfosys</span></div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	  $.ajax({
	   url:"uploads/<?php echo $namel; ?>",
	   dataType:"text",
	   success:function(data)
	   {
		var employee_data = data.split(/\r?\n|\r/);
		var table_data = '<table class="table table-bordered table-hover"><tbody>';

		for(var count = 0; count<employee_data.length; count++)
		{
		 var cell_data = employee_data[count].split(",");
		 table_data += '<tr>';
		 for(var cell_count=0; cell_count<cell_data.length; cell_count++)
		 {
		  if(count >= 0)
		  {
		   table_data += '<td>'+cell_data[cell_count]+'</td>';
		  }
		  else
		  {
		   table_data += '<td>'+cell_data[cell_count]+'</td>';
		  }
		 }
		 table_data += '</tr>';
		}
		table_data += '</tbody></table>';
		
		$('#employee_table').html(table_data);
		$("#employee_table table").attr("id", "table-draggable");
		$("#employee_table table tbody").addClass("connectedSortable");
		var $tabs=$('#table-draggable')
			$( "tbody.connectedSortable" )
						.sortable({
								connectWith: ".connectedSortable",
								items: "> tr:first-child td",
								appendTo: $tabs,
								helper:"clone",
								zIndex: 999990
								})
						.disableSelection();
		
						var $tab_items = $( ".nav-tabs > li", $tabs ).droppable({
							 accept: ".connectedSortable tr",
							 hoverClass: "ui-state-hover",
								   drop: function( event, ui ) {
									return false;
								  }
								});
							}
	});
	$(".table").attr("id", "table-draggable");
	$('#load_data').click(function(){	
		$("#employee_table table").removeAttr("id");
		$("#employee_table table").removeClass("table-hover");
		$("#employee_table table tbody").removeClass("connectedSortable");
		$("#employee_table table tbody").removeClass("ui-sortable");
		$("#employee_table table td").removeClass("ui-sortable-handle");
		$("#load_data").css("display","none");
	});	
	});
	</script>

