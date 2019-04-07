<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="jquery-3.3.1.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css">
<script type="text/javascript" src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="ajax/modalform.js"></script>
</head>
<body>
<center>
<div class="container">
<h3 style="color:red;">
Check your Clients List
</h3>
<br>
<hr>
<br>
</div>
<div class="container">
<span style="float:left;"><br><br><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">+ Insert New Client</button></span>
<span id="results" style="float:right;overflow-x:auto;overflow-y:auto;width:800px;height:500px;word-wrap:break-word;"></span>
</div>
<!--Modal Part-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button id="end" type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:red;">Add a new client</h3>
        </div>
        <div class="modal-body">
			<center>
            <table>
			<tr><td>Name:</td><td><input type="text" id="name" class="form-control" style="width:200px;"></td></tr>
			<tr><td>Surname:</td><td><input type="text" id="surname" class="form-control" style="width:200px;"></td></tr>
			<tr><td>Company/Corporation:</td><td><input type="text" id="company" class="form-control" style="width:200px;"></td></tr>
			<tr><td>E-mail:</td><td><input type="text" id="mail" class="form-control" style="width:200px;"></td></tr>
			<tr><td>Tel Number:</td><td><input type="text" id="telephone" class="form-control" style="width:200px;"></td></tr>
			<tr><td>Cell Number:</td><td><input type="text" id="cellphone" class="form-control" style="width:200px;"></td></tr>
			</table>
			<br>
			</center>
		<div class="modal-footer"><centeR><button class="btn btn-primary" id="submit">Submit New Client!</button></center></div>
		</div>	
      </div>
      </div>	  
</div>
<!--modal end-->	  
</center>
</body>
</html>