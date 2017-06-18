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
    $result = $this->homepageService->getAllPost();
    echo "<table>";
    foreach ($result as $row) {
    	echo "<tr>";
    	echo "<td>" .$row['title'] . "</td>";
    	echo "<td>" .$row['content'] . "</td>";
    	echo "</tr>";
    }
    echo "</table>";
  }
  public function greet($name) 
  {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }
}
