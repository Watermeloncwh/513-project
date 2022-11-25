<?php

// check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    //include config file
    require_once "config2.php";

    //prepare a select statement
    $sql = "SELECT * FROM  employees WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        //bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        //set parameters
        $param_id = trim($_GET["id"]);

        //attempt to edxecute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $name = $row["name"];
                $address = $row["address"];
                $username = $row["username"];
                $password = $row["password"];
                $salary = $row["salary"];
            } else{
                header("location: error.php");
            }
        } else{
            echo "Oops! Something went wrong, Please try again later.";
        }
    }
    // close statement
    mysqli_stmt_close($stmt);

    //close connection
    mysqli_close($link);

} else{
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=“http://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css”>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record </h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <p><b><?php echo $row["address"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>username</label>
                        <p><b><?php echo $row["username"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <p><b><?php echo $row["password"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Salary</label>
                        <p><b><?php echo $row["salary"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                 </div>
            </div>
        </div>
    </div>
    
</body>
</html>

