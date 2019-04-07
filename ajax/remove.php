<?php
if(isset($_POST["id"]))
{
	$id = $_POST["id"]; 
	
	try
	{
		$CONNPDO = new PDO("sqlite:../customers.db");
		$CONNPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		$CONNPDO != null;
	}
	
	if($CONNPDO != null)
	{
		$getdata_PRST=$CONNPDO->prepare("DELETE FROM Customers WHERE id=:id");
		$getdata_PRST->bindValue(":id",$id);
		$getdata_PRST->execute() or die($CONNPDO->errorInfo());
		
		$getdata_PRST = $CONNPDO->prepare("SELECT * FROM Customers");
		$getdata_PRST -> execute() or die($CONNPDO->errorInfo());
			
			$response = "<table class='table table-striped'><tr><th>Name</th><th>Surname</th><th>Company</th><th>E-Mail</th><th>Telephone</th><th>Cellphone</th><th>&nbsp;</th></tr>";
			
			while($getdata_RSLT = $getdata_PRST->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT))
			{
				$getdata_PRST = $CONNPDO -> prepare("SELECT * FROM Customers");
			$getdata_PRST -> execute() or die($CONNPDO -> errorInfo());
			
			while($getdata_RSLT = $getdata_PRST -> fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT))
			{
				$id = $getdata_RSLT["id"];
				$name = $getdata_RSLT["name"];
				$surname = $getdata_RSLT["surname"];
				$company = $getdata_RSLT["company"];
				$email = $getdata_RSLT["email"];
				$telephone = $getdata_RSLT["telephone"];
				$cellphone = $getdata_RSLT["cellphone"];
				
				$response .="<tr><td>$name</td><td>$surname</td><td>$company</td><td>$email</td><td>$telephone</td><td>$cellphone</td><td><button class='btn btn-danger' onclick='remove($id)'>Delete Entry!</button></td></tr>";
				
			}
			
			$response .= "</table>";
			echo $response;	
		}
}
	


}

?>