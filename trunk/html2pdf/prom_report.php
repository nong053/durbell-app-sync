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

if($paramPromType=="DCI"){
	$titleReport="Discount Promotion By Item Report";
}else if($paramPromType=="DCG"){
	$titleReport="Discount Promotion By Group Report";
}else if($paramPromType=="DCB"){
	$titleReport="Discount Promotion By Buddle Report";
}


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
			  $PromType=iconv("tis-620", "utf-8",odbc_result($rs,"PromType"));
			  $PromNo=iconv("tis-620", "utf-8",odbc_result($rs,"PromNo"));
			  $PromDesc=iconv("tis-620", "utf-8",odbc_result($rs,"PromDesc"));
			  $StartDate=iconv("tis-620", "utf-8",odbc_result($rs,"StartDate"));
			  $EndDate=iconv("tis-620", "utf-8",odbc_result($rs,"EndDate"));
		 }
		 odbc_close($conn);
	}
/*select PromHeader end*/
/*select PromOfShopType start*/
$sqlShopType="SELECT post.*,st.ShopTypeName FROM PromOfShopType post 
left join ShopType st 
on post.ShopTypeCode=st.ShopTypeCode
WHERE PromNo='$paramPromNo'
and PromType='$paramPromType' ";

$shopType="";
	$rsShopType=odbc_exec($conn,$sqlShopType);
	if (!$rsShopType) {
	  exit("Error in SQL");
	}else{
		$i=0;
		 while (odbc_fetch_row($rsShopType)) {
			  $PromType=iconv("tis-620", "utf-8",odbc_result($rsShopType,"PromType"));
			  $PromNo=iconv("tis-620", "utf-8",odbc_result($rsShopType,"PromNo"));
			  $ShopTypeCode=iconv("tis-620", "utf-8",odbc_result($rsShopType,"ShopTypeCode"));
			  $ShopTypeName=iconv("tis-620", "utf-8",odbc_result($rsShopType,"ShopTypeName"));
			
			  if($i==0){
				  if($ShopTypeCode=="All"){
					$shopType="All Shop Type";
				  }else{
					$shopType.=$ShopTypeCode."-".$ShopTypeName;
				  }
			  }else{
				 $shopType.=",".$ShopTypeCode."-".$ShopTypeName;
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
$salesTeam="";

	$rsSalesTeam=odbc_exec($conn,$sqlSalesTeam);
	if (!$rsSalesTeam) {
	  exit("Error in SQL");
	}else{
		$i=0;
		 while (odbc_fetch_row($rsSalesTeam)) {
			  $PromType=iconv("tis-620", "utf-8",odbc_result($rsSalesTeam,"PromType"));
			  $PromNo=iconv("tis-620", "utf-8",odbc_result($rsSalesTeam,"PromNo"));
			  $SalesTeam=iconv("tis-620", "utf-8",odbc_result($rsSalesTeam,"SalesTeam"));
			  if($i==0){
				 if($SalesTeam=="All"){
				  $salesTeam="All Sales Team";
				 }else{
				 $salesTeam.=$SalesTeam;
				 }
			  }else{
				 $salesTeam.=",".$SalesTeam;
			  }
			 
			  $i++;
		 }
		 odbc_close($conn);
	}
/*select PromOfShopType end*/

/*select PromOfBranch start*/
$sqlBranchCode="SELECT pob.*,b.BranchName FROM PromOfBranch pob
left join Branch b
on pob.BranchCode=b.BranchCode
WHERE PromNo='$paramPromNo'
and PromType='$paramPromType' ";

$branch="";
	$rsBranchCode=odbc_exec($conn,$sqlBranchCode);
	if (!$rsBranchCode) {
	  exit("Error in SQL");
	}else{
		$i=0;
		 while (odbc_fetch_row($rsBranchCode)) {
			  $PromType=iconv("tis-620", "utf-8",odbc_result($rsBranchCode,"PromType"));
			  $PromNo=iconv("tis-620", "utf-8",odbc_result($rsBranchCode,"PromNo"));
			  $BranchCode=iconv("tis-620", "utf-8",odbc_result($rsBranchCode,"BranchCode"));
			  $BranchName=iconv("tis-620", "utf-8",odbc_result($rsBranchCode,"BranchName"));
			  if($i==0){
				  if($BranchCode=="All"){
				  $branch="All Branch";
				  }else{
				  $branch.=$BranchCode."-".$BranchName;
				  }
			  }else{
				 $branch.=",".$BranchCode."-".$BranchName;
			  }
			 
			  $i++;
		 }
		 odbc_close($conn);
	}
/*select PromOfShopType end*/






/*########################### select promotion start #########################*/
$htmlData='';

$sqlPromItem="SELECT pit.*,it.ItemDesc,ps.Step as Step,ps.BreakQty as BreakQty ,
ps.BreakUnitCode as BreakUnitCode,ps.BreakUnitFactor as BreakUnitFactor,
ps.BreakAmt as BreakAmt,ps.DiscBaht as DiscBaht,ps.PromStepNote as PromStepNote,ps.DiscPer as DiscPer
from PromItem pit
left join PromStep ps  on pit.PromType=ps.PromType 
and pit.PromNo=ps.PromNo
and pit.PromCode=ps.PromCode
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
			  $PromType=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"PromType"));
			  $PromNo=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"PromNo"));
			  $PromCode=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"PromCode"));
			  $ItemDesc=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"ItemDesc"));
			  $BreakBy=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"BreakBy"));
			  $DiscFor=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"DiscFor"));
			  $LimitFreeQty=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"LimitFreeQty"));
			  $FreeUnitCode=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"FreeUnitCode"));
			  $LimitDiscBaht=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"LimitDiscBaht"));

              /*
			  (Q-Quanlity A-Amonut LQ-Loop Quanlity LA-Loop Amonut)
			  (B-Baht P-Percent LB-Loop Baht LP-Loop Percent) 
			  */

			  if($BreakBy=="A" or $BreakBy=="LA"){
				  $BreakAmt=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"BreakAmt"));
				  $Break=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"BreakAmt"));
				  
			  }else{

				  $BreakQty=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"BreakQty"));
				  $Break=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"BreakQty"));
				 
			  }

			  if($DiscFor=="B" or $DiscFor=="LB"){
				  $DiscBaht=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"DiscBaht"));
				  $Disc=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"DiscBaht"));
				  
			  }else{

				  $DiscPer=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"DiscPer"));
				  $Disc=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"DiscPer"));
				 
			  }



			   $BreakUnitCode=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"BreakUnitCode"));
			   $BreakUnitFactor=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"BreakUnitFactor"));
			   $Step=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"Step"));
			  
			  
			  
			  $PromStepNote=iconv("tis-620", "utf-8",odbc_result($rsPromItem,"PromStepNote"));
			 


			  
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
			$htmlData.='<td width="30" style="text-align:right; ">';
			$htmlData.= $Step.'';
			$htmlData.='</td>';
			$htmlData.='<td width="35"  style="text-align:right;">';
			$htmlData.=$Break.'';
			$htmlData.='</td>';
			$htmlData.='<td >';
			$htmlData.=$BreakUnitCode.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.= $BreakBy.'';
			$htmlData.='</td>';
			$htmlData.='<td>';
			$htmlData.=$DiscFor.'';
			$htmlData.='</td>';
			$htmlData.='<td style="text-align:right;">';
			$htmlData.=$DiscPer.'';
			$htmlData.='</td>';
			$htmlData.='<td style="text-align:right;"> ';
			$htmlData.=$LimitFreeQty.'';
			$htmlData.='</td>';
			$htmlData.='<td style="text-align:right;">';
			$htmlData.=$Disc.'';
			$htmlData.='</td>';
			
			
 		


	

		

			  $sqlStepFreeItem="SELECT psft.*,Item.ItemDesc as ItemDesc,Unit.UnitName from PromStepFreeItem  psft
