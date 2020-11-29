<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Soccer Leagues</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
		<?php include 'operations.php';?>
</head>


<body>
	<!--Start of Header-->
	<header>
		<div id="logo">
			<a href="https://www.sdsu.edu/">
			<img src="football.svg">
			</a>
			<a href="index.php">
				<h1>Soccer Leagues</h1>
			</a>
		</div>
		<nav id="nav">
			<ul class="navigation">
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">Leagues</a></li>
				<li><a href="events.html">Clubs</a></li>
				<li><a href="exhibit.html">Matches</a></li>
				<li><a href="science.html">Players</a></li>
				<li><a href="#">Get Involved</a></li>
			</ul>
		</nav>
  </header>

 <div>
  <h1>Leagues</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="add.svg" width="30px" height="30px" alt="Add Club">
	</a>
  <div id="leagues" class="columns">
    <?php
		$leagues = getData('Leagues');
		foreach($leagues as $league): ?>
		?>
      <article class="column">
				<span id="actions">
					<a href="#">
	          <img src="pencil.svg" width="20px" height="20px" alt="Edit"/>
	        </a>
					<a href="#" class="padding_left_20">
	          <img src="trash-can.svg" width="20px" height="20px" alt="Delete"/>
	        </a>
				</span>
        <h2 class="clear_both"><?php echo $league['name']; ?></h2>
        <h3><?php echo $league['country']; ?></h3>
      </article>
    <?php endforeach; ?>
	</div>
 </div>
</br>

 <div id="clubs">
  <h1 class="padding_bottom_40">Clubs</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="add.svg" width="30px" height="30px" alt="Add Club">
	</a>
	<table>
  <tr>
		<th>Ranking</th>
    <th>Club</th>
    <th>Wins</th>
    <th>Loss</th>
		<th>Draw</th>
		<th>Points</th>
		<th>Action</th>
  </tr>
	<?php
	$clubs = getData('Clubs');
	foreach($clubs as $club): ?>
  <tr>
    <td><?php echo $club['ranking']; ?></td>
    <td><?php echo $club['club']; ?></td>
    <td><?php echo $club['wins']; ?></td>
		<td><?php echo $club['loss']; ?>]</td>
    <td><?php echo $club['draw']; ?></td>
    <td><?php echo $club['points']; ?></td>
		<td>
			<a href="#">
				<img src="pencil.svg" width="20px" height="20px" alt="Edit"/>
			</a>
			<a href="#" class="padding_left_20">
				<img src="trash-can.svg" width="20px" height="20px" alt="Delete"/>
			</a>
		</td>
  </tr>
	<?php endforeach; ?>
 </table>
 </div>
 </br>

 <div id="matches">
  <h1>Matches</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="add.svg" width="30px" height="30px" alt="Add Match">
	</a>
	<div class="scrollmenu">
    <?php
		$matches = getData('Matches');
		foreach($matches as $match): ?>
      <article class="column">
				<span id="actions">
					<a href="#">
	          <img src="pencil.svg" width="20px" height="20px" alt="Edit"/>
	        </a>
					<a href="#" class="padding_left_20">
	          <img src="trash-can.svg" width="20px" height="20px" alt="Delete"/>
	        </a>
				</span>
			</br>
				<div class = "padding_bottom_20">
					<?php echo $match['']; ?> &nbsp;
					<span class="text-color"><?php echo $match['']; ?> - <?php echo $match['']; ?></span>
					&nbsp; <?php echo $match['']; ?>
				</div>
      </article>
    <?php endforeach; ?>
	</div>
 </div>

 <div id="players">
  <h1>Players</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="add.svg" width="30px" height="30px" alt="Add Match">
	</a>
	<div class="scrollmenu">
    <?php
		$players = getData('Players');
		foreach($players as $player): ?>
      <article class="column">
				<span id="actions">
					<a href="#">
	          <img src="pencil.svg" width="20px" height="20px" alt="Edit"/>
	        </a>
					<a href="#" class="padding_left_20">
	          <img src="trash-can.svg" width="20px" height="20px" alt="Delete"/>
	        </a>
				</span>
				<div class="numberCircle padding_bottom_20 clear_both">90</div>
				<div>PW</div>
        <h3 class="margin_top_12"><?php echo "player name"; ?></h3>
				<table>
			  <tr>
			    <td>Age:</td>
					<td><?php echo $player['age'];?></td>
				</tr>
				<tr>
			    <td>Height:</td>
					<td><?php echo $player['height'];?></td>
				</tr>
				<tr>
			    <td>Weight:</td>
					<td><?php echo $player['weight'];?></td>
				</tr>
				<tr>
			    <td>Country:</td>
					<td><?php echo $player['country'];?></td>
				</tr>
				<tr>
					<td>Goals:</td>
			    <td><?php echo $player['goals'];?></td>
				</tr>
				<tr>
					<td>Assists:</td>
			    <td><?php echo $player['assists'];?></td>
				</tr>
				<tr>
					<td>Market Value:</td>
			    <td><?php echo $player['market_value'];?></td>
				</tr>
			 </table>
      </article>
    <?php endforeach; ?>
	</div>
 </div>

</body>
</html>
