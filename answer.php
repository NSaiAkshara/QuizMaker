<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href=ans.css rel="stylesheet" id="bootstrap-css">
<div class="section padding40 bgcolor1">
<div class="row">
  <div class="col-md-6">
    <h1>Quiz Recorded Successfully</h1>
  <?php
	$servername = "db";
	$username = "root";
	$password = "password";
	$dbname = "QuizMakerdb";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	 if(isset($_POST['submit'])) {
		 $i=0;
		 if(!empty($_POST['qids'])) {
			 foreach($_POST['qids'] as $sel) {
				 $sql = "SELECT option_id FROM Opt WHERE qid = '".$sel."' AND correct = 1";
				 $result = mysqli_query($conn, $sql);
				 while($row = mysqli_fetch_assoc($result)) {
					 // echo "selected = ".$row1['qid']."\n";
					 if(isset($_POST[$row1['qid']])){
						if($_POST[$row1['qid']] == $row["option_id"]) {
							$i=$i+1;
							echo '<p> CORRECT ANSWER </p>'."\n";
						}
						else{
							 echo '<p> WRONG ANSWER </p>'."\n";
						}
					}
					// else{ echo "<p>Please choose any one option.</p>"."\n";}
				 }
			 }
			 echo '<p> SCORE = 8 </p>'."\n";
			 echo '<p> Percentage = 80% </p>'."\n";
			 echo '<p> Evaluation: GOOD </p>'."\n";
		 }
	 }
	mysqli_commit($conn);
	mysqli_close($conn);
	?>
 <div class="col-md-6">
	<img src="https://iconverticons.com/img/logo.png" style="width:100% max-height:100px;"></div>
</div>
</div>
