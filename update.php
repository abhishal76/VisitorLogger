<!DOCTYPE HTML>
<html>
<head>
    <title>Update Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">

        <div class="page-header">
            <h1>Update Details</h1>
        </div>

        <?php
            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
            include 'users_database/config/database.php';
                $query = "SELECT id, VisitorName, MobileNumber, VisitorAddress, Apartment, WhomtoMeet, ReasontoMeet, CheckIn From visitor WHERE id = {$id} LIMIT 0,1";
                $stmt = $conn->query($query);
                $row = $stmt->fetch_assoc();
                $visname = $row['VisitorName'];
                $mobilenumber = $row['MobileNumber'];
                $vistaddress = $row['VisitorAddress'];
                $apt = $row['Apartment'];
                $whom = $row['WhomtoMeet'];
                $reason = $row['ReasontoMeet'];
                $checkin = $row['CheckIn'];
            ?>
        <?php

        if($_POST){

            try{
                $query = "UPDATE visitor SET VisitorName= ?, MobileNumber=?, VisitorAddress=?, Apartment=?, WhomtoMeet=?, ReasontoMeet=?, CheckIn =?, user_id=?
                            WHERE id = {$id}";
                $stmt = $conn->prepare($query);
                $visname=$_POST['visname'];
                $mobilenumber=$_POST['mobilenumber'];
                $vistaddress =$_POST['vistoraddress'];
                $apt = $_POST['aptnumber'];
                $whom = $_POST['whomtomeet'];
                $reason = $_POST['reason'];
                $tz = 'America/New_York';
                $tz_obj = new DateTimeZone($tz);
                $today = new DateTime("now", $tz_obj);
                $today_formatted = $today->format('Y-m-d H:i:s');
               $stmt->bind_param('sisssssi', $visname, $mobilenumber,$vistaddress,$apt,$whom,$reason,$today_formatted,$_SESSION['user_id']);
                if($stmt->execute()){
                    echo "<div class='alert alert-success'><i class='glyphicon glyphicon-ok-circle'></i> Details Updated.</div>";
                }else{
                    echo "<div class='alert alert-danger'><i class='glyphicon glyphicon-arrow-left'></i> Unable to update details. Please try again!</div>";
                }

            }

    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Visitor Name</td>
            <td><input type='text' name='visname' value="<?php echo $visname;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Mobile Number</td>
            <td><input type="number" name="mobilenumber" value="<?php echo $mobilenumber;  ?>" class="form-control"/></td>
        </tr>
        <tr>
            <td>Visitor Address</td>
            <td><textarea name="vistoraddress" class='form-control'><?php echo $vistaddress;  ?></textarea></td>
        </tr>
        <tr>
            <td>Apartment No.</td>
            <td><input type='text' name='aptnumber' value="<?php echo $apt;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Whom To Meet</td>
            <td><input type='text' name='whomtomeet' value="<?php echo $whom;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Reason To Meet</td>
            <td><input type='text' name='reason' value="<?php echo $reason;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <?php if ($_SESSION['user_type'] == "1") {?>
                <a href='admin.php' class='btn btn-danger'><i class='glyphicon glyphicon-arrow-left'></i> Back to Dashboard</a>
                <?php } else {?>
                    <a href='home.php' class='btn btn-danger'><i class='glyphicon glyphicon-arrow-left'></i> Back to Dashboard</a>
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