left join Item on psft.FreeItemCode = Item.ItemCode
inner join Unit on Unit.UnitCode=psft.FreeUnitCode
where PromType='$PromType'
AND PromNo='$PromNo'
AND Step='$Step'
AND PromCode='$PromCode'";

			 $rsStepFreeItem=odbc_exec($conn,$sqlStepFreeItem);
			 
			 $num=odbc_fetch_row($rsStepFreeItem);
			 if($num){
			 }else{
			 $htmlData.='<td  width="30">';
							
							$htmlData.='</td>';
							$htmlData.='<td> ';
							
							$htmlData.='</td>';
							$htmlData.='<td width="80">';
							
							$htmlData.='</td>';
							$htmlData.='<td>';
							
							$htmlData.='</td> ';
							$htmlData.='<td  width="35">';
							
							$htmlData.='</td>';
						$htmlData.='</tr>';
			 }
			 
			 if (!$rsStepFreeItem) {
			  exit("Error in SQL");
			 }else{
					$i=1;
					 while (odbc_fetch_row($rsStepFreeItem)) {
					  $PromType=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"PromType"));
					  $PromNo=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"PromNo"));
					  $PromCode=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"PromCode"));
					  $Step=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"Step"));
					  $FreeItemCode=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"FreeItemCode"));
					  $ItemDesc=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"ItemDesc"));
					  $FreeQty=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"FreeQty"));
					  $UnitName=iconv("tis-620", "utf-8",odbc_result($rsStepFreeItem,"UnitName"));
					  
					 // echo "level 3 FreeItemCode=".$FreeItemCode."<br>";
					
						if($i==1){
							
							$htmlData.='<td width="30" style="text-align:right;">';
							$htmlData.=$i.'';
							$htmlData.='</td>';
							$htmlData.='<td > ';
							$htmlData.=$FreeItemCode.'';
							$htmlData.='</td>';
							$htmlData.='<td width="80">';
							$htmlData.=$ItemDesc.'';
							$htmlData.='</td>';
							$htmlData.='<td style="text-align:right;">';
							$htmlData.=$FreeQty.'';
							$htmlData.='</td> ';
							$htmlData.='<td width="35">';
							$htmlData.=$UnitName.'';
							$htmlData.='</td>';
						$htmlData.='</tr>';
							
						}else{

							$htmlData.='<tr  style="text-align:left;">';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td width="80">'.''.'</td>';
								$htmlData.='<td width="30">'.''.'</td>';
								$htmlData.='<td width="35">'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td >'.''.'</td>';
								$htmlData.='<td width="30" style="text-align:right;">';
								$htmlData.=$i.'';
								$htmlData.='</td>';
								$htmlData.='<td> ';
								$htmlData.=$FreeItemCode.'';
								$htmlData.='</td>';
								$htmlData.='<td width="80">';
								$htmlData.=$ItemDesc.'';
								$htmlData.='</td>';
								$htmlData.='<td style="text-align:right;">';
								$htmlData.=$FreeQty.'';
								$htmlData.='</td> ';
								$htmlData.='<td width="35">';
								$htmlData.=$UnitName.'';
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

<div class="title" style="text-align:center"><h3>'.$titleReport.'</h3></center>
<div class="date" style="text-align:center">Date :     '.date("Y/m/d H:i:s").'</div>

<table >
	<tr>
		<td colspan="6">&nbsp;</td>
	</tr>
	<tr>
		<td width="80">
			<div style="text-align:left;">
				<b>
				Promotion No:
				</b>
			</div>
		</td>
		<td width="80">
			<div style="text-align:left;">
			
				'.$PromNo.' 
			</div>
		</td>
		
		<td  width="115">
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
		<td width="80">
			<div style="text-align:left;">
				<b>
				Branch:
				</b>
			</div>
		</td>
		<td colspan="5" >
			<div style="text-align:left;">
				'.$branch.'
			</div>
		</td>
	</tr>
	<tr>
		<td width="80">
		<div style="text-align:left;">
			<b>
			Sales Team:
			</b>
		</div>
		</td>
		<td colspan="5" >
			<div style="text-align:left;">
				'.$salesTeam.'
			</div>
		</td>
	</tr>
	<tr>
		<td width="80">
			<div style="text-align:left;">
			<b>
				Shop Type:
			</b>
			</div>
		</td>
		<td colspan="5" >
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
		<tr style="text-align:center; font-weight:bold; border:1px #cccccc solid" >
			<th>
			
			Item Code
			
			</th>
			<th width="80">
			Item Description
			</th>
			<th width="30">
			Step
			</th>
			<th  width="35">
			Break
			</th>
			<th>
			Break Uint
			</th>
			<th>
			Break By
			</th>
			<th>
			Discount For
			</th>
			<th> 
			Discount  
			</th>
			<th> 
			Limit Free 
			</th>
			<th>
			Limit Discount 
			</th>
			<th  width="30">
			Seq
			</th>
			<th> 
			Free Item Code
			</th>
			<th  width="80">
			Description 
			</th>
			<th>
			Free Qty
			</th> 
			<th  width="35">
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
