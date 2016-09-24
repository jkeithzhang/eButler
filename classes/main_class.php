<?php
####################################################################
#	File Name	:	main_class.php
#	Location	: 	WEBROOT/classes/
####################################################################

if (!defined('DOC_ROOT'))
	define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT'].'/ebutler/');

if (!defined('ERR_LOG_FILE'))
	define("ERR_LOG_FILE", DOC_ROOT."err_log.txt");

class dbClass {
	 /**********************************************************************
	 # FUNCTION TO INSERT INTO A SCHEMA
	 **********************************************************************/
	 public function insertSchema($schemaName, $fieldsList, $valuesList) {
		try { 
			global $pdoConObj;

			$queryString	=	"";
			$schemaPrfx		=	"tbl_";
			$schemaName		=	$schemaPrfx.$schemaName;
			$errorMessage	=	"";
			$insertedID		=	"";
			
			$insertQry		=	"INSERT INTO {$schemaName} ($fieldsList) VALUES ($valuesList)";
			//echo "Query String :".$insertQry;
			$insertStatement=	$pdoConObj->prepare($insertQry);
			$insertStatement->execute();
			$insertedID	   .=	$pdoConObj->lastInsertId();
		} catch(PDOException $e) {
			$errorMessage	.= "\n***************************************";
			$errorMessage	.=  "\n Error Date :".date("M-j-Y D, h:i:s A");
			$errorMessage	.=	"\n Error While executing  INSERT Query Over :".$schemaName;
			$errorMessage	.=	"\n QUERY :: ".$insertQry;
			$errorMessage	.=	"\n MESSAGE :".$e->getMessage();
			$errorMessage	.=	"\n CODE :".$e->getCode();
			$errorMessage	.=	"\n FILE :".$e->getFile();
			$errorMessage	.=	"\n LINE :".$e->getLine();
			
			logClass::printLog($errorMessage);			
			//error_log($errorMessage, 3, ERR_LOG_FILE);
		}
		
		if($insertedID)
			return $insertedID;
		else
			return 0;
			
	}

	/**********************************************************************
	 # FUNCTION TO RETRIEVE INFORMATION FROM A SCHEMA
	**********************************************************************/
	public function getSchemaInfo($schemaName, $columnsList, $whereCondition, $groupByField, $orderByField, $sortDirection, $limit) {
		try {
				global $pdoConObj;
				$queryString	=	"";				
				$resultCount	=	"";
				$schemaPrefix	=	"tbl_";				
				$schemaName		=	$schemaPrefix.$schemaName;
				
				$queryString	=	"SELECT ".$columnsList. " FROM ".$schemaName;
				
				$queryString	.=	($whereCondition == '')?'':" WHERE ".$whereCondition;
				
				$queryString	.=	($groupByField == '')?'':' GROUP BY '.$groupByField;
				
				$queryString	.=	($orderByField == '')?'':' ORDER BY '.$orderByField;
				
				$queryString	.=	($sortDirection == '')? ' ': ' '.$sortDirection;
				
				$queryString	.=	($limit == '')?'':' LIMIT '.$limit;
				
				//echo "<br>Query String :".$queryString;
				//error_log($queryString, 3, ERR_LOG_FILE);
				
				$preparedStatement	=	$pdoConObj->prepare($queryString);
				
				$preparedStatement->execute();
				
				$resultCount	=	$preparedStatement->rowCount();
		} catch(Exception $e) { 
			$errorMessage	=	"";
			$errorMessage	.= "\n***************************************";
			$errorMessage	.=  "\n Error Date :".date("M-j-Y D, h:i:s A");
			$errorMessage	.=	"\n Error While executing  SELECT Query Over :".$schemaName;
			$errorMessage	.=	"\n QUERY :: ".$queryString;
			$errorMessage	.=	"\n MESSAGE :".$e->getMessage();
			$errorMessage	.=	"\n CODE :".$e->getCode();
			$errorMessage	.=	"\n FILE :".$e->getFile();
			$errorMessage	.=	"\n LINE :".$e->getLine();

			logClass::printLog($errorMessage);
		}

		if($resultCount) {
			$resultsList	=	$preparedStatement->fetchAll(PDO::FETCH_ASSOC);
			return $resultsList;
		} else
			return NULL;
	}	
}

?>