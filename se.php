<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="topics.css" rel="stylesheet" id="bootstrap-css">
<form method="post" action="question.php">

<div class="container">
	<div class="row">
	    <div class="col-md-6 offset-md-3">
	    <div class="card" style="margin:50px 0">
        <div class="card-header">TOPICS</div>
        <ul class="list-group list-group-flush">
		    <?php
		    $servername = "db";
		    $username = "root";
		    $password = "password";
		    $dbname = "QuizMakerdb";
		    $conn = mysqli_connect($servername, $username, $password, $dbname);
		    $sql1 = "SELECT name,topic_id FROM Topic";
		    $result1 = mysqli_query($conn, $sql1);
		    if (mysqli_num_rows($result1) > 0) {
					echo '<form action="question.php" method="post">';
		       while($row = mysqli_fetch_assoc($result1)) {
			 echo '<li class="list-group-item">'.$row["name"].
            '<label class="checkbox">
             <input type="checkbox" name = "check_list[]" value = '.$row["topic_id"].'>
             <span class="default"></span>
             </label>
             </li>';
		       }
		      }
		      else {
		         Echo "No topics dispalyed "."\n";
		      }
					mysqli_commit($conn);
		      mysqli_close($conn);
		    ?>
		</ul>
    </div>
		<input name="submit" type="submit" value="Start Quiz">
	</form>
		<!-- <a href="http://localhost/question.php" class="button">Start Quiz</$ -->
      </div>
    </div>
</div>
