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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/index.css">
	<?php include 'operations.php';
	if (isset($_POST['push_edits3'])) {
		$hscore = $_REQUEST['hscore'];
		$ascore = $_REQUEST['ascore'];
		$id = $_REQUEST['id'];
		updateMatches('matches', $id, $hscore, $ascore);
	}
	if (isset($_POST['push_edits4'])) {
		$name = $_REQUEST['name'];
		$position = $_REQUEST['position'];
		$age = $_REQUEST['age'];
		$height = $_REQUEST['height'];
		$weight = $_REQUEST['weight'];
		$country = $_REQUEST['country'];
		$goals = $_REQUEST['goals'];
		$assists = $_REQUEST['assists'];
		$marketval = $_REQUEST['marketval'];
		$id = $_REQUEST['id'];
		updatePlayers('players', $id, $name, $position, $age, $height, $weight, $country, $goals, $assists, $marketval);
	}
	?>

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
			foreach($leagues as $league):
				$id = $league['leagueid'];
				?>

				<article class="column">
					<span id="actions">
						<form name="edit"  method="post">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<input type="hidden" name="leagues" value="leagues">
							<input class="padding_left_20" type="image" name="edit" value="edit" src="./images/pencil.svg" width="20px" height="20px">
						</form>
						<button class="padding_left_20" onclick="deleteRecord('leagues', <?php echo $league['leagueid']; ?>)">
							<img src="./images/trash-can.svg" width="20px" height="20px" alt="Delete"/>
						</button>
					</span>
					<h2 class="clear_both"><?php echo $league['name']; ?></h2>
					<h3><?php echo $league['country']; ?></h3>
				</article>
			<?php endforeach;
			if (isset($_POST['leagues'])) {
				$id = $_REQUEST['id'];
				$editRow = displayEdit("leagues", $id);
				echo "<form method=\"POST\">";
				echo "<br>";
				echo "<br>";
				echo "<input style=\"color: black\" value=\"$editRow[leagueid]\" type=\"hidden\" size=\"20\" name=\"id\" >";
				echo "<p>League Name:&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[name]\" type=\"text\" size=\"20\" name=\"name\" ></p><br>";
				echo "<p>League Country:&nbsp; <input style=\"color: black\" value=\"$editRow[country]\" type=\"text\" size=\"20\"  name=\"country\"></p><br>";
				echo "<p><input style=\"color: black\" name=\"push_edits1\" type=\"submit\" value=\"Change\" /></p>";
				echo "</form>";
			}
			if (isset($_POST['push_edits1'])) {
				$name = $_REQUEST['name'];
				$country = $_REQUEST['country'];
				$id = $_REQUEST['id'];
				updateLeagues('leagues', $id, $name, $country);
			}
			?>
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
			foreach($clubs as $club):
				$id = $club['clubid'];
				?>
				<tr>
					<td><?php echo $club['ranking']; ?></td>
					<td><?php echo $club['name']; ?></td>
					<td><?php echo $club['wins']; ?></td>
					<td><?php echo $club['losses']; ?></td>
					<td><?php echo $club['draws']; ?></td>
					<td><?php echo $club['points']; ?></td>
					<td>
						<form name="edit"  method="post">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<input type="hidden" name="clubs">
							<input class="padding_left_20" type="image" name="edit" value="edit" src="./images/pencil.svg" width="20px" height="20px">
						</form>
					</td>
					<td>
						<button class="padding_left_20" onclick="deleteRecord('clubs', <?php echo $club['clubid']; ?>)">
							<img src="trash-can.svg" width="20px" height="20px" alt="Delete"/>
						</button>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
		<?php
		if (isset($_POST['clubs'])) {
			$id = $_REQUEST['id'];
			$editRow = displayEdit("clubs", $id);
			echo "<form method=\"POST\">";
			echo "<br>";
			echo "<br>";
			echo "<input style=\"color: black\" value=\"$editRow[clubid]\" type=\"hidden\" size=\"20\" name=\"id\" >";
			echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Club Ranking:&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[ranking]\" type=\"text\" size=\"20\" name=\"ranking\" ></p><br>";
			echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Club Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[name]\" type=\"text\" size=\"20\" name=\"name\" ></p><br>";
			echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Club Wins:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[wins]\" type=\"text\" size=\"20\" name=\"wins\" ></p><br>";
			echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Club Losses:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[losses]\" type=\"text\" size=\"20\" name=\"losses\" ></p><br>";
			echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Club Draws:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[draws]\" type=\"text\" size=\"20\" name=\"draws\" ></p><br>";
			echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Club Points:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[points]\" type=\"text\" size=\"20\"  name=\"points\"></p><br>";
			echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style=\"color: black\" name=\"push_edits2\" type=\"submit\" value=\"Change\" /></p>";
			echo "</form>";
		}
		if (isset($_POST['push_edits2'])) {
			$name = $_REQUEST['name'];
			$ranking = $_REQUEST['ranking'];
			$wins = $_REQUEST['wins'];
			$losses = $_REQUEST['losses'];
			$draws = $_REQUEST['draws'];
			$points = $_REQUEST['points'];
			$id = $_REQUEST['id'];
			updateClubs('clubs', $id, $name, $ranking, $wins, $losses, $draws, $points, $country);
		}
		?>
	</div>
