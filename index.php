<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>PHP CRUD</title>
  </head>
  <body>
      <?php require_once 'process.php'; ?>
      
      <?php if (isset($_SESSION['message'])): ?>
      
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php
             echo $_SESSION['message'];
             unset($_SESSION['message']);
          ?>
      </div>
      
      <?php endif ?>
      
      <div class="container">
      <?php
         $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
         $result = $mysqli->query("SELECT * FROM data") or die(mysqli_error($mysqli));
      ?>
      
      <div class="row justify-content-center">
          <table class="table">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Location</th>
                      <th colspan="2">Action</th>
                  </tr>
              </thead>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>"
                       class="btn btn-info">Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
          <?php endwhile; ?>
          </table>
      </div>
      
      
      
      <div class="row justify-content-center">
      <form action="process.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-group">
          <label>Name</label>
          <input type="name" name="name" class="form-control" 
                 value="<?php echo $name; ?>" placeholder="Enter your name">
          </div>
          <div class="form-group">
          <label>Location</label>
          <input type="name" name="location" class="form-control" 
                 value="<?php echo $location; ?>" placeholder="Enter your location">
          </div>
          <div>
          <?php if ($update): ?>
              <button type="submit" name="update" class="btn btn-info">Update</button>
          <?php else: ?>
              <button type="submit" name="save" class="btn btn-primary">Save</button>
          <?php endif ?>
          </div> 
      </form>
      </div>
      </div>
      <br>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>