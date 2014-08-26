<?php
require_once("setPDF.php");



// เพิ่มหน้าใน PDF 
$pdf->AddPage();

// กำหนด HTML code หรือรับค่าจากตัวแปรที่ส่งมา
//	กรณีกำหนดโดยตรง
//	ตัวอย่าง กรณีรับจากตัวแปร
// $htmlcontent =$_POST['HTMLcode'];


include_once("../config.php");
$paramPromNo=$_GET['paramPromNo'];
$paramPromType=$_GET['paramPromType'];
$htmlShowData="";

/*select PromHeader start*/
$sql="SELECT * FROM PromHeader 
WHERE PromNo='$paramPromNo'
and PromType='$paramPromType' ";


	$rs=odbc_exec($conn,$sql);
	if (!$rs) {
	  exit("Error in SQL");
	}else{
		 while (odbc_fetch_row($rs)) {
			  $PromType=odbc_result($rs,"PromType");
			  $PromNo=odbc_result($rs,"PromNo");
			  $PromDesc=odbc_result($rs,"PromDesc");
			  $StartDate=odbc_result($rs,"StartDate");
			  $EndDate=odbc_result($rs,"EndDate");
		 }
		 odbc_close($conn);
	}
/*select PromHeader end*/
/*select PromOfShopType start*/
$sqlShopType="SELECT * FROM PromOfShopType 
WHERE PromNo='$paramPromNo'
and PromType='$paramPromType' ";

$shopType="";
	$rsShopType=odbc_exec($conn,$sqlShopType);
	if (!$rsShopType) {
	  exit("Error in SQL");
	}else{
		$i=0;
		 while (odbc_fetch_row($rsShopType)) {
			  $PromType=odbc_result($rsShopType,"PromType");
			  $PromNo=odbc_result($rsShopType,"PromNo");
			  $ShopTypeCode=odbc_result($rsShopType,"ShopTypeCode");
			  if($i==0){
				 $shopType.=$ShopTypeCode;
			  }else{
				 $shopType.=",".$ShopTypeCode;
			  }
			 
			  $i++;
		 }
		 odbc_close($conn);
	}
/*select PromOfShopType end*/

/*select PromOfSalesTeam start*/
$sqlSalesTeam="SELECT * FROM PromOfSalesTeam 
WHERE PromNo='$paramPromNo'
and PromType='$paramPromType' ";


	$rsSalesTeam=odbc_exec($conn,$sqlSalesTeam);
	if (!$rsSalesTeam) {
	  exit("Error in SQL");
	}else{
		$i=0;
		 while (odbc_fetch_row($rsSalesTeam)) {
			  $PromType=odbc_result($rsSalesTeam,"PromType");
			  $PromNo=odbc_result($rsSalesTeam,"PromNo");
			  $SalesTeam=odbc_result($rsSalesTeam,"SalesTeam");
			  if($i==0){
				 $SalesTeam.=$SalesTeam;
			  }else{
				 $SalesTeam.=",".$SalesTeam;
			  }
			 
			  $i++;
		 }
		 odbc_close($conn);
	}
/*select PromOfShopType end*/

/*select PromOfBranch start*/
$sqlBranchCode="SELECT * FROM PromOfBranch 
WHERE PromNo='$paramPromNo'
and PromType='$paramPromType' ";


	$rsBranchCode=odbc_exec($conn,$sqlBranchCode);
	if (!$rsBranchCode) {
	  exit("Error in SQL");
	}else{
		$i=0;
		 while (odbc_fetch_row($rsBranchCode)) {
			  $PromType=odbc_result($rsBranchCode,"PromType");
			  $PromNo=odbc_result($rsBranchCode,"PromNo");
			  $BranchCode=odbc_result($rsBranchCode,"BranchCode");
			  if($i==0){
				 $BranchCode.=$BranchCode;
			  }else{
				 $BranchCode.=",".$BranchCode;
			  }
			 
			  $i++;
		 }
		 odbc_close($conn);
	}
/*select PromOfShopType end*/

