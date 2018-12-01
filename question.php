<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="styles.css" rel="stylesheet">
<div class="container">
<div class="col-md-4">
<h1>QUIZ</h1>
    <?php
    $servername = "db";
    $username = "root";
    $password = "password";
    $dbname = "QuizMakerdb";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(isset($_POST['submit'])){
      if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $topid) {
          $sql1 = "SELECT qid, qtext, option1,option2,option3,option4 FROM Question where topic_id = '".$topid."'";
          $result1 = mysqli_query($conn, $sql1);
          if (mysqli_num_rows($result1) > 0) {
            while($row1 = mysqli_fetch_assoc($result1)) {
            echo '<form action = "answer.php" method="post">';
     				$quesid = $row1["qid"];
    				$sql2 = "SELECT option_id, option_text,qid, correct FROM Opt WHERE qid = '".$quesid."'";
    				$result2 = mysqli_query($conn, $sql2);
    	      echo '<h2> (Q)'.$row1["qtext"]."\n".'</h2>';
            echo '<input type="hidden" name="qids[]" value='.$quesid.'>';
    				while($row2 = mysqli_fetch_assoc($result2)) {
              // echo '<input type="hidden" name="optids[]" value='.$row2["option_text"].'>';
              // $uid = $row1["qid"];
              echo '<div class="form-check">
                    <label>
                      <input type="radio" name="acceptance[$quesid]" value='.$row2["option_id"].'> <span class="label-text">'.$row2["option_text"].'</span>
                    </label>
                  </div>';
    				}
            // echo $quesid;
           }
          }
        }
      }
      else {
            echo "No questions dispalyed "."\n";
       }
    } ?>
    <input type = "submit" name = "submit" value = "Finish Attempt"/>
    </form>
    </div>
 </div>
