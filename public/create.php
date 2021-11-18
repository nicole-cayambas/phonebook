<?php
if(isset($_POST['submit'])){
    require '../common.php';
    require '../config.php';
    try{
        $connection = new PDO($dsn, $username, $password, $options);
        $new_contact = array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'address' => $_POST['address'],
            'mobile_number' => $_POST['mobile_number'],
            'home_number' => $_POST['home_number']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "contacts",
            implode(", ", array_keys($new_contact)),
            ":". implode(", :", array_keys($new_contact))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_contact);
    } catch(PDOException $error){
        echo $sql.'<br>'.$error->getMessage();
    }
}
?>
<?php require "templates/header.php" ?>

<?php if(isset($_POST['submit']) && $statement){ ?>
    <blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a contact</h2> 
<form method="post"> 	
    <label for="firstname">First Name</label> 	
    <input type="text" name="firstname" id="firstname"> 	
    <label for="lastname">Last Name</label> 	
    <input type="text" name="lastname" id="lastname"> 	
    <label for="address">Address</label> 	
    <input type="text" name="address" id="address"> 		
    <label for="mobile_number">Mobile Number</label> 	
    <input type="text" name="mobile_number" id="mobile_number"> 	
    <label for="home_number">Home Number</label> 	
    <input type="text" name="home_number" id="home_number"> 	
    <input type="submit" name="submit" value="Submit"> 
</form> 
<a href="index.php">Back to home</a>
<?php require "templates/footer.php" ?>