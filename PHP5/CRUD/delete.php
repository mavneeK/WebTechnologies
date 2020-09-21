<?php
include "db.php";

$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $query = "DELETE FROM users ";
    //.= is used to concatinate 
    $query .= "WHERE users.user_id='$id'";

    // result takes the result of the queerty and the mysqli_query command 
    // needs to have connection with it 
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query FAILED' . mysqli_error($connection));
    } else {
        header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col-xm-6">
            <form action="delete.php" method="post">
                <div class="form-group">
                    <label for="id">SELECT ID TO DELETE </label>
                    <select name="id" id="">
                        <?php
                        while ($row = mysqli_fetch_row($result)) {
                            echo print_r($row);
                            $id = $row[0];
                            echo "<option value='$id'>$id</option>";
                        }
                        ?>
                        <!-- <option value="">1</option> -->
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="DELETE">
            </form>
        </div>
    </div>
</body>

</html>