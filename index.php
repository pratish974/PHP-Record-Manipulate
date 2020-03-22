<?php
include"conn.php";
extract($_POST);


if(isset($submit)){
	
	//echo "User Type : " . $fname. "\n";die;
	if(!empty($fname)&&
	!empty($lname)&&
	!empty($email)&&
	!empty($english)&&
	!empty($maths)&&
	!empty($science)){
	
		
		$sql= "INSERT INTO `data` VALUES(' ','$fname','$lname','$email','$english','$maths','$science')";
		
		if ($conn->query($sql) == TRUE) {
			//echo "<script type='text/javascript'>alert('New record created successfully')</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	}
	
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Eater" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Unicase" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


  
  
</head>
<body>

<div class="container">
	


	<div >
		<h2 style="color: #062f4f; font-family: 'Cormorant Unicase', serif;" class="font-weight-bold mb-4"> All Records </h2>
		<button type="button" class="btn btn-success " data-toggle="modal" data-target="#addDataModal"> <span class="glyphicon glyphicon-list-alt"></span> Add Record</button>
		 
		<div id="records_content">	</div>
		<p id = "dataa"></p>
		<button type="button" class="btn btn-success check" id= "check" >Check</button>
		
		<canvas id="pieChart" style="position: relative; height:40vh; width:200vw"></canvas>
		<canvas id="barChart" style="position: relative; height:40vh; width:200vw"></canvas>
		<canvas id="lineChart" style="position: relative; height:40vh; width:200vw"></canvas>
		<canvas id="lineChartOne" style="position: relative; height:40vh; width:200vw"></canvas>
	

 <!-- The Data adding Modal -->
  <div class="modal" id="addDataModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="index.php" method = "POST" id="add_form">
			  <div class="form-group">
				<label for="first Name">First Name</label>
				<input type="text" class="form-control" name = "fname" id="fname" placeholder="Alex" required>
			  </div> 
			  <div class="form-group">
				<label for="lastName">Last Name</label>
				<input type="text" class="form-control" id="lname" name ="lname" placeholder="Lunatic" required>
			  </div>
			 
			  <div class="form-group">
				<label for="exampleFormControlInput1">Email address</label>
				<input type="email" class="form-control" id="email" name = "email" required">
			  </div>
			  <div class="form-group">
				<label for="lastName">English</label>
				<input type="number" class="form-control" id="english" name ="english" min="1" max="100" required">
			  </div>
			  <div class="form-group">
				<label for="lastName">Maths</label>
				<input type="number" class="form-control" id="maths" name ="maths" min="1" max="100" required">
			  </div>
			  <div class="form-group">
				<label for="lastName">Science</label>
				<input type="number" class="form-control" id="science" name ="science" min="1" max="100" required">
			  </div>
			 
			  <button type="submit"  name = "submit" class="btn btn-primary">Submit</button>
			  <button type="reset" class="btn btn-danger">Reset</button>
			</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

			
		<!-- //////////////// after update ////////////////// -->


		<div class="modal fade" id="update_user_modal">
		  <div class="modal-dialog">
			<div class="modal-content">

			  <!-- Modal Header -->
			  <div class="modal-header">
				<h4 class="modal-title">Modal Heading</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>

			  <!-- Modal body -->
			  <div class="modal-body">
			   
					<div class="form-group">
					<label> User Name </label>
					<input type="text" name="firstname" id="update_firstname"  placeholder="First Name" class="form-control">
				</div>

				<div class="form-group">
					<label> Last Name </label>
					<input type="text" name="lastname" id="update_lastname" placeholder="Last Name" class="form-control">
				</div> 

				<div class="form-group">
					<label> Email Id </label>
					<input type="text" name="email" id="update_email" placeholder="Email Id" class="form-control">
				</div>

				<div class="form-group">
					<label> English. </label>
					<input type="text" name="english" id="update_english" placeholder="enlish." class="form-control">
				</div>
				<div class="form-group">
					<label> Maths. </label>
					<input type="text" name="maths" id="update_maths" placeholder="Maths." class="form-control">
				</div>
				<div class="form-group">
					<label> Science. </label>
					<input type="text" name="science" id="update_science" placeholder="Science." class="form-control">
				</div>



			  </div>

			  <!-- Modal footer -->
			 <div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Update</button>
							<input type="hidden" id="hidden_user_id">
			 </div>



			</div>
			
		  </div>
		  
		</div>
  
	
	</div>
  

</div>


 

<?php
	$englishNames = array();
	$englishData = array();
	$mathsNames = array();
	$mathsData = array();
	$scienceNames = array();
	$scienceData = array();
	$checkEnglish = "";
	$checkMaths = "";
	$checkScience ="";
	$oneData = array();
	$oneNames = array();
	
	
	$englishquery = "SELECT firstname,english FROM data " ;
	$mathsquery = "SELECT  firstname,maths FROM data " ;
	$sciencequery = "SELECT firstname,science FROM data " ;
	$onequery = "SELECT * FROM data where firstname = 'Pratish' " ;
	
	$checkEnglishQuery = "SELECT firstname,english FROM data where english >=60" ;
	$checkMathsQuery = "SELECT  firstname,maths FROM data where maths >= 40" ;
	$checkScienceSuery = "SELECT firstname,science FROM data where science >= 50" ;
	
	
	$checkEnglishResult = $conn->query($checkEnglishQuery);

			if ($checkEnglishResult->num_rows > 0) {
			// output data of each row
			while($row = $checkEnglishResult->fetch_assoc()) {
	
			$checkEnglish .= $row['firstname'];
			
			}
			
			//echo $checkEnglish;
		}
		
		$checkMathsResult = $conn->query($checkMathsQuery);

			if ($checkMathsResult->num_rows > 0) {
			// output data of each row
			while($row = $checkMathsResult->fetch_assoc()) {
	
			$checkMaths .= $row['firstname'];
			
			}
			
			//echo $checkEnglish;
		}
		
		
		$checkScienceResult = $conn->query($checkScienceSuery);

			if ($checkScienceResult->num_rows > 0) {
			// output data of each row
			while($row = $checkScienceResult->fetch_assoc()) {
	
			$checkScience .= $row['firstname'];
			
			}
			
			//echo $checkEnglish;
		}
		
		
		

	
		
		
	
	$englishResult = $conn->query($englishquery);

			if ($englishResult->num_rows > 0) {
			// output data of each row
			while($row = $englishResult->fetch_assoc()) {
	
			$englishNames[] = $row['firstname'];
			$englishData [] =  $row['english'];
			}
			
			
			$resultEName = "'" . implode ( "', '", $englishNames ) . "'";
			
			$resultEData = "" . implode ( ", ", $englishData ) . "";
			
			
			
		}
		
		$mathsResult = mysqli_query($conn,$mathsquery);

		if(mysqli_num_rows($mathsResult) > 0){

			
			while ($row = mysqli_fetch_array($mathsResult)) {
				
				$mathsNames[] = $row['firstname'];
				$mathsData[] = $row['maths'];
				//echo $mathsNames;
				$resultMName = "'" . implode ( "', '", $mathsNames ) . "'";
			
				$resultMData = "" . implode ( ", ", $mathsData ) . "";
				
				 }
				
			}
		$scienceResult = mysqli_query($conn,$sciencequery);

		if(mysqli_num_rows($scienceResult) > 0){

			
			while ($row = mysqli_fetch_array($scienceResult)) {
				
				$scienceNames[] = $row['firstname'];
				$scienceData[] = $row['science'];
				//echo $data;
				$resultSName = "'" . implode ( "', '", $mathsNames ) . "'";
				
			
				$resultSData = "" . implode ( ", ", $mathsData ) . "";
				
				 }
				
			}
			
			
			
		$oneResult = mysqli_query($conn,$onequery);

		if(mysqli_num_rows($oneResult) > 0){

			
			while ($row = mysqli_fetch_array($oneResult)) {
				
				$oneNames[] = $row['firstname'];
				$oneData[] = $row['english'];
				$oneData[] = $row['maths'];
				$oneData[] = $row['science'];
				
				//$oneName = ;
				
			
				$oneData = "" . implode ( ", ", $oneData ) . "";
				echo $oneNames[0];
				echo $oneData;
				
				 }
				
			}
			
			

		
			
?>
		


<script>
	
$(document).ready(function () {
    readRecords(); 
	});

	

//////////////////Display Records
	function readRecords(){
		
		var readrecords = "readrecords";
		$.ajax({
			url:"backend.php",
			type:"POST",
			data:{readrecords:readrecords},
			success:function(data,status){
				$('#records_content').html(data);
			},

		});
	}


function GetUserDetails(id){
	  $("#hidden_user_id").val(id);
	  $.post("backend.php", {
            id: id
			
        },
        function (data, status) {
            alert(data);
            //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
            var user = JSON.parse(data);
            alert(user);

            $("#update_firstname").val(user.firstname);
            $("#update_lastname").val(user.lastname);
            $("#update_email").val(user.email);
            $("#update_english").val(user.english);
			$("#update_maths").val(user.maths);
			$("#update_science").val(user.science);
        }
    );
    $("#update_user_modal").modal("show");
}

/////////////delete userdetails ////////////
function DeleteUser(deleteid){

	var conf = confirm("are u sure");
	if(conf == true) {
	$.ajax({
		url:"backend.php",
		type:'POST',
		data: {  deleteid : deleteid},

		success:function(data, status){
			readRecords();
		}
	});
	}
}




function GetUserDetails(id){
		$("#hidden_user_id").val(id);
		$.post("backend.php", {
				action:'getuserdetails',
				id: id
		},
		function (data, status) {
			
			//JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
			var user = JSON.parse(data);
			$("#update_firstname").val(user.firstname);
			$("#update_lastname").val(user.lastname);
			$("#update_email").val(user.email);
			$("#update_english").val(user.english);
			$("#update_maths").val(user.maths);
			$("#update_science").val(user.science);
		}
    );
    $("#update_user_modal").modal("show");
}




function UpdateUserDetails() {
    
	var firstname = $("#update_firstname").val();
    var lastname = $("#update_lastname").val();
    var email = $("#update_email").val();
    var english = $("#update_english").val();
	var maths = $("#update_maths").val();
	var science = $("#update_science").val();
    var hidden_user_id = $("#hidden_user_id").val();
    $.post("backend.php", {
            hidden_user_id: hidden_user_id,
            firstname: firstname,
            lastname: lastname,
            email: email,
            english: english,
			maths: maths,
			science: science
        },
        function (data, status) {
            $("#update_user_modal").modal("hide");
            readRecords();
        }
    );
}
</script>

<script>

$('#check').on('click',function (e){       
  
   $.ajax({
   type:'POST',
   url :'index.php',
  
   success: function(data) {
	   
	   var str = ("Student having marks more than 60% in English <?php echo $checkEnglish;?> <br>"
	   + "Student having marks more than 60% in Maths <?php echo $checkMaths;?> <br>" +
	   "Student having marks more than 50% in science <?php echo $checkScience;?> <br>");
		$( "p" ).html( str );
	  
	   
	   
	   
	   var piectx = document.getElementById('pieChart').getContext('2d');
		var chart = new Chart(piectx, {
			// The type of chart we want to create
			type: 'doughnut',

			// The data for our dataset
			data: {
				labels: [<?php echo $resultEName;?>],
				datasets: [{
					label: 'My English Dataset',
					//backgroundColor: 'rgb(255, 99, 132)',
						backgroundColor: [
                'rgba(255, 0, 0, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
						
					borderColor: [
                'rgba(255, 0, 0, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
					data: [<?php echo $resultEData;?>]
				}]
			},

			// Configuration options go here
			options: {
				
				responsive: true
			}
		});
		
		var barctx = document.getElementById('barChart').getContext('2d');
		var chart = new Chart(barctx, {
			// The type of chart we want to create
			type: 'bar',

			// The data for our dataset
			data: {
				labels: [<?php echo $resultMName; ?>],
				datasets: [{
					label: 'My Maths dataset',
					//backgroundColor: 'rgb(255, 99, 132)',
						backgroundColor: [
                'rgba(255, 0, 0, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
						
					borderColor: [
                'rgba(255, 0, 0, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
					data: [<?php echo $resultMData;?>]
				}]
			},

			// Configuration options go here
			options: {
				
				responsive: true
			}
		});
		
		var linectx = document.getElementById('lineChart').getContext('2d');
		var chart = new Chart(linectx, {
			// The type of chart we want to create
			type: 'line',

			// The data for our dataset
			data: {
				labels: [<?php echo $resultSName; ?>],
				datasets: [{
					label: 'My Science dataset',
					//backgroundColor: 'rgb(255, 99, 132)',
						backgroundColor: [
                'rgba(255, 0, 0, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
						
					borderColor: [
                'rgba(255, 0, 0, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
					data: [<?php echo $resultSData; ?>]
				}]
			},

			// Configuration options go here
			options: {
				
				responsive: true
			}
		});
		
		
	   
	   
	   
	    },
   error:function(exception){alert('Exeption:'+exception);}
}); 
 e.preventDefault();
});

</script>



	
</body>
</html>
