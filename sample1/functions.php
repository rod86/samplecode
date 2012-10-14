<?php

/**
 * Created in 2008
 * 
 * Functions file that contains all type of functions like database operations, url generator, form fields generator, ...
 */

/******************************************************
***	FORMS					***				
*******************************************************/

function combobox($name,$class,$atr,$elements,$selected=''){
	$atrib=array();
	if (!empty($atr)){
		foreach ($atr as $key=>$value){
			$atrib[]=$key.'="'.$value.'"';	
		}
		$atr=implode(" ",$atrib);
	}
	$select="<select name=\"$name\" id=\"$name\" class=\"$class\" $atr>";
	foreach ($elements as $value=>$name){
		if ($value==$selected) $sel="selected";
		else $sel="";
		
		$select.="<option value=\"".$value."\" $sel>".$name."</option>";
	}
	$select.="</select>";
	return $select;
}


/******************************************************
***					DATABASE					***				
*******************************************************/

function getRow($tabla,$id="",$idname='id')
{
	if ($id!="")
	{
		if ($id=="")
		{
			$sql="select * from ".$tabla;
		}
		else
		{
			$sql="select * from ".$tabla." where ".$idname."=".$id;
		}
		
		$con=mysql_query($sql);
		$res=mysql_fetch_assoc($con);
		return $res;
	}	
}

function insert($tabla,$campos){
	$fields=array();
	$values=array();
	foreach ($campos as $f=>$v)
	{
		$fields[]="`".$f."`";
		$values[]="'".mysql_real_escape_string($v)."'";
	}
	$sql= "INSERT INTO ".$tabla." (".implode(", ",$fields).") VALUES (".implode(", ",$values).")";
	//echo $sql."<br>";die();
	if (!mysql_query($sql)){
		echo "<script>alert('Error al insertar datos en $tabla');</script>";
		return false;
	}else return true;		
}

function update($tabla,$campos,$where){
	
	$fields=array();
	$values=array();
	foreach ($campos as $f=>$v)
	{
		$fields[]="`".$f."`='".mysql_real_escape_string($v)."'";	
	}
	
	$cl=array();
	foreach($where as $f=>$v){
		$cl[]="`".$f."`='".mysql_real_escape_string($v)."'";
	}
	
	$sql="UPDATE ".$tabla." SET ".implode(", ",$fields);
	
	if (!empty($where)) $sql.=" WHERE ".implode(" and ",$cl);
		
	//echo $sql."<br>";
	if (!mysql_query($sql)){
		echo "<script>alert('Error al actualizar datos en $tabla');</script>";
		return false;
	}else return true;		
}


/******************************************************
***					UTILS				***				
*******************************************************/

function setURL($script="",$par=array()){

	if (empty($script)) $script=basename($_SERVER['SCRIPT_NAME']);

	$get=array();
	foreach ($_GET as $key=>$value){
		if (!empty($value)) $get[$key]=$key."=".$value;		
	}
	
	foreach ($par as $key=>$value){
		if (!empty($value))	$get[$key]=$key."=".$value;
		else unset($get[$key]);		
	}
	
	$url=$script."?".implode("&",$get);	
	return $url;
}

?>