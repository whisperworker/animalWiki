<?php
require_once 'template/header.php';
$data = selectArticle($conn);
$tag = selectArticleTag($conn);

mysqli_close($conn);
?>
<div class="container ">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        $out = '';
                        $out .= "<h1 class='text-center'>{$data['title']}</h1>";
                        $out .= '<div>';
                        $out .= "<img src='images/{$data['image']}' class='rounded mx-auto d-block mt-5 mb-5' width='350'>";
                        $out .= '</div>';
                        $out .= "<div class='text-justify'><h5>{$data['descr_min']}</h5>";
                        $out .= "{$data['description']}</div>";
                    echo $out;
                    ?>
                </div>
                <div class="col-lg-12 text-center">
                    <?php
                    for ($i = 0; $i < count($tag); $i++) {
                        echo "<a href='tag.php?tag={$tag[$i]['tag']}' class='badge badge-info p-2 m-2'>{$tag[$i]['tag']}</a>";
                    }
                    ?>
                </div>
            </div>
        </div><!--col-lg-9-->
        <div class="col-lg-3">
            <?php require_once 'template/nav.php'; ?>
        </div>
    </div>
</div>

</div><!--content-->


<?php
require_once 'template/footer.php';
?>



