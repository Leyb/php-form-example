<?php
namespace classes\DAO;
require_once '\personalInfo.php';


use classes\model\companies;
/**
 * Description of companiesDAO
 *
 * @author daniel
 */
class companiesDAO {
    
    	private $tableName;
	/**
	 * 
	 */
	public function __construct() {
		$this->tableName = "companies";
	}
        
        //is this the right way to do it? it seems to me that it doesn't use MVC at all
        public function getEveryone() {
//            $company = new $companies();
//            
//            $id = $company->getId();

            try {
                $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                
                $stmt = $conn->query('SELECT * FROM ' . $this->tableName);
                $count = 0;
                while($ans = $stmt->fetch()) {
                    $row[$count] = $ans;
                    $count++;
                }
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
            //returns an array of every row
            return $row;
        }
        public function getSomeone($whereClause, $whereValue) {
            $company = new $companies();
            
            $id = $company->getId();

            try {
                $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                
                $stmt = $conn->query('SELECT * FROM ' . $this->tableName . 'where '
                                         . $whereClause . ' = ' . $whereValue);
                
                //this work with where clause?
                $count = 0;
                while($ans = $stmt->fetch()) {
                    $row[$count] = $ans;
                    $count++;
                }
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
            
            return ;
        }
	
    
}
