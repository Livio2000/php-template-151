<?php

namespace livio\Controller;

use livio\SimpleTemplateEngine;
use livio\Service\Homepage\HomepageService;
use livio\Service\Security\CSRFProtectionService;

class IndexController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  private $homepageService;
  
  private $pdo;
  
  private $csrfProtectionService;
  
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, HomepageService $homepageService, \PDO $pdo, CSRFProtectionService $csrfProtectionService)
  {
     $this->template = $template;
     $this->homepageService = $homepageService;
     $this->pdo = $pdo;
     $this->csrfProtectionService = $csrfProtectionService;
  }
  
  public function homepage() 
  {
  	echo $_SESSION['user_id'];
  	$posts = $this->homepageService->getAllPost();
  	$likes = $this->homepageService->getAllLikes();
    echo $this->template->render("hello.html.php", array('posts' => $posts, 'likes' => $likes));  
  }
  
  public function like(array $data)
  {
  	if ($_SESSION['user_id'] != "")
  	{
  		$like = $this->homepageService->getLikeByUserIdAndPostId($_SESSION['user_id'], $data{"like"});
  		if($like != NULL)
  		{
  			if ($like['isDislike'] == 1)
  			{
  				$this->homepageService->changeLike($like['id'], 0);
  			}
  			else if ($like['isDislike'] == 0)
  			{
  				$this->homepageService->removeLike($like['id']);
  			}
  		}
  		else
  		{
  			$this->homepageService->addLike($_SESSION['user_id'], $data{"like"}, 0);
  		}
  	}
	else
	{
		header('Location: /login');
	}
  }
  
  public function dislike(array $data)
  {
  	if ($_SESSION['user_id'] != "")
  	{
  		$like = $this->homepageService->getLikeByUserIdAndPostId($_SESSION['user_id'], $data{"dislike"});
  		if($like != NULL)
  		{
  			if ($like['isDislike'] == 0)
  			{
  				$this->homepageService->changeLike($like['id'], 1);
  			}
  			else if ($like['isDislike'] == 1)
  			{
  				$this->homepageService->removeLike($like['id']);
  			}
  		}
  		else
  		{
  			$this->homepageService->addLike($_SESSION['user_id'], $data{"dislike"}, 1);
  		}
  	}
  	else
  	{
  		header('Location: /login');
  	}
  }
}
