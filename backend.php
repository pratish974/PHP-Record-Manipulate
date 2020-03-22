<?php

include"conn.php";
extract($_POST);

if(isset($_POST['readrecords'])){

	$data =  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
							<th>No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email Address</th>
							<th>English </th>
							<th>Maths </th> 
							<th>science</th> 
							<th>Edit Action</th>
							<th>Delete Action</th>
						</tr>'; 

	$displayquery = " SELECT * FROM `data` "; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr>  
				<td>'.$number.'</td>
				<td>'.$row['firstname'].'</td>
				<td>'.$row['lastname'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['english'].'</td>
				<td>'.$row['maths'].'</td>
				<td>'.$row['science'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-success">Edit</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;

}


//adding records in database
if(isset($_POST['fname']) &&  isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['english']) && isset($_POST['maths']) && isset($_POST['science']) )
	{
		$query = " INSERT INTO `data` VALUES(' ','$fname', '$lname', '$email', '$english' , '$maths', '$science')   ";

		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}


	}
	
// pass id on modal
if( isset($_POST['action']) && $_POST['action']== 'getuserdetails' && isset($_POST['id']) && isset($_POST['id']) != "")
{
    $user_id = $_POST['id'];
    $query = "SELECT * FROM data WHERE id = '$user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
    
    //$response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {       
            $response = array('email'=>$row['email'],'firstname'=>$row['firstname'],'lastname'=>$row['lastname'],'email'=>$row['email'],'english'=>$row['english'],'maths'=>$row['maths'],'science'=>$row['science']);
        }
    }
   else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
   //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode(): 
	echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}


	



//////////////// update table//////////////

if(isset($_POST['hidden_user_id']))
{
    // get values
    $hidden_user_id = $_POST['hidden_user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $english = $_POST['english'];
	$maths = $_POST['maths'];
	$science = $_POST['science'];
    $query = "UPDATE data SET firstname = '$firstname', lastname = '$lastname', email = '$email', english = '$english' , maths = '$maths' , science = '$science'  WHERE id = '$hidden_user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
}
/////////////Delete user record /////////

if(isset($_POST['deleteid']))
{

	$user_id = $_POST['deleteid']; 

	$deletequery = " delete from data where id ='$user_id' ";
	if (!$result = mysqli_query($conn,$deletequery)) {
        exit(mysqli_error());

}

}


//adding records

extract($_POST);

if(isset($_POST['readrecord'])){

	$data =  '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email Address</th>
							<th>english </th> 
							<th>maths </th> 
							<th>science </th> 
							
							<th>Edit Action</th>
							<th>Delete Action</th>
						</tr>'; 

	$displayquery = " SELECT * FROM `data` "; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr>  
				<td>'.$number.'</td>
				<td>'.$row['firstname'].'</td>
				<td>'.$row['lastname'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['english'].'</td>
				<td>'.$row['maths'].'</td>
				<td>'.$row['science'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;

}



///delete user record

if(isset($_POST['deleteid'])){

	$userid= $_POST['deleteid'];
	$deletequery = " delete from data where id='$userid' ";
	mysqli_query($conn,$deletequery);
}


/// get userid for update
if(isset($_POST['action']) && $_POST['action']== 'updateuserdetails' && isset($_POST['id']) && isset($_POST['id']) != "")	
{
    $user_id = $_POST['id'];
    $query = "SELECT * FROM data WHERE id = '$user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
    
    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            $response = $row;
        }
    }else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
  //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode(): 
	echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}


///update table

if(isset($_POST['hidden_user_idupd'])){

	$hidden_user_idupd = $_POST['hidden_user_idupd'];
	$firstnameupd = $_POST['firstnameupd'];
	$lastnameupd = $_POST['lastnameupd'];
    $emailupd = $_POST['emailupd'];
    $english = $_POST['english'];
	$maths = $_POST['maths'];
	$science = $_POST['science'];

    $query = " UPDATE `data` SET `firstname`='$firstnameupd',`lastname`='$lastnameupd',`email`='$emailupd',`english`='$english' ,`maths`='$maths' ,`science`='$science' WHERE id= '$hidden_user_idupd' ";
     if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
}


?>
