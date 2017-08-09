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

<body ng-app="bill">
	
<div class=" container-fluid" ng-controller="bill_controller" >




		
		

<div ng-include="'../include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>

 </div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
              <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
				<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" ng-click="oprefdoc()" >OP Bill</button>
			   </div>
			   <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
				<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" ng-click="iprefdoc()">IP Bill</button>
			   </div>
			   <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
				<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" ng-click="testrefdoc()">Test Bill</button>
			   </div>
			   <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
				<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" ng-click="packagerefdoc()" >Package Bill</button>
			   </div>		
			
	  </div>
 </div>
 
 
 
 
 <!--   IP BILLING     -->
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" ng-show="show_ip_div">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					
					<div class="group col-md-6 col-sm-6 col-lg-6"> 
							<div class="col-md-12 col-sm-12 col-lg-12">	
								  <input type="number" required class="module-input "  id="patientid"  ng-model="bill_no" ng-change="get_bill_details()">
							  <span class="bar"></span>
							  <label class="label-text">Enter IP Bill Number</label>
							  </div>
					</div>	  
								 
				<table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Description</th>
										<th >Price</th>
										<th >Quantity</th>
										<th >Total</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  
										 <tr class="border-data-btm" ng-repeat="bill in bill_details.billdetails" > 
										<td class=" left-padding" >{{$index+1}}</td>
										<td> {{bill.description}}</td>
										<td  >{{bill.amount}}</td>
										<td  ><input type="text" name="" id="" ng-model="bill.quantity" ng-change="call(bill.sl_no,bill.quantity,bill.amount,bill.bill_no)"/></td>
										<td  >{{bill.amount * bill.quantity}}</td>
										
										<td>
											
											
										</td>
										</tr> 
										  <tr>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td>Discount</td>
									  <td><input type="text" name="" id="" value="0" ng-model="discount" /></td>
									  </tr>
									
									  <tr>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td>Total amount</td>
									  <td>{{bill_details.total.total-discount-balance}}</td>
									  </tr>
									  
									  
								
									</tbody>
					  </table>			  
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
						
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Cash <input type="radio" name="payment" id=""  value="Cash" ng-model="payment_mode" checked required /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Card <input type="radio" name="payment" id="" value="Card" ng-model="payment_mode" required  /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Devide<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="payment_mode" ng-click="click_payment(payment_mode)" required >
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2" ng-show="devide" style="margin-top: 15%;">
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" /></br>
												
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{bill_details.total.total-discount - display_pay_details.devidecash-balance}}"/></br> 
												Total <input type="number" name="totalamount" ng-model="bill_details.total.total-discount-balance" />		
										</div>

					 </div>
					  <div class="col-md-1 col-sm-1 col-lg-1">
						Balance
					 </div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						<input type="text" name="" id="" value="0" ng-model="balance"/>
					 </div>
					 </div>
				<div style="margin-left:88%;">
                  <button type = "submit" class = "btn btn-primary align-submit"  ng-click="print_section()" >
					Print
					</button>
		    </div> 
					  
					 
					 
		</div>
	</div>
     <!--   IP BILLING ends here     -->
    <!--   OP BILLING     -->
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" ng-show="show_op_div">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					
					<div class="group col-md-6 col-sm-6 col-lg-6"> 
							<div class="col-md-12 col-sm-12 col-lg-12">	
								  <input type="number" required class="module-input "  id="patientid"  ng-model="op_bill_no" ng-change="get_op_bill_details()">
							  <span class="bar"></span>
							  <label class="label-text">Enter OP Bill Number</label>
							  </div>
					</div>	  
								 
				<table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Description</th>
										<th >Price</th>
										<th >Quantity</th>
										<th >Total</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  
										 <tr class="border-data-btm" ng-repeat="op_bill in op_bill_details.billdetails" > 
										<td class=" left-padding" >{{$index+1}}</td>
										<td> {{op_bill.description}}</td>
										<td  >{{op_bill.amount}}</td>
										<td  ><input type="text" name="" id="" ng-model="op_bill.quantity" ng-change="op_call(op_bill.sl_no,op_bill.quantity,op_bill.amount,op_bill.bill_no)"/></td>
										<td  >{{op_bill.amount * op_bill.quantity}}</td>
										
										<td>
											
											
										</td>
										</tr> 
										  <tr>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td>Discount</td>
									  <td><input type="text" name="" id="" value="0" ng-model="op_discount" /></td>
									  </tr>
									
									  <tr>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td>Total amount</td>
									  <td>{{op_bill_details.total.total-op_discount-op_balance}}</td>
									  </tr>
									  
									  
								
									</tbody>
					  </table>			  
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
						
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Cash <input type="radio" name="payment" id=""  value="Cash" ng-model="payment_mode" checked required /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Card <input type="radio" name="payment" id="" value="Card" ng-model="payment_mode" required  /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Devide<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="payment_mode" ng-click="click_payment(payment_mode)" required >
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2" ng-show="devide" style="margin-top: 15%;">
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" /></br>
												
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{op_bill_details.total.total-discount - display_pay_details.devidecash-op_balance}}"/></br> 
												Total <input type="number" name="totalamount" ng-model="op_bill_details.total.total-discount-op_balance" />		
										</div>

					 </div>
					  <div class="col-md-1 col-sm-1 col-lg-1">
						Balance
					 </div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						<input type="text" name="" id="" value="0" ng-model="op_balance"/>
					 </div>
					 </div>
				<div style="margin-left:88%;">
                  <button type = "submit" class = "btn btn-primary align-submit"  ng-click="op_print_section()" >
					Print
					</button>
		    </div> 
					  
					 
					 
		</div>
	</div>
     <!--   OP BILLING ends here     -->
     <!--   TEST BILLING     -->
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" ng-show="show_test_div">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					
					<div class="group col-md-6 col-sm-6 col-lg-6"> 
							<div class="col-md-12 col-sm-12 col-lg-12">	
								  <input type="number" required class="module-input "  id="patientid"  ng-model="test_bill_no" ng-change="get_test_bill_details()">
							  <span class="bar"></span>
							  <label class="label-text">Enter Test Bill Number</label>
							  </div>
					</div>	  
								 
				<table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Description</th>
										<th >Price</th>
										
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  
										 <tr class="border-data-btm" ng-repeat="test_bill in test_bill_details.billdetails" > 
										<td class=" left-padding" >{{$index+1}}</td>
										<td> {{test_bill.test_name}}</td>
										<td  >{{test_bill.price}}</td>
										
										
										<td>
											
											
										</td>
										</tr> 
										  <tr>
									  <td></td>
									 
									  <td>Discount</td>
									  <td><input type="text" name="" id="" value="0" ng-model="test_discount" /></td>
									  </tr>
									
									  <tr>
									  <td></td>
									  
									  <td>Total amount</td>
									  <td>{{test_bill_details.total.total-test_discount-test_balance}}</td>
									  </tr>
									  
									  
								
									</tbody>
					  </table>			  
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
						
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Cash <input type="radio" name="payment" id=""  value="Cash" ng-model="payment_mode" checked required /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Card <input type="radio" name="payment" id="" value="Card" ng-model="payment_mode" required  /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Devide<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="payment_mode" ng-click="click_payment(payment_mode)" required >
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2" ng-show="devide" style="margin-top: 15%;">
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" /></br>
												
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{test_bill_details.total.total-discount - display_pay_details.devidecash-test_balance}}"/></br> 
												Total <input type="number" name="totalamount" ng-model="test_bill_details.total.total-discount-test_balance" />		
										</div>

					 </div>
					  <div class="col-md-1 col-sm-1 col-lg-1">
						Balance
					 </div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						<input type="text" name="" id="" value="0" ng-model="test_balance"/>
					 </div>
					 </div>
				<div style="margin-left:88%;">
                  <button type = "submit" class = "btn btn-primary align-submit"  ng-click="test_print_section()" >
					Print
					</button>
		    </div> 
					  
					 
					 
		</div>
	</div>
     <!--   TEST BILLING ends HERE     -->
    <!--   Package BILLING     -->
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" ng-show="show_package_div">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					
					<div class="group col-md-6 col-sm-6 col-lg-6"> 
							<div class="col-md-12 col-sm-12 col-lg-12">	
								  <input type="number" required class="module-input "  id="patientid"  ng-model="package_bill_no" ng-change="get_package_bill_details()">
							  <span class="bar"></span>
							  <label class="label-text">Enter Package Bill Number</label>
							  </div>
					</div>	  
								 
				<table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Description</th>
										<th >Amount</th>
										
									  </tr>
									</thead>
									<tbody>
									  
										 <tr class="border-data-btm"  > 
										<td class=" left-padding" >{{$index+1}}</td>
										<td> {{package_bill_details.description}}</td>
										<td  >{{package_bill_details.totalamount}}</td>
										
										</tr> 
										  <tr>
									  
									  <td></td>
									  <td>Discount</td>
									  <td><input type="text" name="" id="" value="0" ng-model="package_discount" /></td>
									  </tr>
									
									  <tr>
									  
									  <td></td>
									  <td>Total amount</td>
									  <td>{{package_bill_details.totalamount-package_discount-package_balance}}</td>
									  </tr>
									  
									  
								
									</tbody>
					  </table>			  
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
						
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Cash <input type="radio" name="payment" id=""  value="Cash" ng-model="payment_mode" checked required /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Card <input type="radio" name="payment" id="" value="Card" ng-model="payment_mode" required  /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Devide<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="payment_mode" ng-click="click_payment(payment_mode)" required >
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2" ng-show="devide" style="margin-top: 15%;">
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" /></br>
												
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{package_bill_details.totalamount-discount - display_pay_details.devidecash-balance}}"/></br> 
												Total <input type="number" name="totalamount" ng-model="package_bill_details.totalamount-package_discount-package_balance" />		
										</div>

					 </div>
					  <div class="col-md-1 col-sm-1 col-lg-1">
						Balance
					 </div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						<input type="text" name="" id="" value="0" ng-model="package_balance"/>
					 </div>
					 </div>
				<div style="margin-left:88%;">
                  <button type = "submit" class = "btn btn-primary align-submit"  ng-click="package_print_section()" >
					Print
					</button>
		    </div> 
					  
					 
					 
		</div>
	</div>
     <!--   Package BILLING  ends here   -->
