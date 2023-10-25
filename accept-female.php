<?php
	include('conn.php'); 
	if (isset($_POST['ongoing'])){
		$id = $_POST['id'];
		$ridername = $_POST['ridername'];
		$sql = "UPDATE booking SET status='ongoing', ridername='$ridername' WHERE id='$id'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Ride Accepted');
					window.open('home-rider-female.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Ride Not Accepted');
			</script>";
		}
	}
 ?>