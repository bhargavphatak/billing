<?php
require_once("../../database.php");
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
{
		$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}


$data = json_decode(file_get_contents("php://input"));
$package_id=$data->package_id;
$id=$data->patient_id;
$sql="select patient_id from patient_registration where patient_id = '{$id}' or phone= '{$id}'  ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$row= mysqli_fetch_array($res);
$patient_id=$row['patient_id'];
$paymentmode=$data->paymentmode;


$flag=$data->flag;
$offeramount=$data->amount;
$tests=array();
$tests2=array();
$testsdata=array();
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');
$time=date(' h:i:sa' );
$testdata=array();
$data1=array();
$packageinfo=array();
$balance=$data->balance;


if($flag=="package")
{

			
			$packageamt="SELECT p.package_name,p.offer, sum(pt.price) as total from package_test pt,package p where  p.package_id=pt.package_id and  pt.package_id='{$package_id}' ORDER by pt.package_id DESC LIMIT 1";
            $packageresult=mysqli_query($con,$packageamt) or die(mysqli_error($con));
			$fetchpackage= mysqli_fetch_array($packageresult);
			$description=$fetchpackage["package_name"];
			$amount=$fetchpackage["total"];
			$offer=$fetchpackage["offer"];
			if($paymentmode=="Both")
			{
			$cashamt=$data->paymode->devidecash;
			$cardamt=$offeramount-$cashamt-$balance;
			}
			if($paymentmode=="Cash")
			{
			$cashamt=$offeramount-$balance;
			$cardamt=0;
			}
			if($paymentmode=="Card")
			{
			$cashamt=0;
			$cardamt=$offeramount-$balance;
			}
            			

    //  foreach($data->testnames as $key1=>$val1)
       //{
			$packagetaken="insert into op_lab_package_taken(description,patient_id,package_id,date,time,paymentmode,cashamt,cardamt,balance,amount,offer,totalamount,user_id) values('{$description}','{$patient_id}','{$package_id}','{$date}','{$time}','{$paymentmode}','{$cashamt}','{$cardamt}','{$balance}','{$amount}','{$offer}','{$offeramount}','{$user_id}')";
			$takenresult=mysqli_query($con,$packagetaken) or die(mysqli_error($con));
			
			$patient="SELECT p.*, ob.* from op_lab_package_taken ob,patient_registration p where p.patient_id='{$patient_id}' ORDER by ob.package_billno DESC LIMIT 1";
			
			
			$patient_res=mysqli_query($con,$patient) or die(mysqli_error($con));
		    $row1= mysqli_fetch_array($patient_res);
		    $data1['patient_id']=$row1['patient_id'];
		    $data1['phone']=$row1['phone'];
		    $data1['patient_name']=$row1['patient_name'];
		    $data1['gender']=$row1['gender'];
		    $data1['age']=$row1['age'];
		    $data1['billno']=$row1['package_billno'];
		    $data1['paymentmode']=$row1['paymentmode'];
			$data1['date']=$row1['date'];
		    $data1['amount']=$row1['amount'];
			$data1['offer']=$row1['offer'];
			$data1['totalamount']=$row1['totalamount'];
			$data1['description']=$row1['description'];
			$data1['barcode']=$row1['barcode_reader'];
			
		  
  
  
  
  print json_encode($data1);

}

?>