<?php include "includes/admin-header.php";?>

<body>

    <div id="wrapper">
       <?php include "includes/admin-navigation.php";?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        
                        <?php
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source ='';
                        }
                        
                        switch($source) {
                            case 'add_post':
                                include "includes/add-posts.php";
                                break;
                                
                            case 'edit_post':
                                include "includes/edit-posts.php";
                                break;
                            default:
                                include "includes/view-all-comments.php";
                                break;
                        }
                        
                        
                        ?>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php include "includes/admin-footer.php";?>
 
