<?php
$out = '<div class="list-group">';
for ($i = 0; $i < count($category); $i++) {
    $out .= "<a href='category.php?id={$category[$i]['id']}' class='list-group-item list-group-item-action'>";
    $out .= "{$category[$i]['category']}</a>";
}
echo $out;
echo '</div>';
?>