<?php
include "../includes/index.php";

$AuthLastName = mysqli_real_escape_string($conn, $_POST["authlastname"]);
$AuthFirstName = mysqli_real_escape_string($conn, $_POST["authfirstname"]);
$AuthMiddleName = mysqli_real_escape_string($conn, $_POST["authmidname"]);
$Title = mysqli_real_escape_string($conn, $_POST["title"]);
$Genre = mysqli_real_escape_string($conn, $_POST["genre"]);
$Location = mysqli_real_escape_string($conn, $_POST["location"]);
$YearWritten = mysqli_real_escape_string($conn, $_POST["pubdate"]);
$YearPurchased = mysqli_real_escape_string($conn, $_POST["purdate"]);
$Description = mysqli_real_escape_string($conn, $_POST["description"]);

$sql = "
START TRANSACTION;

INSERT INTO Books(Title, PublicationDate, PurchaseDate, Description, LocationID, GenreID)
VALUES('".$Title."', '".$YearWritten."','".$YearPurchased."','".$Description."','".$Location."','".$Genre."');

SET @bookid =  LAST_INSERT_ID();

INSERT INTO BookAuthors(FirstName, MiddleName, LastName)
VALUES('".$AuthFirstName."', '".$AuthMiddleName."', '".$AuthLastName."');

SET @authorid =  LAST_INSERT_ID();

INSERT INTO AuthorsInBooks(AuthorID, BookID)
VALUES(@authorid, @bookid);

COMMIT;
";

if (mysqli_multi_query($conn, $sql)) {
    
} else {
    echo '<div class="alert alert-danger" role="alert">There was an error:' . mysqli_error($conn) . '</div>';
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="http://www.lifespacecommunities.com/senior-living-kansas-city/wp-content/uploads/2014/05/cc_icon.png" />
    <title>Claridge Court Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		document.location = "index.php?success";
	</script>
  </head>
  <body>
    <div class="container">

        <div class="cus-nav">
            <ol class="breadcrumb">
                <li><a href="../../">Home</a></li>
                <li><a href="../">Admin</a></li>
                <li class="active">Add</li>
            </ol>
        </div>

        <div class="jumbotron">
            <h1>Add a book</h1>
            <p>...</p>
        </div>
        
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
