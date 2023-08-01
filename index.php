<?php
include("taskbase.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="/website/index.php">
        <h2> Home </h2>
    </a>
    <a href="/website/result.php">
        <h2> Table </h2>
    </a>

    <form action="" method="POST">
        <h2> Income: </h2>
        <input type="number" name="payment" value=0> <br>
        <h2>Expense: </h2>
        <input type="number" name="payment1" value=0> <br>
        <h2>Currency:</h2>
        <input type="text" name="currency" value=""> <br>
        <h2>Comment</h2>
        <textarea name="comment"> </textarea><br><br>
        <button name="confirm" type="submit" value="confirm"> Confirm </button>
    </form>
</body>

</html>

<?php
if (isset($_POST["confirm"])) {
    if (!empty($_POST["currency"])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = $_POST["currency"];
            $income = $_POST["payment"];
            $expense = $_POST["payment1"];
            $difference = $_POST["payment"] - $_POST["payment1"];
            $comment = $_POST["comment"];
        }
        $sql = "INSERT INTO container (income,expense,type,difference,comment)
                VALUES ('$income','$expense','$type','$difference','$comment')";
        try {
            mysqli_query($conn, $sql);
            header("Location: result.php");
        } catch (mysqli_sql_exception) {
            echo "Something go wrong!";
        }
    } else {
        echo "Please Select any currency";
    }
}

mysqli_close($conn);
?>