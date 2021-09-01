<?php
require_once 'template/header.php';

if(isset($_GET['id']) && $_GET['id']!= '') {
    $data = deleteArticle($conn, $_GET['id']);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                    if($data) {
                        echo 'Article was deleted';
                    }
                    else {
                        echo 'Error!'.$data;
                    }
                ?>
            </div>
        </div>
    </div>
<?php
}

mysqli_close($conn);
?>
