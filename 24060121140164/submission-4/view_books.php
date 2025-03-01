<?php include('./header.php') ?>
<style>
    body {
        background-image: url('./images/perpustakaan.jpg'); 
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php

            require_once('./lib/db_login.php');

    
            $query = "SELECT * FROM books ORDER BY isbn" ;
            $result = $db->query($query);
            if (!$result){
                die ("Could not the query the database: <br />" . $db->error ."<br>Query: " . $query);
            }

     
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>' . $row->isbn . '</td>';
                echo '<td>' . $row->author . '</td>';
                echo '<td>' . $row->title . '</td>';
                echo '<td>$' . $row->price . '</td>';
                echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
                echo '</tr>';
                $i++;
            }
            echo '</table>';
            echo '<br />';
            echo 'Total Rows = ' . $result->num_rows;

            $result->free();
            $db->close();
            ?>
    </div>
</div>
<?php include('./footer.php') ?>