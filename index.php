<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<meta name="keywords" content="Customer Relationship Management"/>
		<meta name="description" content="Spar Customer Relationship Management"/>
		<title>Smart Analyzer</title>
		<link rel="icon" href="images/s.png" type="image/x-icon">
		<link rel="stylesheet" href="css/sa-main.css">
		<link rel="stylesheet" href="css/sa-resp.css">
		<link rel="stylesheet" href="css/font-css-pt-san.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
          $("#upform #fileUpload").change(function(){
          var fileUpload = document.getElementById("fileUpload");
          var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
          if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var table = document.createElement("table");
                    var rows = e.target.result.split("\n");
                    for (var i = 0; i < rows.length; i++) {
                        var row = table.insertRow(-1);
                        var cells = rows[i].split(",");
                        for (var j = 0; j < cells.length; j++) {
                            var cell = row.insertCell(-1);
                            cell.innerHTML = cells[j];
                        }
                    }
                    //var dvCSV = document.getElementById("dvCSV");
                   // dvCSV.innerHTML = "";
                    //dvCSV.appendChild(table);
                }
                reader.readAsText(fileUpload.files[0]);
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid CSV file.");
        }
    });
});
        </script>
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
          <!--<div class="col-md-8" >
            	<div class="crm-descr">
            		<img src="images/ticket.png" />
                </div>
            </div>-->
          <div class="col-md-12" style="min-height:480px;" >
            <div class="form-audio" >
              <form id="upform" action="upload.php" method="post" enctype="multipart/form-data">
                <label>Upload CSV file* <img src="images/csv-icon.png" /></label>
                <input type="file" name="file" accept=".csv" id="fileUpload" class="form-file" required>
                <input type="submit" id="submit" name="submit" value="Submit" class="form-submit">
              </form>
              
            </div>
            <div class="container">
    			<div class="table-responsive">
       				<div id="dvCSV" class="dvCSV table"></div>
            	</div>
			    <div class="sub-middle" id="butn-block" style="display:none;">
					<input type="button" id="form-ok" value="OK" class="form-ok" />
					<input type="submit" id="form-discard" value="DISCARD"  class="form-discard" onClick="location.href ='index.html';" />
				</div>
                </div>	
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Main form Format Ends--> 