
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Setup Discount Promotion By Group Detail</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap-3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap-3.1.1/css/blog.css">
<link rel="stylesheet" href="../bootstrap-3.1.1/css/doc.css">
<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.1.1/js/jquery-2.1.1.min.js"></script>
<script src="../bootstrap-3.1.1/js/bootstrap.min.js"></script>


<style>

.navbar-nav>li>a {
padding-top: 10px;
padding-bottom: 10px;
color:#cdddeb;
}

.navbar-nav>li.active a {
color:white;
}
/*
.navbar-nav>li>a:hover {
background:#428bca;
}
.nav .open>a, .nav .open>a:hover, .nav .open>a:focus {
background-color: #428bca; 
border-color: #428bca;
}
*/
</style>
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
         <ul class="nav navbar-nav bg-primary">
	        <li ><a href="1-1-prod-group-for-prom.html">Product Group for Promotion</a></li>
	        <li class="dropdown active">
	          <a href="1-1-prod-group-for-prom.html"class="dropdown-toggle" data-toggle="dropdown">Discount Promotion <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="2-1-setup-discount-prom-by-item.html">Discount Promotion by Item</a></li>
	            <li><a href="3-1-setup-discount-prom-by-group.html">Discount Promotion by Group</a></li>
	            <li><a href="3-1-bundle-setup-discount-prom-by-group.html">Discount Promotion by Bundle</a></li>
	          </ul>
	        </li>
	         <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Free Item Promotion <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="4-1-setup-free-item-prom-by-item.html">Free Item Promotion by Item</a></li>
	            <li><a href="5-1-setup-free-item-prom-by-group.html">Free Item Promotion by Group</a></li>
	            <li><a href="5-1-bundle-setup-free-item-prom-by-group.html">Free Item Promotion by Bundle</a></li>
	          </ul>
	        </li>
	      </ul>
        </nav>
      </div>
    </div>

    <div class="container">
<h2>Add Product Group to Promotion Group(DG0908)</h2>
	<div class="row">
		<div class="col-md-8">
			<table class="table table-bordered">
				<tr>
					<td>Promotion No</td>
					<td>
						<b>DG0908</b>
					</td>
				</tr>
				<tr>
					<td>Promotion Code</td>
					<td>
						
						<input type="text" />/*Auto Complete Add Group Item*/
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
					<input type="text" readonly="readonly" style="background:#dddddd"/>
					</td>
						
				</tr>
				
				<tr>
					<td>Break By</td>
					<td>
						<select>
							<option>A</option>
							<option>Q</option>
							<option>LA</option>
							<option>LQ</option>
						</select>
					
					(Q-Quanlity A-Amonut LQ-Loop Quanlity LA-Loop Amonut)
					</td>
				</tr>
				<tr>
					<td>
						Discount For
					</td>
					<td>
						<select>
							<option>B</option>
							<option>P</option>
							<option>LB</option>
							<option>LP</option>
						</select>
					
					B (B-Baht P-Percent LB-Loop Baht LP-Loop Percent)
					</td>
				</tr>
				
				
				<tr>
					<td>
						Limit Free Qty
					</td>
					<td>
						<input type="text">
					</td>
				</tr>
				<tr>
					<td>
						Limit Discount Bath
					</td>
					<td>
						<input type="text">
					</td>
				</tr>
			</table>
			
		</div>
		
	</div>
	
	
	
	
	
	<table>
				<tr>
					<td>
					<a href="3-1-setup-discount-prom-by-group.html">
					<button type="button" class="btn btn-primary btn-xs">Back </button>
					</a>
					&nbsp;
					<button type="button" class="btn btn-primary btn-xs">OK </button>
					&nbsp;
					<button type="button" class="btn btn-primary btn-xs">Cancel </button>
				</td>
				</tr>
			</table>
	<hr>
	<h2>List of Promotion Group</h2>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr >
						<th>
						 Promotion Code
						</th>
						<th>
						 Description
						</th>
						<th>
						Break By
						</th>
						<th>
						Discount For
						</th>
						<th>
						LimitFreeQty
						</th>
						<th>
						LimitDiscQty
						</th>
						<th>
						Manage
						</th>
					</tr>
					<tr>
						<td>
						G03001 
						</td>
						<td>
						ColaBottle
						</td>
						<td>
						Q
						</td>
						<td>
						B
						</td>
						<td>
						1
						</td>
						<td>
						5
						</td>
						
						
						<td>
						<button type="button" class="btn btn-primary btn-xs">Edit </button>
						<button type="button" class="btn btn-danger btn-xs">Delete </button>
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-viewStep-modal-lg">View Step </button>
						<a href="3-3-setup-discount-prom-by-group-prom-step.html">
						<button type="button" class="btn btn-primary btn-xs">Promotion Step </button>
						</a>
						
						</td>
					</tr>
					<tr>
						<td>
						G0401 
						</td>
						<td>
						Classsic 70/150/300
						</td>
						<td>
						B
						</td>
						<td>
						B
						</td>
						<td>
						1
						</td>
						<td>
						5
						</td>
						
						
						
						<td>
						<button type="button" class="btn btn-primary btn-xs">Edit </button>
						<button type="button" class="btn btn-danger btn-xs">Delete </button>
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-viewStep-modal-lg">View Step </button>
						<a href="3-3-setup-discount-prom-by-group-prom-step.html">
						<button type="button" class="btn btn-primary btn-xs">Promotion Step </button>
						
						</a>
						
						</td>
					</tr>
					<tr>
						<td>
						G26001 
						</td>
						<td>
						Sun Snack Dunk Group
						</td>
						<td>
						Q
						</td>
						<td>
						B
						</td>
						<td>
						1
						</td>
						<td>
						5
						</td>
						
						
						
						<td>
						<button type="button" class="btn btn-primary btn-xs">Edit </button>
						<button type="button" class="btn btn-danger btn-xs">Delete </button>
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-viewStep-modal-lg">View Step </button>
						<a href="3-3-setup-discount-prom-by-group-prom-step.html">
						<button type="button" class="btn btn-primary btn-xs">Promotion Step </button>
						</a>
						
						</td>
					</tr>
					<tr>
						<td>
						G34001 
						</td>
						<td>
						OVO 3 in 1 Snack
						</td>
						<td>
						Q
						</td>
						<td>
						B
						</td>
						<td>
						1
						</td>
						<td>
						5
						</td>
						
						
						
						<td>
						<button type="button" class="btn btn-primary btn-xs">Edit </button>
						<button type="button" class="btn btn-danger btn-xs">Delete </button>
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-viewStep-modal-lg">View Step </button>
						<a href="3-3-setup-discount-prom-by-group-prom-step.html">
						<button type="button" class="btn btn-primary btn-xs">Promotion Step </button>
						</a>
						
						</td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
 
