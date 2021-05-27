<?php
  include('database_connection.php')
  if(isset($_POST['poll_option']))
  {
      $query = "
         INSERT INTO poll_table(php_author) VALUES (:php_author)
      "
      $data = array(
          ':php_author' => $_POST["poll_option"]
      )
      $statement = $connect -> prepare($query)
      $statement -> execute($data)
    }

?>