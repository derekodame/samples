
<script type="text/javascript" src="../javascript/jquery-1.11.3.min.js"></script>
<?php 
include("connection.php");

function clientAll($con){
$query = mysqli_query($con,"SELECT * FROM client order by date DESC");
//echo "<table id='cliental' class='t'> <tr><td><center>id</center></td> <td><center>first</center></td><td><center>last</center></td><td><center>email</center></td><td><center>date  </center></td><td title=''>A/D</td> </tr></table>";

echo "<table id='cliental' >";
while($row=mysqli_fetch_array($query)){
	
	$first= $row['firstname'];
	$last= $row['lastname'];
	$email= $row['email'];
	$date= $row['date'];
	$id= $row['id'];
	$lenE = ucfirst(substr($email, 0, 23));
	
	
echo " <tr><td><a href='#'>$id</a></td> <td>$first</td><td>$last</td><td title='$email'>$lenE</td><td title='$date'>$date </td><td title=''>Activate/Deactivate</td> </tr>";
	
	}
	echo "</table>";
	}

function pagination($con){
	
	$queryt = mysqli_query($con, "select * from groupp order by id DESC ");

$num =mysqli_num_rows($queryt);
$div = ($num/25);
$p= ceil($div);
$pp= ceil($div)-1;


//javascript for next/preview
echo"<script type='text/javascript'>



	function tn(){
	var o =$('#hidden').text();
	
	if(o>=$pp){
		$('#nextt').hide(); 
			//document.getElementById('nextt').disabled=true;
		}}

function tp(){
	var o =$('#hidden').text();
	
	if(o<=$p){
		$('#nextt').show();
//document.getElementById('nextt').disabled=false;
		}
	
	
	
	}


$('#'+$b).click(function(){
	
	alert($b);
	
	});
</script>";

//pagination	

$b =1;

echo "<script  type='text/javascript'>

</script>";
for($b; $b<=$p; $b++){
	

	
	echo "<button id='$b' href='$cc'  onClick='pag($b);'  style=''>$b</button>";
	
 $pd = $p+1;
	echo"<script type='text/javascript'>
	
	
	
	
	$('#'+$b).click(function(){
		var cc =$('#'+$b).text();
		
		
		if($b==$p||$b==$pd){
		$('#nextt').hide();
		}else {
			$('#nextt').show();
		}
		 
			
		});
		
		$('#page2').click(function(){
		
		$('#nextt').hide();
		
		 });
		
		
	</script>";
	
	//page2 display
	if($p>35){
		echo"<script type='text/javascript'>
	document.getElementById('left_p').style.display = 'block';


	</script>";
	}else{
		echo"<script type='text/javascript'>
	document.getElementById('left_p').style.display = 'none';
		//document.getElementById('nextt').style.display = 'none';
	</script>";
		}
		
	
	}
	
	
	}
















?>