</br>
<div>
	<h1>Matches</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="./images/add.svg" width="30px" height="30px" alt="Add Club">
	</a>
	<div id="matches">
		<?php
		$matches = getData('matches');
		$clubs = getData('clubs');
		foreach($matches as $match):
			$id = $match['matchid'];
			?>
			<article class="column">
				<span id="actions">
					<form name="edit" method="post">
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<input type="hidden" name="matches" value="matches">
						<input class="padding_left_20" type="image" name="edit" value="edit" src="./images/pencil.svg" width="20px" height="20px">
					</form>
					<button class="padding_left_20" onclick="deleteRecord('matches', <?php echo $match['matchid']; ?>)">
						<img src="trash-can.svg" width="20px" height="20px" alt="Delete"/>
					</button>
				</span>
			</br>
			<div class = "padding_bottom_20">
				<?php
				$home = getClub($match['homeclubid']);
				$vis = getClub($match['visitorclubid']);
				$vs = $home." vs ".$vis;
				$score = $match['homescore']." - ".$match['visitorscore'];
				?>
				<h2 class="clear_both"><?php echo $vs; ?></h2>
				<br>
				<h3 class="text-color"><?php echo $score; ?></h3>
			</div>
		</article>
	<?php endforeach; ?>
</div>
<?php
if (isset($_POST['matches'])) {
	$id = $_REQUEST['id'];
	$editRow = displayMatchEdit($id);
	echo "<form method=\"POST\">";
	echo "<br>";
	echo "<br>";
	echo "<input style=\"color: black\" value=\"$editRow[matchid]\" type=\"hidden\" size=\"20\" name=\"id\" >";
	echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home Score:&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[homescore]\" type=\"text\" size=\"20\" name=\"hscore\" ></p><br>";
	echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Away Score:&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[visitorscore]\" type=\"text\" size=\"20\" name=\"ascore\" ></p><br>";
	echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style=\"color: black\" name=\"push_edits3\" type=\"submit\" value=\"Change\" /></p>";
	echo "</form>";
}
?>
</div>

<div id="players">
	<h1>Players</h1>
	<a class="padding_left_20" href="https://www.sdsu.edu/">
		<img src="./images/add.svg" width="30px" height="30px" alt="Add Match">
	</a>
	<?php
	$players = getData('players');
	foreach($players as $player):
		$id = $player['playerid'] ?>
		<article class="column">
			<span id="actions">
				<form name="edit"  method="post">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="players">
					<input class="padding_left_20" type="image" name="edit" value="edit" src="./images/pencil.svg" width="20px" height="20px">
				</form>
				<button class="padding_left_20" onclick="deleteRecord('players', <?php echo $player['playerid']; ?>)">
					<img src="trash-can.svg" width="20px" height="20px" alt="Delete"/>
				</button>
			</span>
			<div class="numberCircle padding_bottom_20 clear_both">&nbsp;<?php echo $player['rating'];?></div>
			<div style="text-align: center"><?php echo $player['position'];?></div>
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
	<?php endforeach;

	if (isset($_POST['players'])) {
		$id = $_REQUEST['id'];
		$editRow = displayEdit("players", $id);
		echo "<form method=\"POST\">";
		echo "<br>";
		echo "<br>";
		echo "<input style=\"color: black\" value=\"$editRow[playerid]\" type=\"hidden\" size=\"20\" name=\"id\" >";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Name:&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[name]\" type=\"text\" size=\"20\" name=\"name\" ></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Position:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[position]\" type=\"text\" size=\"20\" name=\"position\" ></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[age]\" type=\"text\" size=\"20\" name=\"age\" ></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Height:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[height]\" type=\"text\" size=\"20\" name=\"height\" ></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Weight:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[weight]\" type=\"text\" size=\"20\" name=\"weight\" ></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Country:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[country]\" type=\"text\" size=\"20\"  name=\"country\"></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Goals:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[goals]\" type=\"text\" size=\"20\"  name=\"goals\"></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Assists:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[assists]\" type=\"text\" size=\"20\"  name=\"assists\"></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Player Market Value:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style=\"color: black\" value=\"$editRow[marketval]\" type=\"text\" size=\"20\"  name=\"marketval\"></p><br>";
		echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style=\"color: black\" name=\"push_edits4\" type=\"submit\" value=\"Change\" /></p>";
		echo "</form>";
	}
	?>
</div>
</div>

</body>
</html>
