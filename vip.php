<?php

session_start();

// Include config file
require_once "config3.php";
 
// Define variables and initialize with empty values
$name = $address =  $username = $password = $salary = "";
$name_err = $address_err =  $username_err = $password_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }

    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "please enter an username";
    } else {
        $username = $input_username;
    }

    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "please enter an password";
    } else{
        $password = $input_password;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }



    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($username_err) && empty($password_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO vip (name, address, username, password, salary) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssiss", $param_name, $param_address, $param_username, $param_password, $param_salary );
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_username = $username;
            $param_password = $password;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: orderonline.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link real="icon" href="product-images/xiaotubiao.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  </title>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<img src="tubiao.png" width="200" height="100" alt=""/>

<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Welcome to Luca’s Loaves</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li ><a href="index2.php" accesskey="1" title="">Home</a></li>
                <li><a href="aboutus.php" accesskey="2" title="">About us</a></li>
				<li><a href="upload.php" accesskey="3" title="">Careers </a></li>
				<li><a href="orderonline.php" accesskey="4" title="">Order online </a></li>
				<li><a href="contactus.php" accesskey="5" title="">Contact Us</a></li>
                <li class="active"><a href="#" accesskey="6" title="">register vip</a></li>
			</ul>
		</div>
	</div>
</div>


<div class="wrapper">
	<div id="welcome" class="container">
    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        
                        <a href="orderonline.php" class="btn btn-secondary ml-2"><input type="submit" class="btn btn-primary" value="Submit">
                        </a>

	</div>
	
    <footer  class="footer2">  
        The creator of this website is IT20_hengdian world studio
          </footer>

</body>
</html>
