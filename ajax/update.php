<?php

if( isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["company"]) && isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && isset($_POST["phone"]) && isset($_POST["cell"]) )
{
	try 
	{
		$CONNPDO = new PDO("sqlite:../customers.db");
		$CONNPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	} 
	catch (PDOException $e) 
	{
		$CONNPDO = null;
	}
	
	if($CONNPDO != null)
	{
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$company = $_POST["company"];
		$email = $_POST["email"];
		$telephone = $_POST["phone"];
		$cellphone = $_POST["cell"];
		
		$getdata_PRST = $CONNPDO -> prepare("SELECT COUNT(id) AS number FROM Customers WHERE email = :email ");
		$getdata_PRST -> bindValue(":email",$email);
		$getdata_PRST ->execute() or die($CONNPDO -> errorInfo());
		
		while($getdata_RSLT = $getdata_PRST->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT) )
		{
			$count = $getdata_RSLT["number"];
		}
		
		if($count == 0)
		{
			$adddata_PRST = $CONNPDO -> prepare("INSERT INTO Customers(name,surname,company,email,telephone,cellphone) VALUES (:name,:surname,:company,:email,:telephone,:cellphone)");
			$adddata_PRST -> bindValue(":name",$name);
			$adddata_PRST -> bindValue(":surname",$surname);
			$adddata_PRST -> bindValue(":company",$company);
			$adddata_PRST -> bindValue(":email",$email);
			$adddata_PRST -> bindValue(":telephone",$telephone);
			$adddata_PRST -> bindValue(":cellphone",$cellphone);
			$adddata_PRST -> execute() or die($CONNPDO -> errorInfo());
			
			$response = "<table class='table table-striped'><tr><th>Name</th><th>Surname</th><th>Company</th><th>E-Mail</th><th>Telephone</th><th>Cellphone</th><th>&nbsp;</th></tr>";
		
		
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
	else
	{
		echo "Connectivity error!";
	}

}
else
{
	echo "Please insert legit credentials or refresh the page!";
}


?>