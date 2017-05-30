<?php 
session_start();
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'court';

$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');

date_default_timezone_set('Europe/Bucharest');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$insertCommentSql = "insert into comment(`UserName`,`CourtID`,`comment`) VALUES('".$_SESSION['user']. "','". $_POST["CourtID"] ."','". $_POST["comment"] ."')";
	mysqli_query($con, $insertCommentSql);
	header('Location: index.php');
}
else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	$selectSql = "select * from comment where CourtId=". $_GET["CourtID"];
	$comments=mysqli_query($con, $selectSql);
	$photoSql = "select * from photo where CourtId=". $_GET["CourtID"];
	$photos=mysqli_query($con, $photoSql);

?>
<script type="text/javascript">
$("#submit-comment").click(
  function comment(){
    console.log($("#comment-form"));
      $("#comment-form").submit(function( event ) {
      console.log(event);
      // event.preventDefault();
    });
});
</script>
<div style="color:black;">
	<h2>Court details</h2>
	<div><b>Court Name</b>: <?php echo $_GET["CourtName"];?></div>
	<div><b>Court ID</b>: <?php echo $_GET["CourtID"];?></div>
	<hr />
	<div>
		<h2>Reviews</h2>
		<div>
			<?php 
			$commented = false;
			while($comment = mysqli_fetch_assoc($comments)){
					echo "<div style='text-align:left; margin-left:15px'><b>" . $comment["UserName"] ." : </b>". $comment["comment"] ."</div>";
					if($comment["UserName"] == $_SESSION['user']) $commented = true;
			}
			if (!$commented){
			?>
		</div>

		<h3> Write a review</h3>
		<form id="comment-form" action="comment.php" method="POST">
			<input type="hidden" name="CourtID" value="<?php echo $_GET["CourtID"];?>">
			<textarea style="width:90%" class="form-control" rows="5" name="comment"></textarea>
			<button class="common-button" id="submit-comment" type='submit'  class="btn btn-success">Submit</button>
		</form>
		
		<?php } ?>
		<hr />
		<h3> Photo</h3>
		
	</div>
</div>

<?php 
			
			$uploaded = false;
			while($photo = mysqli_fetch_assoc($photos)){
					echo "<img width=200 height=200 src='". $photo["path"] ."'' />";
					if($photo["UserName"] == $_SESSION['user']) $uploaded = true;
			}
			if (!$uploaded){ ?>
				<form action="upload.php" method="POST" enctype="multipart/form-data">
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="hidden" name="CourtID" value="<?php echo $_GET["CourtID"];?>">
					<button class="common-button">Upload</button>
				</form>
			<?php
			}
}
?>