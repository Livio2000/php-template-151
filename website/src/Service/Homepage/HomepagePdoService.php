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
	}
}