/*select detail promotion start*/
$sqlBranchCode="SELECT * FROM PromOfBranch 
WHERE PromNo='$paramPromNo'
and PromType='$paramPromType' ";


	$rsBranchCode=odbc_exec($conn,$sqlBranchCode);
	if (!$rsBranchCode) {
	  exit("Error in SQL");
	}else{
		$i=0;
		 while (odbc_fetch_row($rsBranchCode)) {
			  $PromType=odbc_result($rsBranchCode,"PromType");
			  $PromNo=odbc_result($rsBranchCode,"PromNo");
			  $BranchCode=odbc_result($rsBranchCode,"BranchCode");
			  if($i==0){
				 $BranchCode.=$BranchCode;
			  }else{
				 $BranchCode.=",".$BranchCode;
			  }
			 
			  $i++;
		 }
		 odbc_close($conn);
	}
/*select detail promotion end*/




/*########################### select promotion start #########################*/
$htmlData='';

$sqlPromItem="SELECT pit.*,it.ItemDesc,ps.Step as Step,ps.BreakQty as BreakQty ,
ps.BreakUnitCode as BreakUnitCode,ps.BreakUnitFactor as BreakUnitFactor,
ps.BreakAmt as BreakAmt,ps.DiscBaht as DiscBaht,ps.PromStepNote as PromStepNote,ps.DiscPer as DiscPer
from PromItem pit
inner join PromStep ps  on pit.PromType=ps.PromType
and pit.PromNo=ps.PromNo
and pit.PromCode=pit.PromCode
left join Item it on pit.PromCode=it.ItemCode
where pit.PromType='$paramPromType'
AND pit.PromNo='$paramPromNo'
";


	$rsPromItem=odbc_exec($conn,$sqlPromItem);
	if (!$rsPromItem) {
	  exit("Error in SQL");
	}else{
		$j=0;
		 while (odbc_fetch_row($rsPromItem)) {
			  $PromType=odbc_result($rsPromItem,"PromType");
			  $PromNo=odbc_result($rsPromItem,"PromNo");
			  $PromCode=odbc_result($rsPromItem,"PromCode");
			  $ItemDesc=odbc_result($rsPromItem,"ItemDesc");
			  $BreakBy=odbc_result($rsPromItem,"BreakBy");
			  $DiscFor=odbc_result($rsPromItem,"DiscFor");
			  $LimitFreeQty=odbc_result($rsPromItem,"LimitFreeQty");
			  $FreeUnitCode=odbc_result($rsPromItem,"FreeUnitCode");
			  $LimitDiscBaht=odbc_result($rsPromItem,"LimitDiscBaht");

              /*
			  (Q-Quanlity A-Amonut LQ-Loop Quanlity LA-Loop Amonut)
			  (B-Baht P-Percent LB-Loop Baht LP-Loop Percent) 
			  */

			  if($BreakBy=="A" or $BreakBy=="LA"){
				  $BreakAmt=odbc_result($rsPromItem,"BreakAmt");
				  $Break=odbc_result($rsPromItem,"BreakAmt");
				  
			  }else{

				  $BreakQty=odbc_result($rsPromItem,"BreakQty");
				  $Break=odbc_result($rsPromItem,"BreakQty");
				 
			  }

			  if($DiscFor=="B" or $DiscFor=="LB"){
				  $DiscBaht=odbc_result($rsPromItem,"DiscBaht");
				  $Disc=odbc_result($rsPromItem,"DiscBaht");
				  
			  }else{

				  $DiscPer=odbc_result($rsPromItem,"DiscPer");
				  $Disc=odbc_result($rsPromItem,"DiscPer");
				 
			  }



			   $BreakUnitCode=odbc_result($rsPromItem,"BreakUnitCode");
			   $BreakUnitFactor=odbc_result($rsPromItem,"BreakUnitFactor");
			   $Step=odbc_result($rsPromItem,"Step");
			  
			  
			  
			  $PromStepNote=odbc_result($rsPromItem,"PromStepNote");
			 


			  
			  // echo  "level 1 PromType=".$PromType." PromNo=".$PromNo." PromCode=".$PromCode."<br>";

		/*
		$htmlData.='<table border="1">';
		$htmlData.='<thead >';
		$htmlData.='<tr style="text-align:left; font-weight:bold; background:#cccccc;" >';
			$htmlData.='<th>';
				$htmlData.='Item Code';
			$htmlData.='</th>';
			$htmlData.='<th width="80">';
				$htmlData.='Item Description';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Step';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Break';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Break Uint';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Break By';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Discount ';
			$htmlData.='</th>';
			$htmlData.='<th> ';
				$htmlData.='Discount For ';
			$htmlData.='</th>';
			$htmlData.='<th> ';
				$htmlData.='Limit Free ';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Limit Discount ';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Seq';
			$htmlData.='</th>';
			$htmlData.='<th> ';
				$htmlData.='Free Item Code';
			$htmlData.='</th>';
			$htmlData.='<th  >';
				$htmlData.='Description ';
			$htmlData.='</th>';
			$htmlData.='<th>';
				$htmlData.='Free Qty';
			$htmlData.='</th> ';
			$htmlData.='<th>';
				$htmlData.='Unit ';
			$htmlData.='</th>';
 		$htmlData.='</tr>';
	$htmlData.='</thead>';
	$htmlData.='<tbody>';
*/
		

		$htmlData.='<tr style="text-align:left;" >';
			$htmlData.='<td>';
			$htmlData.=$PromCode.'';
			$htmlData.='</td>';
			$htmlData.='<td width="80">';
			$htmlData.=$ItemDesc.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.= $Step.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.=$BreakBy.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.=$Break.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.= $BreakUnitCode.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.=$DiscFor.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.=$DiscPer.'';
			$htmlData.='</td>';
			$htmlData.='<td> ';
			$htmlData.=$LimitFreeQty.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.=$Disc.'';
			$htmlData.='</td>';
			
			
 		


	

		

			  $sqlStepFreeItem="SELECT psft.*,Item.ItemDesc as ItemDesc from PromStepFreeItem  psft
left join Item on psft.FreeItemCode = Item.ItemCode
where PromType='DCI'
AND PromNo='$PromNo'
AND Step='$Step'";

			 $rsStepFreeItem=odbc_exec($conn,$sqlStepFreeItem);
			 
			 $num=odbc_fetch_row($rsStepFreeItem);
			 if($num){
			 }else{
			 $htmlData.='<td>';
							
							$htmlData.='</td>';
							$htmlData.='<td> ';
							
							$htmlData.='</td>';
							$htmlData.='<td>';
							
							$htmlData.='</td>';
							$htmlData.='<td>';
							
							$htmlData.='</td> ';
							$htmlData.='<td>';
							
							$htmlData.='</td>';
						$htmlData.='</tr>';
			 }
			 
			 if (!$rsStepFreeItem) {
			  exit("Error in SQL");
			 }else{
					$i=1;
					 while (odbc_fetch_row($rsStepFreeItem)) {
					  $PromType=odbc_result($rsStepFreeItem,"PromType");
					  $PromNo=odbc_result($rsStepFreeItem,"PromNo");
					  $PromCode=odbc_result($rsStepFreeItem,"PromCode");
					  $Step=odbc_result($rsStepFreeItem,"Step");
					  $FreeItemCode=odbc_result($rsStepFreeItem,"FreeItemCode");
					  $ItemDesc=odbc_result($rsStepFreeItem,"ItemDesc");
					  $FreeQty=odbc_result($rsStepFreeItem,"FreeQty");
					  $FreeUnitCode=odbc_result($rsStepFreeItem,"FreeUnitCode");
					  
					 // echo "level 3 FreeItemCode=".$FreeItemCode."<br>";
					
						if($i==1){
							
							$htmlData.='<td>';
							$htmlData.=$i.'';
							$htmlData.='</td>';
							$htmlData.='<td> ';
							$htmlData.=$FreeItemCode.'';
							$htmlData.='</td>';
							$htmlData.='<td>';
							$htmlData.=$ItemDesc.'';
							$htmlData.='</td>';
							$htmlData.='<td>';
							$htmlData.=$FreeQty.'';
							$htmlData.='</td> ';
							$htmlData.='<td>';
							$htmlData.=$FreeUnitCode.'';
							$htmlData.='</td>';
						$htmlData.='</tr>';
							
						}else{

							$htmlData.='<tr  style="text-align:left;">';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td width="80">'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td>';
								$htmlData.=$i.'';
								$htmlData.='</td>';
								$htmlData.='<td> ';
								$htmlData.=$FreeItemCode.'';
								$htmlData.='</td>';
								$htmlData.='<td>';
								$htmlData.=$ItemDesc.'';
								$htmlData.='</td>';
								$htmlData.='<td>';
								$htmlData.=$FreeQty.'';
								$htmlData.='</td> ';
								$htmlData.='<td>';
								$htmlData.=$FreeUnitCode.'';
								$htmlData.='</td>';
							$htmlData.='</tr>';
						}
							
						
					  $i++;
						
					 
					 }//while

				 
				
			 }

			
			 //$htmlData.='</tbody>';
			 //$htmlData.='</table>';
		 }//loop while
		 odbc_close($conn);

		 


	}//if reslult 
	//echo $htmlData;
