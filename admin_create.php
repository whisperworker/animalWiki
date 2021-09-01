<?php
require_once 'template/header.php';

if(isset($_POST['title']) && $_POST['title'] != ''){
    $title = $_POST['title'];
    $descrMin = $_POST['descr-min'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tags = trim($_POST['tag']);
    $tags = explode(",", $tags);
    $newTags = [];
    for ($i = 0; $i < count($tags); $i++) {
        if (trim($tags[$i])!='') {
             $newTags[] = trim($tags[$i]);
        }
    }

    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);

    $conn = connect();

    $sql = "INSERT INTO info (title, category, descr_min, description, image)
    VALUES ('$title', 1, '$descrMin', '$description', '$image')";

    if (mysqli_query($conn, $sql)) {
        $lastId = mysqli_insert_id($conn);
        for($i = 0; $i < count($newTags); $i++) {
            $sql = "INSERT INTO tag (tag, post)
            VALUES ('$newTags[$i]', '$lastId')";
            mysqli_query($conn, $sql);
        }

        setcookie('bd_create_success', 1, time() + 10);
        header('Location: /admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Create post</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="descr-min">Min description</label>
                    <input type="text" name="descr-min" class="form-control" id="descr-min">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <input type="text" name="tag" class="form-control" id="tag" placeholder="one, two">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" id="category">
                </div>
                <div class="form-group">
                    <label for="image">Photo</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>
                <div class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="Add new article">
                </div>
            </form>
        </div>

    </div>
</div>




<?php
require_once 'template/footer.php';
?>





