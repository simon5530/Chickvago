<?php
		// Get Form data
		$account = $_POST["user"];
		$passwd = $_POST["passwd"];
		$is_usertype = false;
		if(strlen($account)!=0 && strlen($passwd)!=0 ){
		echo "您的使用者名稱: "."$account <br>";	
		// echo "password: "."$passwd <br>";
		$is_usertype = true;
	}
		else{
		echo "註冊失敗 帳號或密碼未填";		
		}
		// Connect database
		include_once("dbtool.inc");
		$servername = "localhost";
		$username = "aicourse";
		$password = "";
		$dbname = "aicourse";

  	    // Check connection 	   
        $conn = create_connection($servername, $username, $password, $dbname);

        //Check whether there is same account name
        $sql = "SELECT * FROM users Where account = '$account'";
        $result = $conn->query($sql);

        // There exists same account
        if($result->num_rows !=0){
        	mysqli_free_result($result);
        	echo "抱歉 您的使用者名稱已經被使用過了 請按上一頁重新註冊";
        }
        // Unique account
        else{
        	echo "註冊成功";
        	// SQL Insert account and password to user table
        	$sql = "INSERT INTO users (account,password)
			VALUES ('$account', '$passwd')";
			//Insert and Check whthere successful
			if ($conn->query($sql) === false) {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			mysqli_free_result($result);
			$conn->close();
        	}
    }

?>