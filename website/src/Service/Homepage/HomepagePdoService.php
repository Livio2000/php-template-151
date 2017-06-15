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
		$sql = "SELECT * FROM post";
		$result = $this->pdo->query($sql);
		return $result;
	}
}