/*########################### select promotion end #########################*/



$htmlcontent='
<p>

<div class="title" style="text-align:center"><h3>Discount Promotion By Item Report</h3></center>
<div class="date" style="text-align:center">Date :     '.date("Y/m/d H:i:s").'</div>

<table >
	<tr>
		<td colspan="6">&nbsp;</td>
	</tr>
	<tr>
		<td>
			<div style="text-align:left;">
				<b>
				Promotion No:
				</b>
			</div>
		</td>
		<td>
			<div style="text-align:left;">
			
				'.$PromNo.' 
			</div>
		</td>
		
		<td>
			<div style="text-align:left;">
				<b>
				Promotion Description:
				</b>
			</div>
		</td>
		
		<td colspan="3">
			<div style="text-align:left;">
			'.$PromDesc.'      &nbsp;&nbsp;&nbsp;&nbsp;<B>Start Date:</B> '. $StartDate.'   &nbsp;&nbsp;&nbsp;&nbsp;  <B>End Date:</B> '.$EndDate.'
			</div>
		</td>
		
	</tr>
	<tr>
		<td>
			<div style="text-align:left;">
				<b>
				Branch:
				</b>
			</div>
		</td>
		<td colspan="5">
			<div style="text-align:left;">
				'.$BranchCode.'
			</div>
		</td>
	</tr>
	<tr>
		<td>
		<div style="text-align:left;">
			<b>
			Sales Team:
			</b>
		</div>
		</td>
		<td colspan="5">
			<div style="text-align:left;">
				'.$SalesTeam.'
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="text-align:left;">
			<b>
				Shop Type:
			</b>
			</div>
		</td>
		<td colspan="5">
			<div style="text-align:left;">
			'.$shopType.'
			</div>
		</td>
	</tr>
	<tr>
		<td></td><td></td>
	</tr>
