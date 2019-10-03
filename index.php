<?php 
$host = 'localhost';
$username = 'sample';
$passwd = 'sample';
$dbname = 'sample';

$db = mysqli_connect($host, $username, $passwd, $dbname);
 ?>


<?php

    if(isset($_POST['insert']) ){
        $name = $_REQUEST['name'];
        $sql = "INSERT INTO phptodo.tasks VALUES(0,'$name');";
        $update = $db->query($sql);
    }elseif(isset($_POST['del'])){
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM phptodo.tasks WHERE id = $id ";
        $del = $db->query($sql);
    }
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
<style>
button{
  margin-bottom: 0rem;
  background-color: skyblue;
  border-color: black;
}
input[type="submit"]{
  background-color: skyblue;
  border-color: black;
}
form{
  margin-bottom: 0rem;
}
</style>
<body class="container">
    <h1>Todo List</h1>
    <form method="post" action="">
      <input type='text'name="name" value="">
      <input type="submit" value="登録する" name="insert"/>
    </form>
    <h2>Current phptodo</h2>
    <table class="table table-striped">
        <thead><th>Task</th><th></th></thead>
        <tbody>
      <?php
          $cmd = 'SELECT * FROM phptodo.tasks;';
          $sth = $db->query($cmd);
          foreach($sth as $row) {
      ?>
            <tr>
                <td><?= htmlspecialchars($row['name']);?></td>
                <td>
                    <form method="POST">
                        <button type="submit" name="delete">Delete</button>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="del" value="true">
                    </form>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>

<?php
$sql = "INSERT INTO phptodo.Shohin VALUES('$id','$name');";
$Insert = $db->query($sql);
?>