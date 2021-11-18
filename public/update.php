<?php
try {
	require "../config.php";
	require "../common.php";

  if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  }  

	$connection=new PDO($dsn, $username, $password, $options);

	$sql="SELECT * FROM contacts";

	$statement = $connection->prepare($sql);
  	$statement->execute();
	$result = $statement->fetchAll();


} catch(PDOException $error){
	echo $sql . "<br>" . $error->getMessage();
}
?>


<?php require "templates/header.php"; ?>

<table>
  <thead>
    <tr>
        <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Address</th>
      <th>Mobile Number</th>
      <th>Home Number</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["firstname"]); ?></td>
      <td><?php echo escape($row["lastname"]); ?></td>
      <td><?php echo escape($row["address"]); ?></td>
      <td><?php echo escape($row["mobile_number"]); ?></td>
      <td><?php echo escape($row["home_number"]); ?></td>
      <td><?php echo escape($row["date"]); ?> </td>
      <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Bach to homepage</a>
<?php require "templates/footer.php"; ?>
