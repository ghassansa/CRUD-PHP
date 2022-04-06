<!DOCTYPE html>
<html>
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <body>

        <?php require_once 'process.php'; ?>
        

        <?php if (isset ($_SESSION['message']));?>
        <div -<?=$_SESSION['msg_type']?>">


        <?php
            $mysqli = new mysqli('localhost', 'root','', 'crud') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM  crud") or die($mysqli->error);
            //pre_r($result);
            //  pre_r($result->fetch_assoc());
            //  pre_r($result->fetch_assoc());

        ?>

        <div class="show-data">
        <table class="name-bar">
        <thead>
                <tr>
                <th>Name</li>
                <th>Age</li>
                <th colspan="2">Action</li>
                </tr>
        </thead>

                <?php
            while ($row = $result->fetch_assoc()){ ?>
            <tr>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['age' ]; ?></td>
             <td>
                <a href="index.php?edit=<?php echo $row['ID']; ?>" 
                class="btn">Edit</a>
                <a href="process.php?delete=<?php echo $row['ID']; ?>" 
                class="btn">Delete</a>
             </td>
            </tr>
            <?php }; ?>
        </table>
        </div>

        <?php

            function pre_r( $array ) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
            }
        ?>

        <div class="row">
            <form action="process.php" method="POST">
                <div class="form-group1">
                    <label>Name:</label>
                    <input type="text" name="Name" class="form-contol" >
                </div>
                <div cass="form-group">
                    <label>Age:</label>
                    <input type="number" name="Age" class="form-contol" >
                </div>
                <div class="form-buttons">
                    <button type="submit" name="save">Save</button>
                    <!-- <button type="submit" name="delete" >Delete</button> -->
                </div>
            </form>
         </div>
    </body>
</html>