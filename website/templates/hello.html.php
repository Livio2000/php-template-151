<!Doctype>
<html>
<head>
	<link rel="stylesheet" href="/Design/design.css">
 	<title>Homepage</title>
</head>
<body>
	<h1>Livio's Blog</h1>
	<?php
		if($_SESSION['user_id'] == "")
		{
			echo "<form id='login' method='post'>
						<input type='hidden' name='login' id='login'></input>
					   	<Button type='submit'>Login</Button>
				   </form>";
			
		}
		else 
		{
			echo "<form id='logout' method='post'>
						<input type='hidden' name='logout' id='logout' value=".$_SESSION['user_id']."></input>
					   	<Button type='submit'>Logout</Button>
				   </form>";
		}
	echo "<table border='1'>";
	echo "<tr><th>Title</th> <th>Content</th> <th></th> <th>Likes</th> <th>Dislikes</th></tr>";
	if($posts != NULL)
	{
		foreach ($posts as $row)
		{
			echo "<tr>";
			echo "<td>" .$row['title'] . "</td>";
			echo "<td>" .$row['content'] . "</td>";
			echo "<td>" . "<form id='like' method='post'>
					   	<input type='hidden' name='like' id='like' value=".$row['id']."></input>
					   	<Button type='submit'>Like</Button>
					  </form>
					  <form id='dislike' method='post'>
						<input type='hidden' name='dislike' id='dislike' value=".$row['id']."></input>
						<Button type='submit'>Dislike</Button>
					  </form>"  . "</td>";
			$likesNumber = 0;
			$dislikes = 0;
			if($likes != NULL)
			{
				foreach ($likes as $like)
				{
					if ($like['post_id'] == $row['id'])
					{
						if($like['isDislike'] == 0)
						{
							$likesNumber++;
						}
						else
						{
							$dislikes++;
						}
					}
				}
			}
			echo "<td>".$likesNumber."</td>";
			echo "<td>".$dislikes."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	?>
</body>
</html>