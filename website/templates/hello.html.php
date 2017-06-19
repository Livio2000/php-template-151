<!Doctype>
<html>
<head>
	<link rel="stylesheet" href="/Design/design.css">
 	<title>Homepage</title>
</head>
<body>
	<h1>Livio's Blog</h1>
	<a href="login">Login</a>
	<?php
	echo "<table border='1'>";
	echo "<tr><th>Title</th> <th>Content</th> <th></th> <th>Likes</th> <th>dislikes</th></tr>";
	foreach ($posts as $row)
	{
		echo "<tr>";
		echo "<td>" .$row['title'] . "</td>";
		echo "<td>" .$row['content'] . "</td>";
		echo "<td>" . "<form id='like' method='post'>
					   <input type='hidden' name='post_id' id='post_id' value=".$row['id']."></input>
					   <Button type='submit'>Like</Button>
					   </form>" . "</td>";
		$likesNumber = 0;
		$dislikes = 0;
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
		echo "<td>".$likesNumber."</td>";
		echo "<td>".$dislikes."</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
</body>
</html>