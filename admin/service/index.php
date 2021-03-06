<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="admin")
{
	
}
else{
	header('Location: ../../login/index.html');
	die();
	
}
?>

<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">
<link href='../../css/fullcalendar.css' rel='stylesheet' />
<link href='../../css/fullcalendar.print.css' rel='stylesheet' media='print' />

  <link rel="stylesheet" href="../../css/datepicker/jquery-ui.css" >
<script src='../../js/jquery.min.js'></script>
<script src="../../js/bootstrap.min.js"></script> 
<script src="../../js/angular.min.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/custom_jquery.js"></script>	
	
<script src='../../js/moment.min.js'></script>
<script src='../../js/moment.min.js'></script>

</head>

<body ng-app="service">
	
<div class=" container-fluid" ng-controller="service_controller" >




		
		

<div ng-include="'../include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>
<div class="col-md-4 col-lg-4 col-xs-4 col-sm-4"> 
		<button type="button" class="btn add-insurance-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#add_service" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Add Service</span></span></button>
 </div>
 </div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
 
			
	  </div>
 </div>
 
 
 
 
 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					
					  
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Service Name</th>
										<th >Price</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="service in display_service" > 
										
										<td class=" left-padding" >{{service.service_id}}</td>
										<td> {{service.service_name}}</td>
										<td  >{{service.price}}</td>
										
										
										<td  >
											<a href="#" class="adjustedit" data-toggle = "modal" data-target = "#edit_service"  ng-click="edit_service(service.service_id)"  ><img src="../../icons/employee/edit.png" /></a> 
											<a href="#" ng-click="delete_service(service.service_id)"><img src="../../icons/employee/delete.png" /></a>
										</td>
									  </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
	</div>
 
 
 
 
</div> 
 
 
 

<!-- Add  service Modal -->
<div class = "adjust-model modal fade" id = "add_service" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-emp-model-size ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Service
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="margin-top: -3%;" for="name">Service Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="service.service_name" placeholder="Enter Service Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="service.price"  placeholder="Enter Service Price" >
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name"></label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8  adjust-restric" style="height: 100%;">
				   <a id="add-emp"  href="#" ng-click="add_temp_service(serviceS)">
				   <img src="../../icons/employee/add.png" ></img>
								<span style="padding-left:3px;" >Add Service</span>
					</a>
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			  
			<div class=" col-md-12 col-sm-12 col-lg-12 tbl-back-color" ng-show="show_div">
							
							
								
								<table id="tbl"  class="table service-lab-tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Service Name</th>
									
										<th >Price</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="names in disp_service">
										
										<td class=" left-padding" >{{names.service_name}}</td>
										<td>{{names.price}}</td>
										
										<td><a href="#" ><img src="../../icons/employee/addemp.png"  ng-click="delete_temp_service(names.service_name)" ></a></td>
									  </tr>
									</tbody>
								</table>
							
							<div class=" col-md-1 col-sm-1 col-lg-1 " >&nbsp;</div>
					  </div>
    </div>
     		   
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="add_service()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   <!-- Edit  Employee Modal -->
<div class = "adjust-model modal fade" id = "edit_service" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-emp-model-size ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Edit Service
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="margin-top: -3%;" for="name">Service Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="edit_service.service_name" placeholder="Enter Service Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="edit_service.price"  placeholder="Enter Service Price" >
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
		  
    </div>
     		   
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="update_service()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   
   

 

</div>  <!-- Container End -->

   <script src="../../js/servicescript/servicescript.js"></script> 
</body> <!-- Body End -->
</html>