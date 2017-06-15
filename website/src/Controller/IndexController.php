<?php

namespace livio\Controller;

use livio\SimpleTemplateEngine;
use livio\Service\Homepage\HomepageService;

class IndexController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  private $homepageService;
  
  private $pdo;
  
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, HomepageService $homepageService, \PDO $pdo)
  {
     $this->template = $template;
     $this->homepageService = $homepageService;
     $this->pdo = $pdo;
  }

  public function homepage() 
  {
    echo $this->template->render("hello.html.php");
    
    while ($row = $this->pdo->mysqli_fetch_array($this->homepageService->getAllPost())) 
    {
    	echo "<tr>";
    	echo "<td>" . $row['FirstName'] . "</td>";
    	echo "<td>" . $row['LastName'] . "</td>";
    	echo "</tr>";
    }
  }
  public function greet($name) 
  {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }
}