</div> 
 
 
 
<!-- ip Print setion strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printdischarge">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 20px;">SRI LAKSHMI SUPER SPECILITY HOSPITAL</p></center>
						<center><p style="font-size: 10px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 10px;">Ph:080 41676336,M:9535566566</p></center>

					</div>
					<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="2">
						<tr>
							<td >Patient Id : </td>
							<td>{{billdetails.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name :  </td>
							<td>{{billdetails.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{billdetails.phone}}</td>
								
						</tr>
						
						
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:350px;margin-top:-210px;margin-left:300px;">
					<table cellpadding="2">
						<tr>
							<td >Date : </td>
							<td>{{billdetails.date}}</td>
							
						</tr>
					
						
						<tr>
							<td >IP Bill Number : &nbsp;</td>
							<td>{{billdetails.bill_no}}</td>
								
						</tr>
						<tr>
							<td >Payment Mode : &nbsp;</td>
							<td>{{billdetails.paymentmode}}</td>
						</tr>
					</table>
				</div>
					<div style="height:20px;"></div>
						
				
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:0px;margin-top:30px">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:65%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Price</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:10px;" ng-repeat="bill in bill_details.billdetails">
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.amount}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.quantity}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.amount * bill.quantity}}</td>
					</tr>
					
					<tr>
						<td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{bill_details.total.total}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Discount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{discount}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{balance}}</td>
					</tr>
				
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill_details.total.total-discount-balance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:450px;text-align:center;">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>


