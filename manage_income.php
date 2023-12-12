<?php
include("session.php");
$income_fetched = mysqli_query($con, "SELECT * FROM income WHERE user_id = '$userid'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Income Manager - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="120">
                <h5><?php echo $username ?></h5>
                <p><?php echo $useremail ?></p>
            </div>
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="home"></span> Dashboard</a>
                <a href="add_expense.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span> Add Expenses</a>
                <a href="income_page.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span> Add Income</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> Manage Finances</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> Manage Income</a>
            </div>
            <div class="sidebar-heading">Settings</div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <button class="btn" id="menu-toggle"><span data-feather="menu"></span></button>
                <!-- Navbar content here -->
            </nav>
            <div class="container-fluid">
                <h3 class="mt-4 text-center">Manage Income</h3>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; while ($row = mysqli_fetch_assoc($income_fetched)) { ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row['income_date']; ?></td>
                                    <td><?php echo '$' . $row['income']; ?></td>
                                    <td class="text-center">
                                        <a href="edit_income.php?edit=<?php echo $row['income_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="delete_income.php?delete=<?php echo $row['income_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php $count++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        feather.replace()
    </script>
</body>
</html>