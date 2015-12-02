  <?php
    if(isset($_POST['submit'])){
      $data_missing = array();
      if(empty($_POST['username'])){
        $data_missing[] = 'Username';
        echo "You forgot a username! ";
      } else {
        $username = $_POST['username'];
      }

	    if(empty($_POST['password'])){

	        // Adds name to array
	        $data_missing[] = 'Answer';

	    } else{
	        $password = $_POST['password'];
        }

        if(empty($_POST['firstname'])){

  	        // Adds name to array
  	        $data_missing[] = 'First name';

  	    } else{
  	        $first_name = $_POST['firstname'];
          }

          if(empty($_POST['lastname'])){

    	        // Adds name to array
    	        $data_missing[] = 'Last name';

    	    } else{
    	        $last_name = $_POST['lastname'];
            }

      if(empty($data_missing)){
        require_once('connectMySQL.php');
        $insertQuery = "INSERT INTO Log_in (UserName, Password) VALUES (?, ?)";
        $statement = mysqli_prepare($dbc, $insertQuery);

        mysqli_stmt_bind_param($statement, "ss", $username, $password);
        mysqli_stmt_execute($statement);
        $affected_rows = mysqli_stmt_affected_rows($statement);
        if($affected_rows == 1){
          $insertQuery = "INSERT INTO User (UserName, FirstName, LastName) VALUES (?, ?, ?)";
          $statement = mysqli_prepare($dbc, $insertQuery);

          mysqli_stmt_bind_param($statement, "sss", $username, $first_name, $last_name);
          mysqli_stmt_execute($statement);
          $affected_rows = mysqli_stmt_affected_rows($statement);
          if($affected_rows == 1){
            echo "<script>alert('User added!');</script>";
            mysqli_stmt_close($statement);
            mysqli_close($dbc);
          }
        }
        else{
          echo "<script>alert('Error has occured');</script>";;
          echo mysql_error();
        }
      } else{
        echo 'You need to enter the following data<br />';
	        foreach($data_missing as $missing){
	            echo "$missing<br />";
        }

      }
    }
   ?>
