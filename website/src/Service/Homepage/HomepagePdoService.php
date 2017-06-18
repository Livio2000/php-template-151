<?php
namespace livio\Service\Homepage;

class HomepagePdoService implements  HomepageService
{
	/**
	 *  @ var \PDO
	 */
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAllPost()
	{	
		try {
			//$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $this->pdo->prepare("Select * FROM post");
			$stmt->execute();
			
			if($stmt->rowCount() === 1)
			{
				return $stmt;
			}
			else
			{
				return false;	
			}
		}
		catch(PDOException $e) {
			return "Error: " . $e->getMessage();
		}
		
		
		
		/*$sql = "SELECT * FROM post";
		$result = $this->pdo->query($sql);
		return $result;*/
	}
}