</div>

  <!-- Start  View Step Large modal -->


<div class="modal fade bs-viewStep-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel">View Step (G03001 ColaBottle)</h4>
        </div>
        <div class="bs-callout bs-callout-info">
				    <h4>Break By</h4>
				    <div class="row">
				    	<div class="col-md-12">
						    <table class="table">
								<thead>
									<tr>
										<th>Promotion Code</th>
										<th>Description</th>
										<th>Mininum SKU</th>
										<th>Break Qty</th>
										<th>Unit</th>
										<th>Break Amt</th>
										<th>Discount Per</th>
										<th>Discount Bath</th>
										
										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
										G03001
										</td>
										<td>
										ColaBottle
										</td>
										<td>
										2
										</td>
										<td>
										1
										</td>
										<td>
										Pack
										</td>
										
										<td>
										
										</td>
										<td>
										
										</td>
										<td>
										6
										</td>
									
										
									</tr>
									
									
									
								</tbody>
							</table>
				    	</div>
				    </div>
				    
			</div>
			
        <div class="modal-body">

	        <div class="row">
			<div class="col-md-12">
					<table class="table">
			          	<thead>
				          	<tr>
				          		
				          		
				          		<th>Free Item Code</th>
				          		<th>Description</th>
				          		<th>Free Qty</th>
				          		<th>Unit</th>
				          		<th>Gl Account</th>
				          		
				          		
				          	</tr>
			          	</thead>
			          	<tbod>
			          		<tr>
			          			
			          			<td>01010006</td>
			          			<td>กระทิงแดง150มล.</td>
			          			<td>1</td>
			          			<td>Piece</td>
			          			<td></td>
			          			
			          		</tr>
			          		<tr>
			          		
			          			<td>01010007</td>
			          			<td>กระทิงแดง150มล.(พ)</td>
			          			<td>1</td>
			          			<td>Piece</td>
			          			<td></td>
			          			
			          		</tr>
			          		<tr>
			          			
			          			<td>01010008</td>
			          			<td>เรดดิ้โกจิ</td>
			          			<td>1</td>
			          			<td>Piece</td>
			          			<td></td>
			          			
			          		</tr>
			          	</tbod>
			          </table>
			</div>
			
			
			
		</div>
       
    </div>
    <div class="bs-callout bs-callout-info">
				    <h4>Break By</h4>
				    <div class="row">
				    	<div class="col-md-12">
						    <table class="table">
								<thead>
									<tr>
										<th>Prom Code</th>
										<th>Description</th>
										<th>Minumum SKU</th>
										<th>Break Qty</th>
										<th>Unit</th>
										<th>Break Amt</th>
										<th>DiscPer</th>
										<th>Disc Bath</th>
										
										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
										G03001
										</td>
										<td>
										ColaBottle
										</td>
										<td>
										2
										</td>
										<td>
										4
										</td>
										
										<td>
										Pack
										</td>
										
										<td>
										
										</td>
										<td>
										
										</td>
										<td>
										10
										</td>
									
										
									</tr>
									
									
									
								</tbody>
							</table>
				    	</div>
				    </div>
				    
			</div>
			
        <div class="modal-body">

	        <div class="row">
			<div class="col-md-12">
					<table class="table">
			          	<thead>
				          	<tr>
				          		
				          		
				          		<th>Free Item Code</th>
				          		<th>Description</th>
				          		<th>Free Qty</th>
				          		<th>Unit</th>
				          		<th>Gl Account</th>
				          		
				          		
				          	</tr>
			          	</thead>
			          	<tbody>
			          		<tr>
			          			
			          			<td>01010006</td>
			          			<td>กระทิงแดง150มล.</td>
			          			<td>1</td>
			          			<td>Piece</td>
			          			<td></td>
			          			
			          		</tr>
			          		<tr>
			          		
			          			<td>01010007</td>
			          			<td>กระทิงแดง150มล.(พ)</td>
			          			<td>2</td>
			          			<td>Piece</td>
			          			<td></td>
			          			
			          		</tr>
			          		<tr>
			          			
			          			<td>01010008</td>
			          			<td>เรดดิ้โกจิ</td>
			          			<td>1</td>
			          			<td>Piece</td>
			          			<td></td>
			          			
			          		</tr>
			          	</tbody>
			          </table>
			</div>
			
			
			
		</div>
            
		
         
        
          
        </div>
  </div>
</div>
</div>
<!-- End View Step Large modal -->   

    	<div class="blog-footer">
	      <p>Smart Van BackOffice</p>
	      <p>
	        <a href="#">Back to top</a>
	      </p>
	    </div>



   
  </body>
</html>
