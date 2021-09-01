<?php
require_once 'template/header.php';

$data = select($conn);
$categories = selectCategoriesById($conn);
mysqli_close($conn);

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
                echo '<h2>Admin-panel</h2>';

                echo "<div class='mt-2 text-right'>";
                echo "<a href='admin_create.php'><button class='btn btn-success mb-2'>Add New</button></a><div>";
                //Способ вывода данных из базы данных
                $out = '<table class="table table-striped">';
                $out .= '<tr><th>id</th><th>title</th><th>category</th><th>description min</th>';
                $out .= '<th>Image</th><th>Update</th><th>Delete</th></tr>';
                for ($i = 0; $i < count($data); $i++) {
                    $out .= "<tr><td>{$data[$i]['id']}</td>";
                    $out .= "<td>{$data[$i]['title']}";
                    $out .= "<td>{$categories[$i]['category']}";
                    $out .= "</td><td class='text-justify'>{$data[$i]['descr_min']}</td>";
                    $out .= "<td><img src='images/{$data[$i]['image']}' width=150></td>";
                    $out .= "<td><a href='admin_update.php?id={$data[$i]['id']}' class='btn btn-primary'>update</a></td>";
                    $out .= "<td><button data='{$data[$i]['id']}' class='check-delete btn btn-danger'>delete</button></td></tr>";
                }
                $out .= '</table>';
                echo $out;
            ?>
        </div>
    </div>
</div>

<script>
    window.onload = function () {
        let checkDelete = document.querySelectorAll('.check-delete');
        checkDelete.forEach(function (element) {
            element.onclick = checkDeleteFunction;
        })
        function checkDeleteFunction(event) {
            event.preventDefault();
            let a = confirm('Do you want delete?');
            if (a == true) {
                location.href = '/admin_delete.php?id='+this.getAttribute('data');
            }
            return false;
        }
    }


</script>




