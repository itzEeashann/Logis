<?php
	include('conn.php'); 
	if (isset($_POST['finish'])){
		$id = $_POST['id'];
		$sql = "UPDATE booking SET status='finish' WHERE id = '$id'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Ride Finished');
					window.open('home-rider-female.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Ride Not Finished');
			</script>";
		}
	}
	
 ?>