<!-- ip print section ends here -->
<!-- op Print setion strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="print_op">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 30px;">SRI LAKSHMI HOSPITAL</p></center>
						<center><p style="font-size: 15px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura</p></center>
						<center><p style="font-size: 15px;">C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 15px;">Ph:080 41676336,M:9535566566</p></center>
						<img src="print_barcode.php?barcode_to_print={{op_billdetails.barcode}}"/>
						
					</div>
					<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="10">
						<tr>
							<td >Patient Id : </td>
							<td>{{op_billdetails.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name :  </td>
							<td>{{op_billdetails.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{op_billdetails.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{op_billdetails.gender}}</td>
								
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{op_billdetails.age}}</td>
								
						</tr>
						
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-240px;margin-left:300px;" >
					<table cellpadding="10">
						
						<tr>
							<td >Refered Doctor </td>
							<td>{{op_billdetails.ref_name}}</td>
							
						</tr>
						<tr>
							<td >Date : </td>
							<td>{{op_billdetails.date}}</td>
							
						</tr>
					
						
						<tr>
							<td >OP Bill Number : &nbsp;</td>
							<td>{{op_billdetails.bill_no}}</td>
								
						</tr>
						<tr>
							<td >Payment Mode : &nbsp;</td>
							<td>{{op_billdetails.paymentmode}}</td>
						</tr>
					</table>
				</div>
					
						
				
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:80px;margin-top:60px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 58px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:65%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Price</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:50px;" ng-repeat="op_bill in op_bill_details.billdetails">
						<td style="border-right:1px solid black;padding-left:5px;padding:14px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op_bill.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op_bill.amount}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op_bill.quantity}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op_bill.amount * op_bill.quantity}}</td>
					</tr>
					
					<tr>
						<td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{op_bill_details.total.total}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Discount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op_discount}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op_balance}}</td>
					</tr>
				
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op_bill_details.total.total-op_discount-op_balance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:450px;text-align:center;">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>


