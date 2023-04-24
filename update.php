<?php
include_once 'dbConnection.php';
session_start();
$email = $_SESSION['email'];

//delete user
if (isset($_GET['demail'])) {
  $demail = @$_GET['demail'];
  $r1 = mysqli_query($con, "DELETE FROM user_progress WHERE email='$demail' ") or die('Error');
  $r2 = mysqli_query($con, "DELETE FROM history WHERE email='$demail' ") or die('Error');
  $result = mysqli_query($con, "DELETE FROM user WHERE email='$demail' ") or die('Error');
  $role = $_GET['role'];
  $result = $role == "student" ? 11 : 12;
  header("location:dash.php?q=".$result);
  
}

//delete admin
if (isset($_GET['demail1'])) {
  if (@$_GET['demail1']) {
    $demail1 = @$_GET['demail1'];

    $result = mysqli_query($con, "DELETE FROM admin WHERE email='$demail1' and role ='admin' ") or die('Error');
    header("location:dash.php?q=9");
  }
}



//remove quiz
if ($_GET['q'] == 'rmquiz') {
  $moduleID = @$_GET['eid'];
  $result = mysqli_query($con, "SELECT * FROM questions WHERE eid='$moduleID'") or die('Error');
  while ($row = mysqli_fetch_array($result)) {
    $questionID = $row['qid'];
    $r1 = mysqli_query($con, "DELETE FROM options WHERE qid='$questionID'") or die('Error');
    $r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$questionID' ") or die('Error');
  }
  $r3 = mysqli_query($con, "DELETE FROM questions WHERE eid='$moduleID' ") or die('Error');
  $r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$moduleID' ") or die('Error');
  $r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$moduleID' ") or die('Error');
  $r5 = mysqli_query($con, "DELETE FROM modules WHERE eid='$moduleID' ") or die('Error');

  header("location:dash.php?q=5");
}

//add quiz
if ($_GET['q'] == 'addquiz') {
  $name = $_POST['name'];
  $name = ucwords(strtolower($name));
  $questionTotal = $_POST['total'];
  $correctScore = $_POST['right'];
  $time = $_POST['time'];
  $desc = $_POST['desc'];
  $eid = $_GET['eid'];
  $q3 = mysqli_query($con, "INSERT INTO quiz VALUES  ('$eid','$name','$correctScore','$questionTotal','$time' ,'$desc', NOW() ,'$email')");

  header("location:dash.php?q=4&step=2&eid=$eid&n=$questionTotal");
}


//add question
if ($_GET['q'] == 'addqns') {
  $n = @$_GET['n'];
  $moduleID = @$_GET['eid'];
  $ch = @$_GET['ch'];

  for ($i = 1; $i <= $n; $i++) {
    $questionID = uniqid();
    $qns = $_POST['qns' . $i];
    $qns = str_replace("'", "''", $qns);
    $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$moduleID','$questionID','$qns' , '$ch' , '$i')");
  
    $oaid = uniqid();
    $obid = uniqid();
    $ocid = uniqid();
    $odid = uniqid();
    $a = $_POST[$i . '1'];
    $b = $_POST[$i . '2'];
    $c = $_POST[$i . '3'];
    $d = $_POST[$i . '4'];

    $a = str_replace("'", "''", $a);
    $b = str_replace("'", "''", $b);
    $c = str_replace("'", "''", $c);
    $d = str_replace("'", "''", $d);
    
    $qa = mysqli_query($con, "INSERT INTO options VALUES  ('$questionID','$a','$oaid')") or die('Error61');
    $qb = mysqli_query($con, "INSERT INTO options VALUES  ('$questionID','$b','$obid')") or die('Error62');
    $qc = mysqli_query($con, "INSERT INTO options VALUES  ('$questionID','$c','$ocid')") or die('Error63');
    $qd = mysqli_query($con, "INSERT INTO options VALUES  ('$questionID','$d','$odid')") or die('Error64');

    $e = $_POST['ans' . $i];
    switch ($e) {
      case 'a':
        $ansid = $oaid;
        break;
      case 'b':
        $ansid = $obid;
        break;
      case 'c':
        $ansid = $ocid;
        break;
      case 'd':
        $ansid = $odid;
        break;
      default:
        $ansid = $oaid;
    }

    $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$questionID','$ansid')");
  }
  header("location:dash.php?q=10");
}

//add modules
if ($_GET['q'] == 'addmodules') {
  $mread = $_POST['mread'];
  $mread = str_replace("'", "''", $mread);
  // $moduleID = @$_GET['eid'];
  $moduleID = uniqid();
  $query = mysqli_query($con, "INSERT INTO modules VALUES  ('$moduleID','$mread')");
  header("location:dash.php?q=4&moduleID=$moduleID");
}

