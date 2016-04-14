<?php
include '../includes/index.php';
$text = mysqli_real_escape_string($conn, $_POST['searchtext']);
$text = str_replace(' ', '%', $text);
?>

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
  </head>
  <body>
    <div class="container">

        <div class="cus-nav">
            <ol class="breadcrumb">
                <li><a href="../../">Home</a></li>
                <li><a href="../">Books</a></li>
                <li class="active">Search</li>
            </ol>
        </div>

        <div class="jumbotron">
            <h1>Books in the Claridge Court Library</h1>
            <p>Search results</p>
        </div>

        <table class="table table-condensed table-striped" style="margin-top: 20px;">
          <tr>
            <th>Author</th><th>Title</th><th>Publication Date</th><th>Purchase Date</th><th>Genre</th><th>Description</th>
          </tr>
            <?php
            if ($_POST['optionsRadios'] == 'byauth'){
                $result = mysqli_query($conn, "
                SELECT * FROM BookAuthors
	                JOIN AuthorsInBooks
		                ON BookAuthors.ID = AuthorsInBooks.AuthorID
	                JOIN Books
		                ON Books.ID = AuthorsInBooks.BookID
                WHERE CONCAT(FirstName, ' ', MiddleName, ' ', LastName) LIKE" . "'%" . $text . "%'"
                );

                while($row = mysqli_fetch_array($result)){
                        echo '<tr> ' . '<td>' . $row['FirstName'] . " " . $row['LastName'] . '</td>' . '<td>' . $row['Title'] . '</td>' . '<td>' . $row['PublicationDate'] . '</td>' . '<td>' . $row['PurchaseDate'] . '</td>' . '<td>' . $row['GenreID'] . '</td>' . '<td>' . $row['Description'] . '</td>' .'</tr>';
                };
                $conn->close();
            }else{
                $result = mysqli_query($conn, "
                SELECT * FROM Books
	                JOIN AuthorsInBooks
		                ON Books.ID = AuthorsInBooks.BookID
	                JOIN BookAuthors
		                ON BookAuthors.ID = AuthorsInBooks.AuthorID
                WHERE Books.Title LIKE" . "'%" . $text . "%'"
                );

                if(mysqli_num_rows($result) == 0){
                    echo '</table><br><div class="alert alert-danger" role="alert">There are no results found for that search. Check your spelling and submit again or try a different search.</div>';
                }else{
                    while($row = mysqli_fetch_array($result)){
                            echo '<tr> ' . '<td>' . $row['FirstName'] . " " . $row['LastName'] . '</td>' . '<td>' . $row['Title'] . '</td>' . '<td>' . $row['PublicationDate'] . '</td>' . '<td>' . $row['PurchaseDate'] . '</td>' . '<td>' . $row['GenreID'] . '</td>' . '<td>' . $row['Description'] . '</td>' .'</tr>';
                    $conn->close();
                    echo '</table>';
                    };
                }
            };
            ?>
        

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>