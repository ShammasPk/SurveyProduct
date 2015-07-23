<?php

error_reporting(E_ALL);

class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "admin";
	private $dbname   = "survey";
	private $condb    = "";

	public function __construct($host, $user, $pword, $db) {
		$this->hostname = $host;
		$this->username = $user;
		$this->password = $pword;
		$this->dbname   = $db;
		$this->connect();
	}

	// Create connection
	private function connect() {
		//return new mysqli($this->$serv, $this->user, $this->password, $this->database);
		$this->condb = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if ($this->condb->connect_error) {
			die('connect_error('.$this->condb->connect_errorno.')'.$this->condb->connect_errorno);
		}

	}

	// insert into tablename (username,password) values (?,?);
	// insert into tablename (username,password) values ('dfsfa','dfsafds');
	public function insert($table, $fields, $values) {
		$insert = "INSERT INTO ".$table;
		//check table data
		if ($fields != null) {
			//echo fields(create string format)
			$fields = '`'.implode('`, `', $fields).'`';
			$insert .= " (".$fields.")";

		}

		$cnt   = count($values);
		$value = str_repeat("?,", $cnt-1).'?';
		$insert .= " VALUES (".$value.")";

		$value_type = "";

		for ($i = 0; $i < $cnt; $i++) {
			if (is_string($values[$i])) {
				$value_type .= "s";
			} else {
				$value_type .= "i";
			}

		}

		//var_dump($insert);

		$stmt = $this->condb->prepare($insert);
		//bind values using bind param
		$params[0] = &$value_type;
		foreach ($values as $key => $value) {
			$params[$key+1] = &$values[$key];

		}
		call_user_func_array(array(&$stmt, 'bind_param'), $params);
		// $stmt ->bind_param($value_type,$values[0],$values[1]);
		// $stmt ->bind_param($value_type,$values[]);
		$stmt->execute();

		/*
		if ($stmt===FALSE)
		{
		echo "error";
		}
		else
		{
		echo "one created,value inserted";
		}*/
		//$stmt->bind_param("");

		//var_dump($insert);
	}

	public function select($table, $fields, $where) 
	{
		$count  = count($fields);
		$fields = implode(',', $fields);
		$select = "SELECT ";

		if ($fields == null) {
			$select .= "* FROM ".$table;
		} else {
			$select .= $fields." FROM ".$table;
		

			if ($where != null) {
				$select .= " WHERE ".$where[0]."=";
				if (is_string($where[1]))
				{
					$select .= "'".$where[1]."'";
				}

			}
		}


		$query = mysqli_query($this->condb, $select);
		if ($query === FALSE) {
			return user_error($this->condb->error);
		}

		$recs = array();
		while (($rec = mysqli_fetch_array($query)))
		array_push($recs, $rec);
		//var_dump($recs);
		//echo $rec;
		return $recs;
		
	}

	public function random_select($table, $fields, $where) {
		$count= count($fields);
		$fields=implode(',',$fields);
		$select="SELECT ";

		if($fields==null)
		{
			$select.="* FROM " .$table;
		}
		else
		{
			$select.=$fields ." FROM ".$table;
		}

		if($where!=null)
		{
			$select.=" WHERE ".$where[0]. "= ";
			if (is_string($where[1]))
			{
				$select.= "'" .$where[1]. "'";
			}
		
		}
		$select .=" ORDER BY RAND() LIMIT 5";


		//var_dump($select);

		$query = mysqli_query($this->condb, $select);
		if ($query === FALSE) {
			return user_error($this->condb->error);
		}

		$recs = array();
		while (($rec = mysqli_fetch_array($query)))
		array_push($recs, $rec);
		//echo $rec;
		return $recs;
		
	}

	public function update($table, $fields, $values, $where) {
		$update = " UPDATE ".$table." SET ";

		//foreach ($fields as $value)
		$count = count($fields);
		for ($i = 0; $i < $count; $i++) {
			$cnt = count($fields);
			$update .= $fields[$i]." = ? ";
			if ($i != $count-1) {

				$update .= ',';
			}
		}

		$fields = implode(',', $fields);
		$update .= " WHERE ".$where;


		$type = "";
		for ($i = 0; $i < $count; $i++) {
			if (is_string($values[$i])) {
				$type .= "s";
			} else {
				$type .= "i";
			}

		}
		/* var_dump($type);
		var_dump($values);*/
		//var_dump($update);

		$stmt = $this->condb->prepare($update);
		//  $type='sss';
		$param[0] = &$type;
		foreach ($values as $key => $value) {
			$param[$key+1] = &$values[$key];
		}
		call_user_func_array(array(&$stmt, 'bind_param'), $param);
		//$stmt->bind_param($type, $values);
		$stmt->execute();
		return true;

	}

	public function delete($table, $where) 
	{
		
			$delete = "DELETE FROM ".$table." WHERE ".$where;
			
			//var_dump($delete);
			
			//$this->condb->query($delete);
			$delete=mysqli_query($this->condb,$delete);
			if ($this->condb->affected_rows > 0) {
				return true;
			}
			return false;
		
	}

	public function adminselect($table,$field,$condition)
	{
		$set='';
		if( $field!=null)
		{
			$field=implode(',',$field);
 			$set.=" $field";
		} 
		if($condition!=null){

		$condition=implode(',',$condition);
		}
		$sql="SELECT $set FROM $table WHERE $condition";
		//var_dump($sql);
		$result=mysqli_query($this->condb,$sql);
		if ($result == false) 
		{
			trigger_error($this->db->error);
		}
		//return ;
			$array=array();
			
    	while($row=mysqli_fetch_array($result) )
		{

			array_push($array, array_values($row));
			//var_dump($array);
			return $array;
			
    		/*echo "<br><tr><td>". "  </td><td>" . $row["UserName"]. "   </td><td>" . $row["email"]."   </td><td>" .$row["Password"] . "<br></td></tr>";*/
		}
	}
	public function adminupdate($table, $field,$where,$values){
		$sql="UPDATE ".$table ." SET " ;
		$set = '';
		$x=1;
		$cnt=count($field);
		for ($i=0;$i < $cnt; $i++){
			$sql.=$field[$i]."=?";
			if($i!=$cnt-1)
			{
				$sql.=',';
			}
		}
		$sql.=" WHERE ". $where;
		//var_dump($sql);
		$type="";

		for ($i=0; $i <$cnt ; $i++) { 
			if (is_string($values[$i]))  {
				$type.="s";
			}else
				$type.="i";
		}
		//var_dump($sql);
		$update=$this->condb->prepare($sql); 
			 //var_dump($update);
		$param[0]=&$type;
		foreach ($values as $key => $field) {
			$param[$key+1]=&$values[$key];
		}
		call_user_func_array(array(&$update,'bind_param'), $param);

		
		$update->execute();
		return true;
		
	}
}

//$db= new Database('localhost','root','admin','survey');
// $db->insert();
//$table_name="questionCategory";
/*$fields=array("typeid","type");
$values=array("2","sadfghs");
$db->insert($table_name, $fields, $values);*/

/*$fields=array("");
$where=array("catid","1");
$result=$db->select($table_name,$fields,$where);
var_dump($result);
 */
//$where="id=8";
// $fields=array("name='AA'","address='SS'");

// $db->update($table_name, $fields, $values, $where);
/*$table_name='questionCategory';
$db->delete($table_name,'catid=8');*/

?>
