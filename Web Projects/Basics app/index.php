
    <?php
        $serverName = "localhost";
        $userName ="root";
        $password = "";
        $dbName = "emad";
        try{
            //create connection
            $conn = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);
            //check connection
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected successfully"."<br>";
            if(isset($_POST['submit'])){
            $name = $_POST['cname'];
            $phone = $_POST['cphone'];
            $email = $_POST['cemail'];
            $address = $_POST['caddress'];
            $date = $_POST['cdate'];
            //create sql statement
            $sql = "INSERT INTO saue (Name, Phone, Email, Address, Date) VALUES ('$name', '$phone', '$email', '$address', '$date');";
            $conn->exec($sql);
            echo "new record add";
            }
        }catch(PDOException $e){
            echo "connected failed : ". $e->getMessage();
        }
        $conn = null;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework</title>

</head>
<body>
    <form action="index.php" method="POST">
<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  
  box-sizing: border-box;
}

input[type=submit] {
  width: 60%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left:25%;

}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left:10%;
  margin-right:10%;
}
</style>
<body>


<div>
  <form action="/action_page.php">
  <div>
            <label for="name">Name</label>
            <input type="text" name="cname" id="name">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="cphone" id="phone">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="cemail" id="email">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="caddress" id="address">
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="cdate" id="date">
        </div>
        <input type="submit" value="submit" name="submit">
  </form>

</div>

</body>
</html>





    </form>
</body>
</html>