<!DOCTYPE HTML>
<html>
<head>
    <title>Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>
    <div class="container">

        <div class="page-header">
            <h1>Details</h1>
        </div>
        <?php
            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
            include 'users_database/config/database.php';
            $query = "SELECT id, VisitorName, MobileNumber, VisitorAddress, Apartment, WhomtoMeet, ReasontoMeet, CheckIn FROM visitor WHERE id = {$id}";
            $stmt = $conn->query($query);
            $num = $stmt->num_rows;
            if ($num >0) {

            $row = $stmt->fetch_assoc();
             $visname = $row['VisitorName'];
             $mobilenumber = $row['MobileNumber'];
             $vistaddress = $row['VisitorAddress'];
             $apt = $row['Apartment'];
             $whom = $row['WhomtoMeet'];
             $reason = $row['ReasontoMeet'];
             $checkin = $row['CheckIn'];
            }
        ?>

        <table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Visitor Name</td>
        <td><?php echo $visname;  ?></td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td><?php echo $mobilenumber;  ?></td>
    </tr>
    <tr>
        <td>Visitor Address</td>
        <td><?php echo $vistaddress;  ?></td>
    </tr>
     <tr>
        <td>Apartment</td>
        <td><?php echo $apt;  ?></td>
    </tr>
     <tr>
        <td>Whom To Meet</td>
        <td><?php echo $whom;  ?></td>
    </tr>
     <tr>
        <td>Reason To Meet</td>
        <td><?php echo $reason ;  ?></td>
    </tr>
     <tr>
        <td>Check In</td>
        <td><?php echo $checkin ;  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php if ($_SESSION['user_type'] == "1") {?>
                <a href='admin.php' class='btn btn-danger'><i class='glyphicon glyphicon-arrow-left'></i> Back to Vistors Dashboard</a>
                <?php } else {?>
                    <a href='home.php' class='btn btn-danger'><i class='glyphicon glyphicon-arrow-left'></i> Back to Vistors Dashboard</a>
                    <?php } ?>
        </td>
    </tr>
</table>

    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
