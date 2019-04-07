$(document).ready(function()
{
	
	$.ajax(
	{
		type:'POST',
		data:{},
		url:'ajax/load.php',
		success:function(result)
		{
			$("#results").html(result);
					
		}
	});
		
	$("#submit").click(function()
	{
			
		  var name = $("#name").val();
		  var surname = $("#surname").val();
		  var company = $("#company").val();
		  var email = $("#mail").val();
		  var phone = $("#telephone").val();
		  var cell = $("#cellphone").val();
		 	
			$.ajax(
			  {
				type:'POST',
				data:{name:name,surname:surname,company:company,email:email,phone:phone,cell:cell},
				url:'ajax/update.php',
				success:function(result)
				{
					$("#results").html(result);
					
					$("#name").val("");
					$("#surname").val("");
					$("#company").val("");
					$("#email").val("");
					$("#telephone").val("");
					$("#cellphone").val("");
					$("#results").html(result);
					$("#end").click();
							
				}
				
			  }); 
		
	});	
	
});

function remove(x)
{	
	try 
		{				
			var xmlhttp;

			if (window.XMLHttpRequest) 
			{
				xmlhttp = new XMLHttpRequest();
			} 
			else 
			{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			// internet explorer
			}
		
			xmlhttp.onreadystatechange = function() 
			{			
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					var strOut;			
					strOut = xmlhttp.responseText;
					document.getElementById("results").innerHTML = strOut;
				}
			}
		
			xmlhttp.open("POST", "ajax/Remove.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");			
			xmlhttp.send("id="+x);
		}
		catch(err)
		{
			alert(err);
		}
	
}