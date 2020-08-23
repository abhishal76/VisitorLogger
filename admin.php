<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <style type="text/css">
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
</head>
<body>
    <div class="container">

        <div class="page-header">
            <h1>VISITORS</h1>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a><b>Hello! <i class='glyphicon glyphicon-user'></i> <?php include 'users_database/config/database.php'; echo $_SESSION['user_username'] ?></b></a></li>
            <li><a href="logout.php"><b>Logout <i class='glyphicon glyphicon-off'></i></b></a></li>
        </ul>

    <?php
    if (isset($_GET['page'])) {
      // code...
      $page = $_GET['page'];
    } else {
      // code...
      $page = 1;
    }
    $records_per_page = 10;
    $from_record_num = ($records_per_page * $page) - $records_per_page;
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    if($action=='deleted'){
    echo "<div class='alert alert-success'><i class='glyphicon glyphicon-trash'></i> Record deleted.</div>";
    }

    $query = "SELECT * FROM visitor ORDER BY id DESC LIMIT $from_record_num, $records_per_page";
    $stmt = $conn->query($query);
    $num = $stmt->num_rows;

    echo "<a href='create.php' class='btn btn-primary m-b-1em'><i class='glyphicon glyphicon-plus'></i> Add Visitor Details</a>";
    echo "<form role='search' action='search.php'>";
        echo "<div class='input-group col-md-3 pull-center margin-right-1em m-b-1em'>";
            $search_value=isset($search_term) ? "value='{$search_term}'" : "";
            echo "<input type='text' class='form-control' placeholder='Type visitor name or apartment no...' name='s' id='srch-term' required {$search_value} />";
            echo "<div class='input-group-btn'>";
                echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
            echo "</div>";
        echo "</div>";
    echo "</form>";

    if($num>0){

        echo "<table class='table table-condensed table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Sr. No</th>";
            echo "<th>User Id</th>";
            echo "<th>User Name</th>";
            echo "<th>Visitor Name</th>";
            echo "<th>Apartment No.</th>";
            echo "<th>Check-In Time</th>";
            echo "<th>Action(s)</th>";
        echo "</tr>";
    while ($row = $stmt->fetch_assoc()){
        extract($row);
         $new_query ="SELECT username FROM user WHERE id = {$user_id}";
         $stmt2 = $conn->query($new_query);
         $new_row = $stmt2->fetch_assoc();
         if(empty($new_row)) return;
         extract($new_row);

        echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$VisitorName}</td>";
            echo "<td>{$Apartment}</td>";
            echo "<td>{$CheckIn}</td>";
            echo "<td>";
            echo "<a href='details.php?id={$id}' class='btn btn-info m-r-1em'><i class='glyphicon glyphicon-zoom-in'></i> View Details</a>";
            echo "<a href='update.php?id={$id}' class='btn btn-warning m-r-1em'><i class='glyphicon glyphicon-pencil'></i> Edit</a>";
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i> Delete</a>";
        echo "</td>";
    echo "</tr>";
}

    echo "</table>";
    $query = "SELECT COUNT(*) as total_rows FROM visitor";
    $stmt = $conn->query($query);
    $row = $stmt->fetch_assoc();
    $total_rows = $row['total_rows'];
    $page_url="admin.php?";
    include_once "paging.php";

    }

    else{
        echo "<div class='alert alert-success'> Welcome! Please Add Visitor Details</div>";
    }
?>

    </div>
    
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type='text/javascript'>
function delete_user( id ){

    var answer = confirm('Are you sure?');
    if (answer){
        window.location = 'delete.php?id=' + id;
    }
}
</script>
</body>
</html>
