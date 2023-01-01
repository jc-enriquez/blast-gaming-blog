

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Blast</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                    <?php
                    
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_tile = $row['cat_title'];
                        
                        echo "<li><a href='#'>{$cat_tile}</a></li>";
                    }
                    ?>
                    
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    
                    <li>
                        <a href="./registration.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>