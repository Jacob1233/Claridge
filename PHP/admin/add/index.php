<?php

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

    <?php
        if ( isset($_GET['success'])) {
            echo '<div class="alert alert-success" role="alert">Book successfully added!</div>';
        }
      ?>

        
        <form class="form-horizontal" method="post" action="action.php">
            <fieldset>

            <!-- Form Name -->
            <legend>Book Information</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="authfirstname">Author's First Name</label>  
              <div class="col-md-5">
              <input id="authfirstname" name="authfirstname" type="text" placeholder="" class="form-control input-md" required>
    
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="authmidname">Author's Middle Name (optional)</label>  
              <div class="col-md-5">
              <input id="authmidname" name="authmidname" type="text" placeholder="" class="form-control input-md">
    
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="authlastname">Author's Last Name</label>  
              <div class="col-md-5">
              <input id="authlastname" name="authlastname" type="text" placeholder="" class="form-control input-md" required>
    
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="title">Title</label>  
              <div class="col-md-5">
              <input id="title" name="title" type="text" placeholder="" class="form-control input-md" required>
    
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="genre">Select the Genre</label>
                <div class="col-md-5">
                <select id="genre" name="genre" class="form-control" required>
                    <option value="" disabled selected>Choose a Genre</option>
                    <option value="Fiction">Fiction</option>
                    <option value="History">History</option>
                    <option value="Short Story">Short Story</option>
                    <option value="Biography">Biography</option>
                    <option value="Large Print">Large Print</option>
                    <option value="Mystery">Mystery</option>
					<option value="Not Applicable">Not Applicable</option>
                </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="location">Select the Location</label>
                <div class="col-md-5">
                <select id="location" name="location" class="form-control">
                    <option value="" disabled selected>Choose a Location</option>
                    <option value="Hardbook Library">Hardbook Library</option>
                    <option value="Paperbook Library">Paperbook Library</option>
                    <option value="Health Center Library">Health Center Library</option>
                </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="pubdate">Publication Date (optional)</label>  
              <div class="col-md-5">
              <input id="pubdate" name="pubdate" type="text" placeholder="yyyy-mm-dd" class="form-control input-md">
    
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="purdate">Purchase Date (optional)</label>  
              <div class="col-md-5">
              <input id="purdate" name="purdate" type="text" placeholder="yyyy-mm-dd" class="form-control input-md">
    
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="description">Short Description (optional)</label>
              <div class="col-md-5">                     
                <textarea class="form-control" id="description" name="description" maxlength="255" rows="5"></textarea>
              </div>
            </div>

                <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4">
                <input type="submit" class="btn btn-primary"/>
                </div>
            </div>


            </fieldset>
        </form>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>