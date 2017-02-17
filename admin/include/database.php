
<?php
require_once 'include/config.php';
class database
{
	var $_sql = '';
	var $_pdo = NULL;
	var $_cursor = '';
	// xay dung ham khoi tao cho clas
	public function database ()
	{
             try
		{
                    $this->_pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
                    if(!$this->_pdo)
                    {
                            echo 'khong the ket noi du lieu';exit;
                    }
                    $this->_pdo->query("set names utf8");
                }catch(PDOException $ex)
		{
			echo $ex->getMessage();
			die();	
		}
	}
	//xay dung phuong thuc thuc thi cau truy van
	public function setQuery($sql) 
	{
		return $this->_sql=$sql;
	}
	//kiem tra cau truy van truyen tham so kieu '?'
	public function query($option=array())
	{
//		select * from tenbang where id=? and ten=? neu ?   bindparam(vitri i [1->])
// id=:id and ten=:ten   -> bindparam(':id',giatri)
		$this->_cursor=$this->_pdo->prepare($this->_sql);
		if($option)
		{
			for($i=0;$i<count($option);$i++)
			{
				$this->_cursor->bindParam($i+1,$option[$i]);
			}
		}
		return $this->_cursor->execute();
	}
		//	xay dung cac phuong thuc lay hoac dong can thiet
		public function loadObjectList($option=array())
		{
			if($option)
			{
				$this->query($option);
				return $this->_cursor->fetchAll(PDO::FETCH_OBJ);
			
			}
			else
			{
					$this->query();
				return $this->_cursor->fetchAll(PDO::FETCH_OBJ);
			
			}
		}
		public function loadOject($option=array())
		{
			if($option)
			{
				$this->query($option);
				return $this->_cursor->fetchAll(PDO::FETCH_OBJ);
			
			}
			else
			{
					$this->query();
				return $this->_cursor->fetchAll(PDO::FETCH_OBJ);
			
			}
		}
		public function loadrow_fetcharray($option=array()) {
                    if($option)
			{
				$this->query($option);
				return $this->_cursor->fetch(PDO::FETCH_ASSOC);
			
			}
			else
			{
					$this->query();
				return $this->_cursor->fetch(PDO::FETCH_ASSOC);
			
			}
                }
		
		
                
                //Function execute the query 
                public function execute($options=array()) {
                    $this->_cursor = $this->_dbh->prepare($this->_sql);
                    if($options) {  //If have $options then system will be tranmission parameters
                        for($i=0;$i<count($options);$i++) {
                            $this->_cursor->bindParam($i+1,$options[$i]);
                        }
                    }
                    $this->_cursor->execute();
                    return $this->_cursor;
                }

                //Funtion load datas on table
                public function loadAllRows($options=array()) {
                    if(!$options) {
                        if(!$result = $this->execute())
                            return false;
                    }
                    else {
                        if(!$result = $this->execute($options))
                            return false;
                    }
                    return $result->fetchAll(PDO::FETCH_OBJ);
                }

                //Funtion load 1 data on the table
                public function loadRow($option=array()) {
                    if(!$option) {
                        if(!$result = $this->execute())
                            return false;
                    }
                    else {
                        if(!$result = $this->execute($option))
                            return false;
                    }
                    return $result->fetch(PDO::FETCH_OBJ);
                }
				
				

                //Function count the record on the table
                public function loadRecord($option=array()) {
                    if(!$option) {
                        if(!$result = $this->execute())
                            return false;
                    }
                    else {
                        if(!$result = $this->execute($option))
                            return false;
                    }
                    return $result->fetch(PDO::FETCH_COLUMN);
                }
		
		public function getLastID()
		{
			return $this->_pdo->lastInsertId();
			
		}
		public function disconnect()
		{
			$this->_pdo = NULL;
		}
}

?>