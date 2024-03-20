<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$MOpenO = $MOpenP = $EOpenO =$EOpenP =$NOpenO =$NOpenP = "";
$MCloseO = $MCloseP = $ECloseO =$ECloseP =$NCloseO =$NCloseO = "";

$MOpenO_err = $MOpenP_err = $EOpenO_err =$EOpenP_err =$NOpenO_err =$NOpenP_err = "";
$MCloseO_err = $MCloseP_err = $ECloseO_err =$ECloseP_err =$NCloseO_err =$NCloseO_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_MOpenO = trim($_POST["MOpenO"]) ;
    if(empty($input_MOpenO)){
        $MOpenO_err = "Please enter a valid number.";
    } elseif(!filter_var($input_MOpenO, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $MOpenO_err = "Please enter a valid name.";
    } else{
        $MOpenO = $input_MOpenO;
    }
    
    // Validate salary
    $input_MOpenP = trim($_POST["MOpenP"]);
    if(empty($input_MOpenP)){
        $MOpenP_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_MOpenP)){
        $MOpenP_err = "Please enter a positive integer value.";
    } else{
        $MOpenP = $input_MOpenP;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO pNumber (entryDate,mOpenOP, mOpenPN,mCloseOP, mClosePN,eOpenOP, eOpenPN,eCloseOP, eClosePN,nOpenOP, nOpenPN,nCloseOP, nClosePN) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add New record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Entry Date</label>
                            <input type="date" name="date" size="30" <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                         </div>

                       <div class="form-group">
                            <label>11 Am Open Pana</label>
                            <input type="text" name="MOpenO" size="10" <?php echo (!empty($MOpenO_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $MOpenO; ?>">
                            <span class="invalid-feedback"><?php echo $MOpenO_err;?></span>
                        
                            <label>11 Am Pass Number</label>
                            <input type="text" name="MOpenP" size="10" <?php echo (!empty($MOpenP_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $MOpenP; ?>">
                            <span class="invalid-feedback"><?php echo $MOpenP_err;?></span>
                        </div>

                        
                        <div class="form-group">
                            <label>2 PM Open Pana</label>
                            <input type="text" name="MCloseO" size="10" <?php echo (!empty($MCloseO_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $MCloseO; ?>">
                            <span class="invalid-feedback"><?php echo $MCloseO_err;?></span>
                        
                            <label>2 PM Pass Number</label>
                            <input type="text" name="MCloseP" size="10" <?php echo (!empty($MCloseP_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $MCloseP; ?>">
                            <span class="invalid-feedback"><?php echo $MCloseP_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>4 PM Open Pana</label>
                            <input type="text" name="EOpenO" size="10" <?php echo (!empty($EOpenO_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $EOpenO; ?>">
                            <span class="invalid-feedback"><?php echo $EOpenO_err;?></span>
                        
                            <label>4 PM Pass Number</label>
                            <input type="text" name="EOpenP" size="10" <?php echo (!empty($EOpenP_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $EOpenP; ?>">
                            <span class="invalid-feedback"><?php echo $EOpenP_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>6:30 PM Open Pana</label>
                            <input type="text" name="ECloseO" size="10" <?php echo (!empty($ECloseO_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ECloseO; ?>">
                            <span class="invalid-feedback"><?php echo $ECloseO_err;?></span>
                        
                            <label>6:30 PM Pass Number</label>
                            <input type="text" name="ECloseP" size="10" <?php echo (!empty($ECloseP_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ECloseP; ?>">
                            <span class="invalid-feedback"><?php echo $ECloseP_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>9:30 PM Open Pana</label>
                            <input type="text" name="NOpenO" size="10" <?php echo (!empty($NOpenO_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $NOpenO; ?>">
                            <span class="invalid-feedback"><?php echo $NOpenO_err;?></span>
                        
                            <label>9:30 PM Pass Number</label>
                            <input type="text" name="NOpenP" size="10" <?php echo (!empty($NOpenP_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $NOpenP; ?>">
                            <span class="invalid-feedback"><?php echo $NOpenP_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>12 Am Open Pana</label>
                            <input type="text" name="NCloseO" size="10" <?php echo (!empty($NCloseO_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $NCloseO; ?>">
                            <span class="invalid-feedback"><?php echo $NCloseO_err;?></span>
                        
                            <label>12 Am Pass Number</label>
                            <input type="text" name="NCloseP" size="10" <?php echo (!empty($NCloseP_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $NCloseP; ?>">
                            <span class="invalid-feedback"><?php echo $NCloseP_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>