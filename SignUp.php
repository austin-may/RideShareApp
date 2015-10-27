  <?php
    if(isset($_POST['submit'])){
      $data_missing = array();
      if(empty($_POST['username'])){
        $data_missing[] = 'Username';
        echo "You forgot a username!";
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
        $insertQuery = "INSERT INTO Users (Username, Password, FirstName, LastName) VALUES (?, ?, ?, ?)";
        $statement = mysqli_prepare($dbc, $insertQuery);

        mysqli_stmt_bind_param($statement, "ssss", $username, $password, $first_name, $last_name);
        mysqli_stmt_execute($statement);
        $affected_rows = mysqli_stmt_affected_rows($statement);
        if($affected_rows == 1){
          echo 'User added!';
          mysqli_stmt_close($statement);
          mysqli_close($dbc);
        }
        else{
          echo 'Error has occured';
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
