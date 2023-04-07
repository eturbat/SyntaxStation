<?php
    include "dbConnection.php";
    session_start();

    switch ($_GET['search']) {
        case 'Student':
            $value = $_GET['searchValue'];
            $query = mysqli_query($con, "SELECT * FROM user, user_progress where user.email = user_progress.email and user.role='Student' and (user.name like '%$value%' or user.email like '%$value%')") or die('Error');
            $result = mysqli_fetch_all($query);

            print json_encode($result);
            
            break;
        case 'Faculty':
            $value = $_GET['searchValue'];
            $query = mysqli_query($con, "SELECT * FROM user, user_progress where user.email = user_progress.email and user.role='Faculty' and (user.name like '%$value%' or user.email like '%$value%')") or die('Error');
            $result = mysqli_fetch_all($query);
        
            print json_encode($result);
            
            break;
        case 'userHistory':
            $value = $_GET['searchValue'];
            $query = mysqli_query($con, "SELECT * FROM history, quiz WHERE history.eid = quiz.eid and history.email like '%$value%' ORDER BY history.date DESC;") or die('Error');
            $result = mysqli_fetch_all($query);
        
            print json_encode($result);
            break;
        
        default:
            # code...
            break;
    }
?>