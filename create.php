<!DOCTYPE HTML>
<html>
<head>
    <title>Enter Visitor Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Enter Visitor Details</h1>
        </div>
        <?php
        include 'users_database/config/database.php';
if($_POST){
    try{
        $query = "INSERT INTO visitor (VisitorName,MobileNumber,VisitorAddress,Apartment,WhomtoMeet,ReasontoMeet,CheckIn,user_id) values (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $visitorname=$_POST['visname'];
        $mobilenumber=$_POST['mobilenumber'];
        $address =$_POST['vistoraddress'];
        $apartment = $_POST['aptnumber'];
        $whomtomeet = $_POST['whomtomeet'];
        $reasontomeet = $_POST['reason'];
        $tz = 'America/New_York';
        $tz_obj = new DateTimeZone($tz);
        $today = new DateTime("now", $tz_obj);
        $today_formatted = $today->format('Y-m-d H:i:s');
        $stmt->bind_param('sisssssi', $visitorname, $mobilenumber,$address,$apartment,$whomtomeet,$reasontomeet,$today_formatted,$_SESSION['user_id']);
        if($stmt->execute()){
            echo "<div class='alert alert-success'><i class='glyphicon glyphicon-ok-circle'></i> Details Saved</div>";
        }else{
            echo "<div class='alert alert-danger'><i class='glyphicon glyphicon-ban-circle'></i> Unable to save details.</div>";
        }

    }
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Visitor Name</td>
            <td><input type='text' name='visname' class='form-control' required></td>
        </tr>
        <tr>
            <td>Mobile Number</td>
            <td><input type='number' name='mobilenumber' class='form-control' required></td>
        </tr>
        <tr>
            <td>Visitor Address</td>
            <td><textarea name="vistoraddress" class='form-control' required></textarea></td>
        </tr>
        <tr>
            <td>Whom To Meet</td>
            <td><input type="text" name="whomtomeet" class="form-control" required></td>
        </tr>
        <tr>
            <td>Apartment No.</td>
            <td><input type="text" name="aptnumber" class="form-control" required></td>
        </tr>
        <tr>
            <td>Reason To Meet</td>
            <td><input type="text" name="reason" class="form-control" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <?php if ($_SESSION['user_type'] == "1") {?>
                <a href='admin.php' class='btn btn-danger'><i class='glyphicon glyphicon-arrow-left'></i> Back to Vistors Dashboard</a>
                <?php } else {?>
                    <a href='home.php' class='btn btn-danger'><i class='glyphicon glyphicon-arrow-left'></i> Back to Vistors Dashboard</a>
                    <?php } ?>
            </td>
        </tr>
    </table>
</form>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