</table>


<table border="1">
	<thead >
		<tr style="text-align:left; font-weight:bold; border:1px #cccccc solid" >
			<th>
			<div style="text-align:left;border:1px #cccccc solid;">
			Item Code
			</div>
			</th>
			<th width="80">
			Item Description
			</th>
			<th>
			Step
			</th>
			<th>
			Break
			</th>
			<th>
			Break Uint
			</th>
			<th>
			Break By
			</th>
			<th>
			Discount 
			</th>
			<th> 
			Discount For 
			</th>
			<th> 
			Limit Free 
			</th>
			<th>
			Limit Discount 
			</th>
			<th>
			Seq
			</th>
			<th> 
			Free Item Code
			</th>
			<th>
			Description 
			</th>
			<th>
			Free Qty
			</th> 
			<th>
			Unit 
			</th>
 		</tr>
	</thead>
	<tbody>
'.$htmlData.'
	</tbody>
</table>

</p>';


$htmlcontent=stripslashes($htmlcontent);
$htmlcontent=AdjustHTML($htmlcontent);

// สร้างเนื้อหาจาก  HTML code
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// เลื่อน pointer ไปหน้าสุดท้าย
$pdf->lastPage();

// ปิดและสร้างเอกสาร PDF
$pdf->Output('prom_report.pdf', 'I');
?>


<style>

.textLeft{
	text-align:left;
}
.textRight{
	text-align:right;
}
</style>