<!-- op print section ends here -->
<!-- test Print setion strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="print_test">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 30px;">SRI LAKSHMI HOSPITAL</p></center>
						<center><p style="font-size: 15px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura</p></center>
						<center><p style="font-size: 15px;">C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 15px;">Ph:080 41676336,M:9535566566</p></center>
					
						
					</div>
					<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="10">
						<tr>
							<td >Patient Id : </td>
							<td>{{test_billdetails.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name :  </td>
							<td>{{test_billdetails.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{test_billdetails.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{test_billdetails.gender}}</td>
								
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{test_billdetails.age}}</td>
								
						</tr>
						
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-240px;margin-left:300px;" >
					<table cellpadding="10">
						
						<tr>
							<td >Refered Doctor </td>
							<td>{{test_billdetails.ref_name}}</td>
							
						</tr>
						<tr>
							<td >Date : </td>
							<td>{{test_billdetails.date}}</td>
							
						</tr>
					
						
						<tr>
							<td >Test Bill Number : &nbsp;</td>
							<td>{{test_billdetails.bill_no}}</td>
								
						</tr>
						<tr>
							<td >Payment Mode : &nbsp;</td>
							<td>{{test_billdetails.paymentmode}}</td>
						</tr>
					</table>
				</div>
					
						
				
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:80px;margin-top:60px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 58px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:75%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Amount</th>
						
					</tr>
					<tr style="height:50px;" ng-repeat="test_bill in test_bill_details.billdetails">
						<td style="border-right:1px solid black;padding-left:5px;padding:14px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test_bill.test_name}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test_bill.price}}</td>
						
					</tr>
					
					<tr>
						<td colspan="2" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{test_bill_details.total.total}}</td>
					</tr>
					<tr>
						<td colspan="2" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Discount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test_discount}}</td>
					</tr>
					<tr>
						<td colspan="2" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test_balance}}</td>
					</tr>
				
					<tr>
						<td colspan="2" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test_bill_details.total.total-test_discount-test_balance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:450px;text-align:center;">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>


<!-- test print section ends here -->
<!-- package Print setion strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="print_package">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 30px;">SRI LAKSHMI HOSPITAL</p></center>
						<center><p style="font-size: 15px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura</p></center>
						<center><p style="font-size: 15px;">C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 15px;">Ph:080 41676336,M:9535566566</p></center>
					
						
					</div>
					<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="10">
						<tr>
							<td >Patient Id : </td>
							<td>{{package_bill_details.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name :  </td>
							<td>{{package_bill_details.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{package_bill_details.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{package_bill_details.gender}}</td>
								
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{package_bill_details.age}}</td>
								
						</tr>
						
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-240px;margin-left:300px;" >
					<table cellpadding="10">
						
						<tr>
							<td >Refered Doctor </td>
							<td>{{package_bill_details.ref_name}}</td>
							
						</tr>
						<tr>
							<td >Date : </td>
							<td>{{package_bill_details.date}}</td>
							
						</tr>
					
						
						<tr>
							<td >Test Bill Number : &nbsp;</td>
							<td>{{package_bill_details.bill_no}}</td>
								
						</tr>
						<tr>
							<td >Payment Mode : &nbsp;</td>
							<td>{{package_bill_details.paymentmode}}</td>
						</tr>
					</table>
				</div>
					
						
				
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:80px;margin-top:60px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 58px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:75%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Amount</th>
						
					</tr>
					<tr style="height:50px;" >
						<td style="border-right:1px solid black;padding-left:5px;padding:14px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_bill_details.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_bill_details.totalamount}}</td>
						
					</tr>
					
					<tr>
						<td colspan="2" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{package_bill_details.totalamount}}</td>
					</tr>
					<tr>
						<td colspan="2" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Discount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_discount}}</td>
					</tr>
					<tr>
						<td colspan="2" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_balance}}</td>
					</tr>
				
					<tr>
						<td colspan="2" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_bill_details.totalamount-package_discount-package_balance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:450px;text-align:center;">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>


<!-- package print section ends here -->

</div>



   <script src="../../js/edit_bill/edit_bill.js"></script> 
</body> <!-- Body End -->
</html>