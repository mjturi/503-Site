<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Soccer Leagues</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script>
		function deleteRecord(table, id) {
			$.get({
				url: 'delete.php?table=' + table + '&id=' + id,
				success: function() {
					location.reload();
				}
			}
			);
			return false;
		}
	</script>
	<?php include 'operations.php'; ?>
</head>


<body>
	<!--Start of Header-->
	<header>
		<div id="logo">
			<a href="https://www.sdsu.edu/">
				<img src="./images/football.svg">
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
			<img src="./images/add.svg" width="30px" height="30px" alt="Add Club">
		</a>
		<div id="leagues" class="columns">
			<?php
			$leagues = getData('leagues');
			foreach($leagues as $league): ?>

				<article class="column">
					<span id="actions">
						<a href="#">
							<img src="./images/pencil.svg" width="20px" height="20px" alt="Edit"/>
						</a>
						<button class="padding_left_20" onclick="deleteRecord('leagues', <?php echo $league['leagueid']; ?>)">
							<img src="./images/trash-can.svg" width="20px" height="20px" alt="Delete"/>
						</button>
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
		<img src="./images/add.svg" width="30px" height="30px" alt="Add Club">
	</a>
	<table>
		<tr>
			<th>Ranking</th>
			<th>Club</th>
			<th>Wins</th>
			<th>Loss</th>
			<th>Draw</th>
			<th>Points</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		$clubs = getData('clubs');
		foreach($clubs as $club): ?>
			<tr>
				<td><?php echo $club['ranking']; ?></td>
				<td><?php echo $club['name']; ?></td>
				<td><?php echo $club['wins']; ?></td>
				<td><?php echo $club['losses']; ?></td>
				<td><?php echo $club['draws']; ?></td>
				<td><?php echo $club['points']; ?></td>
				<td>
					<a href="#">
						<img src="./images/pencil.svg" width="20px" height="20px" alt="Edit"/>
					</a>
				</td>
				<td>
					<button class="padding_left_20" onclick="deleteRecord('clubs', <?php echo $club['clubid']; ?>)">
						<img src="./images/trash-can.svg" width="20px" height="20px" alt="Delete"/>
					</button>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
</br>

<div id="matches">
	<h1>Matches</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="./images/add.svg" width="30px" height="30px" alt="Add Match">
	</a>
	<div class="scrollmenu">
		<?php
		$matches = getData('matches');
		$clubs = getData('clubs');
		foreach($matches as $match): ?>
			<article class="column">
				<span id="actions">
					<a href="#">
						<img src="./images/pencil.svg" width="20px" height="20px" alt="Edit"/>
					</a>
					<button class="padding_left_20" onclick="deleteRecord('matches', <?php echo $match['matchid']; ?>)">
						<img src="./images/trash-can.svg" width="20px" height="20px" alt="Delete"/>
					</button>
				</span>
			</br>
			<div class = "padding_bottom_20">
				<?php
				$home = getClub($match['homeclubid']);
				$vis = getClub($match['visitorclubid']);

				echo $home; ?> vs <?php echo $vis; ?> &nbsp;
				<br>
				<span class="text-color"><?php echo $match['homescore']; ?> - <?php echo $match['visitorscore']; ?></span>
			</div>
		</article>
	<?php endforeach; ?>
</div>
</div>

<div id="players">
	<h1>Players</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="./images/add.svg" width="30px" height="30px" alt="Add Match">
	</a>
	<div class="scrollmenu">
		<?php
		$players = getData('players');
		foreach($players as $player): ?>
			<article class="column">
				<span id="actions">
					<a href="#">
						<img src="./images/pencil.svg" width="20px" height="20px" alt="Edit"/>
					</a>
					<button class="padding_left_20" onclick="deleteRecord('players', <?php echo $player['playerid']; ?>)">
						<img src="./images/trash-can.svg" width="20px" height="20px" alt="Delete"/>
					</button>
				</span>
				<div class="numberCircle padding_bottom_20 clear_both"><?php echo $player['rating'];?></div>
				<div><?php echo $player['position'];?></div>
				<h3 class="margin_top_12"><?php echo $player['name']; ?></h3>
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
						<td><?php echo $player['marketval'];?></td>
					</tr>
				</table>
			</article>
		<?php endforeach; ?>
	</div>
</div>

</body>
</html>
