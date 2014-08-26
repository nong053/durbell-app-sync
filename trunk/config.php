<?php
$conn=odbc_connect('SmartVanDB_HQPromTest2','dba','sql');
//odbc_exec($conn,'SET NAMES UTF8');


function checkAlreadyId($conn,$sql){
		
		$rs=odbc_exec($conn,$sql);
		if (!$rs) {
		    exit("Error in SQL");
		}else{
			$num=odbc_fetch_row($rs);
			if($num){
			return"Already-Id";
			}else{
			return"Empty-Id";
			}
		}
		odbc_close($conn);
	}

?>