/* checks if the answer is correct, updates the user's score and
progress in the database, and redirects the user to the next question or the quiz result page
depending on the progress and score. */
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {

  $moduleID = @$_GET['eid'];
  $questionNumber = @$_GET['n'];
  $questionTotal = @$_GET['t'];
  $ans = $_POST['ans'];
  $questionID = @$_GET['qid'];
  $attempt = @$_GET['attempt'];
  $moduleNum = @$_GET['moduleNum'];
  $time = @$_GET['time'];

  $q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$questionID' ");

  while ($row = mysqli_fetch_array($q)) {
    $ansid = $row['ansid'];
  }

  if ($ans == $ansid) {
    $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$moduleID' ");

    while ($row = mysqli_fetch_array($q)) {
      $correctScore = $row['sahi'];
    }

    if ($questionNumber == 1) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$moduleID' ,'0','0','0','0', NOW(), '$attempt')") or die('Error');
    }

    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$moduleID' AND email='$email' AND attempt='$attempt'") or die('Error115');

    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      $r = $row['sahi'];
    }

    $r++;
    $s = $s + $correctScore;
    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$questionNumber,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$moduleID' AND attempt='$attempt'") or die('Error124');
  } else {
    $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$moduleID'") or die('Error129');

    while ($row = mysqli_fetch_array($q)) {
      $wrong = $row['wrong'];
    }

    if ($questionNumber == 1) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$moduleID' ,'0','0','0','0', NOW(), '$attempt')") or die('Error137');
    }

    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$moduleID' AND email='$email' AND attempt='$attempt'") or die('Error139');
    $s = 0;
    $w = 0;
    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      $w = $row['wrong'];
    }

    $w++;
    // $s=$s-$wrong;
    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$questionNumber,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$moduleID' AND attempt='$attempt'") or die('Error147');
  }

  if ($questionNumber != $questionTotal) {
    $questionNumber++;
    header("location:account.php?q=quiz&step=2&eid=$moduleID&n=$questionNumber&t=$questionTotal&attempt=$attempt&moduleNum=$moduleNum&time=$time") or die('Error152');
  }

  // /*  if the user has scored above 90% on the quiz. If the score is below
  // 90%, the user is redirected to the quiz result page. 
  else {
    $query = mysqli_query($con, "SELECT * FROM history WHERE eid='$moduleID' AND email='$email' AND attempt='$attempt'") or die('Error115');
    $result = mysqli_fetch_assoc($query);
    $score = $result['score'];
    $scorePercentage = ($score / $questionTotal) * 100;

  // If the score is above 90%, the code checks
  // the user's progress in the course by querying the `user_progress` table in the database. If the
  // current module number is greater than the user's progress, the user's progress is updated in the
  // `user_progress` table.

    if ($scorePercentage < 90) {
      header("location:account.php?q=result&eid=$moduleID&attempt=$attempt");
      
      // If the current module number is the last module in the course, the user's
      // progress is updated and the certificate is generated. Finally, the user is redirected to the quiz
      // result page. 
    } else {
      $checkProgress = mysqli_query($con, "SELECT moduleNum FROM user_progress WHERE email = '$email'");

      $progress = mysqli_fetch_assoc($checkProgress);
      $userProgress = $progress['moduleNum'];

      $totalModules = mysqli_query($con, "SELECT COUNT(*) FROM modules");
      $total = mysqli_fetch_assoc($totalModules);

      if ($moduleNum == $total['COUNT(*)']){
        $currentDate = date("Y-m-d");
        mysqli_query($con, "UPDATE user_progress SET moduleNum=$moduleNum, certificate = 1, date_completed='$currentDate' WHERE email='$email'");
        header("location:account.php?q=result&eid=$moduleID&attempt=$attempt");
      }

      else if ($moduleNum > $userProgress) {
        $moduleNumUpdate = mysqli_query($con, "UPDATE user_progress SET moduleNum=$moduleNum WHERE email='$email'");
        header("location:account.php?q=result&eid=$moduleID&attempt=$attempt");
      }

      
    }
  }
}

//restart quiz
if (@$_GET['q'] == 'quizre' && @$_GET['step'] == 25) {
  $moduleID = @$_GET['eid'];
  $n = @$_GET['n'];
  $t = @$_GET['t'];
  $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$moduleID' AND email='$email'") or die('Error156');

  while ($row = mysqli_fetch_array($q)) {
    $s = $row['score'];
  }

  $q = mysqli_query($con, "DELETE FROM `history` WHERE eid='$moduleID' AND email='$email' ") or die('Error184');
  $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
  while ($row = mysqli_fetch_array($q)) {
    $sun = $row['score'];
  }

  $sun = $sun - $s;
  $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');

  header("location:account.php?q=quiz&step=2&eid=$moduleID&n=1&t=$t");
}
