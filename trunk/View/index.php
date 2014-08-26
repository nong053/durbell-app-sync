
<!DOCTYPE html>
<html lang="en">
  <head>
 <!--Courier New font -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Setup Discount Promotion By Item</title>


<!-- kendo css start-->
<link href="../kendoCommercial/styles/kendo.common.min.css" rel="stylesheet" />
<link href="../kendoCommercial/styles/kendo.default.min.css" rel="stylesheet" />
<link href="../kendoCommercial/styles/kendo.dataviz.min.css" rel="stylesheet" />
<link href="../kendoCommercial/styles/kendo.dataviz.default.min.css" rel="stylesheet" />
<!-- kendo css end-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap-3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap-3.1.1/css/blog.css">
<link rel="stylesheet" href="../bootstrap-3.1.1/css/doc.css">
<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->

<!--<script src="//code.jquery.com/jquery-2.1.0.min.js"></script>-->
<script src="../bootstrap-3.1.1/js/jquery-2.1.1.min.js"></script>
<script src="../bootstrap-3.1.1/js/bootstrap.min.js"></script>


<!-- jquery ui -->
<script src="../Utility/jqueryUi/js/jquery-ui-1.10.4.custom.min.js"></script>
<link  href="../Utility/jqueryUi/css/cupertino/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
<!-- jquery ui -->


<!-- call js -->
<script src="../Utility/jqueryUi/jquery.multiselect.js"></script>
<link href="../Utility/jqueryUi/jquery.multiselect.css" rel="stylesheet" />
<!-- call js -->


<!-- kendo js start-->
<script src="../kendoCommercial/js/angular.min.js"></script>
<script src="../kendoCommercial/js/kendo.all.min.js"></script>
<!-- kendo js end-->

<!--
<link rel="stylesheet" type="text/css" href="../jquery-ui-multiselect/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="../jquery-ui-multiselect/src/jquery.multiselect.js"></script>
-->
<!-- include js start-->

<!--<script class="prodGroupForProm" type="text/javascript" src="../Controller/prodGroupForProm.js"></script>-->
<script type="text/javascript" src="../Controller/main.js"></script>
<!-- include js start-->

  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
           <ul class="nav navbar-nav bg-primary">
	        <li><a href="#" id="prodGroupForProm">Product Group for Promotion</a></li>
	        <li class="dropdown active">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Discount Promotion <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#" id="DiscPromByItem">Discount Promotion by Item</a></li>
	            <li><a href="#" id="DiscPromByGroup">Discount Promotion by Group</a></li>
	            <li><a href="#" id="DiscPromByBundle">Discount Promotion by Bundle</a></li>
	          </ul>
	        </li>
	         <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Free Item Promotion <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#" id="FreePromByItem">Free Item Promotion by Item</a></li>
	            <li><a href="#" id="FreePromByGroup">Free Item Promotion by Group</a></li>
	            <li><a href="#" id="FreePromByBundle">Free Item Promotion by Bundle</a></li>
	          </ul>
	        </li>
	      </ul>
        </nav>
      </div>
    </div>

<!-- main content -->
<div class="container">
		<div id="content">
		</div>
</div>
<!-- main content -->



    <div class="blog-footer">
      <p>iVan BackOffice</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>
  </body>
</html>
