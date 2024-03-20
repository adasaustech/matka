<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>  New Employee</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    //Daily Data
                    $sql = "SELECT id, entryDate, mOpenOP,mOpenPN FROM pNumberN";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo " Date: " . $row["entryDate"]. "<br>";
                                    echo "<br>";
                                    echo  "<br>";
                                    echo " Matka Supermarket Morning Open -11 AM " . "<br>";
                                    echo "Open Pana" . $row["mOpenOP"]. "<br>";
                                    echo "Pass No." . $row["mOpenPN"]. "<br>";
                                    echo "<br>";
                                    echo  "<br>";
                                    echo " Matka Supermarket Morning Close -2 PM " . "<br>";
                                    echo "Open Pana" . $row["mOpenOP"]. "<br>";
                                    echo "Pass No." . $row["mOpenPN"]. "<br>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
   





                    // Attempt select query execution
                    $sql = "SELECT * FROM pNumberN";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                       
                                    echo "<th>id</th>";
                                    echo "<th>Entry Date</th>";
                                    echo "<th>11 AM Open</th>";
                                    echo "<th>11 AM Pass</th>";
                                    echo "<th>2 PM Open</th>";
                                    echo "<th>2 PM Pass</th>";
                                    echo "<th>4 PM Open</th>";
                                    echo "<th>4 PM Pass</th>";
                                    echo "<th>6:30 PM Open</th>";
                                    echo "<th>6:30 PM Pass</th>";
                                    echo "<th>9:30 PM Open</th>";
                                    echo "<th>9:30 PM Pass</th>";
                                    echo "<th>12 AM Open</th>";
                                    echo "<th>12 AM Pass</th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                       echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['entryDate'] . "</td>";
                                        echo "<td>" . $row['mOpenOP'] . "</td>";
                                        echo "<td>" . $row['mOpenPN'] . "</td>";
                                        echo "<td>" . $row['mCloseOP'] . "</td>";
                                        echo "<td>" . $row['mClosePN'] . "</td>";
                                        echo "<td>" . $row['eOpenOP'] . "</td>";
                                        echo "<td>" . $row['eOpenPN'] . "</td>";
                                        echo "<td>" . $row['eCloseOP'] . "</td>";
                                        echo "<td>" . $row['eClosePN'] . "</td>";
                                        echo "<td>" . $row['nOpenOP'] . "</td>";
                                        echo "<td>" . $row['nOpenPN'] . "</td>";
                                        echo "<td>" . $row['nCloseOP'] . "</td>";
                                        echo "<td>" . $row['nClosePN'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?entryDate='. $row['entryDate'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?entryDate='. $row['entryDate'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?entryDate='. $row['entryDate'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>