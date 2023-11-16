<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
    <title>MANHUNT - TRACE</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/fav/fav.ico" type="image/x-icon">
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/all.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php
session_start();







if (isset($_SESSION['id'])) {
    echo '

        <body>
            <div class="navbar navbar-inverse set-radius-zero" >
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/img/tracking.png" width="70" height="70"/>
                        </a>
                    </div>
<div class="right-div">
    <a href="logout.php" class="btn btn-danger pull-right"><i class="fas fa-sign-out-alt"></i> Log out</a>
</div>
<div class="right-div">
                        <a class="btn btn-success pull-right"><i class="fa fa-user"></i> User: ' . $_SESSION['pseudo'] . '</a>
</div>
</div>
</div>
<!-- LOGO HEADER END-->
            <section class="menu-section">
				<div class="container">
					<div class="row ">
						<div class="col-md-12">
							<div class="navbar-collapse collapse ">
								<ul id="menu-top" class="nav navbar-nav navbar-right">
								<li>
                                <a href="index.php"> Home</a>
                                </li>
                                <li>
                                <a>|</a>
                                </li>
                                <li>
                                <a href="catalog.php"> Catalog of Punishments</a>
                                </li>
                                <li>
                                <a>|</a>
                                </li>
                                <li>
                                    <a href="manhunt.php"> Manhunts</a>
                                </li>
                                <li>
                                <a>|</a>
                                </li>
                                <li>
                                    <a href="records.php"> Criminal Records</a>
                                </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
            <!-- MENU SECTION END-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">Manhunt / Arrest Warrants</h4>
                        </div>
                    </div>
                    <form method="get" action="add_manhunt.php"> 
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Entry</button>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Crime</th>
                                                    <th>Sanction to be imposed</th>
                                                    <th>
                                                    Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                    ';
    include("config.php");
    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM manhunt');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
?>
</td>
<td>
    <?php
        echo $data['name'];
?>
</td>
<td class="center">
    <?php
        echo $data['crime'];
?>
</td>
<td class="center">
    <?php
        echo $data['sanction'];
?>
</td>
<form action='delete_entry_manhunt
.php' method='post'>
    <?php
        echo '<td>
                                                             <button type="submit" name="deleteItem" class="btn btn-danger" value="' . $data['id'] . '"><i class="fa fa-trash"></i> Delete</button>
                                                     </td>';
?>
</form>
</tr>
<?php
    }
    $reponse->closeCursor(); // Complete query
    echo '

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                    <!-- /. ROW  -->
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. ROW  -->
            <!-- End  Hover Rows  -->
        </div>
        <div class="col-md-6">
            <!--    Context Classes  -->
            <!--  end  Context Classes  -->
        </div>
    </div>
    <!-- /. ROW  -->
</div> </div> <!-- CONTENT-WRAPPER SECTION END--> <section class="footer-section">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            Coded by : RootK1d | Based on : Davendrix&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}
?>

</html>