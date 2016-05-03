<?php
include"../functions/connection.php";
include"../functions/error.php";
include"../functions/drop.php";

$age = mysqli_real_escape_string($con,nl2br(htmlspecialchars($_POST['age'])));
$stage = mysqli_real_escape_string($con,nl2br(htmlspecialchars($_POST['stage'])));
$Symptoms = mysqli_real_escape_string($con,nl2br(htmlspecialchars($_POST['symptoms'])));
$Psychological =mysqli_real_escape_string($con,nl2br(htmlspecialchars($_POST['psychological'])));
$Evidence =mysqli_real_escape_string($con,nl2br(htmlspecialchars($_POST['evidence'])));
$Basis = mysqli_real_escape_string($con,nl2br(htmlspecialchars($_POST['basis'])));

$empty= "Input all fields or put N/A";

if($age){
if($stage){
if($Symptoms){
if($Psychological){
if($Evidence){
	if($Basis){
		
		
//ranking order

switch ($Evidence) {
    case "Good":
        $rank = 4 ;
        break;
    case "Fair":
        $rank = 3 ;
        break;
    case "Excellent":
        $rank = 5 ;
        break;
	case "Unclear":
        $rank = 1;
        break;
	case "Experimental":
        $rank = 2;
        break;
   default:
   $rank = "will be ranked ";
      
}
		
		$query = mysqli_query($con,"insert into groupp values('id','$age','$stage','$Symptoms','$Psychological','$Evidence','$Basis','$rank')");
		
	 if ($query === false) {
    die('Invalid query: ' . mysql_error());
}else echo "Inserted successfully :)";
		
	 dropbox($con,$age,$stage,$Symptoms,$Psychological,$Evidence,$Basis);
		
		}else echo $empty;
	
	
	}else  echo $empty;
	
	}else  echo $empty;
	
	}else  echo $empty ;
	
	}else echo $empty;
	
	}else echo $empty;



 ?>