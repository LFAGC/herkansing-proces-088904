<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'session.inc.php';
    require 'config.php';

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM user WHERE id = $id";

    $result = mysqli_query($mysqli, $sql);
    $userdata = mysqli_fetch_array($result);

    if (isset($_POST['title']) && isset($_POST['description'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $private = $_POST['checkbox'];

        if ($private == 'on') {
            $private = 0;
        } else {
            $private = 1;
        }

        $sql = "INSERT INTO photo (title, description, user_id, private) VALUES ('$title', '$description', $id, $private)";

        $result = mysqli_query($mysqli, $sql);
        $postid = mysqli_insert_id($mysqli);


        if ($result) {
            if (!empty($_FILES) && isset($_FILES['imagefile'])) {
                $image = $_FILES['imagefile'];

                $allowed_types = array('image/jpeg', 'image/png');

                if (in_array($image['type'], $allowed_types)) {
                    if ($image['error'] == UPLOAD_ERR_OK) {
                        $image_name = $image['name'];
                        $image_tmp_name = $image['tmp_name'];
                        $image_size = $image['size'];
                        $image_type = $image['type'];

                        $image_filetype = str_replace('image/', '.', $image_type);
                        $target_file = './uploads/'.$id.'-'.$postid.''.$image_filetype;

                        if ($image_size < 5000000) {
                            $imagefile = imagecreatefrompng($image['tmp_name']);

                            if ($imagefile !== false) {
                                imagepng($imagefile, $target_file);
                                imagedestroy($imagefile);

                                $sql = "UPDATE photo SET path = '$target_file' WHERE id = $postid";
                                $result = mysqli_query($mysqli, $sql);

                                if ($result) {
                                    header('Location: profile.php');
                                } else {
                                    removeFailedPost($mysqli, $postid);
                                }
                            } else {
                                removeFailedPost($mysqli, $postid);
                            }
                        } else {
                            removeFailedPost($mysqli, $postid);
                        }
                    } else {
                        removeFailedPost($mysqli, $postid);
                    }
                } else {
                    removeFailedPost($mysqli, $postid);
                }
            } else {
                removeFailedPost($mysqli, $postid);
            }
        } else {
            echo 'Failed!';
        }
    }
}

function sanitizeFileName($fileName) {
    $sanitizedFileName = preg_replace("/[^a-zA-Z0-9.]/", "", $fileName);
    return $sanitizedFileName;
}

function removeFailedPost($mysqli, $postid) {
    $sql = "DELETE FROM photo WHERE id = $postid";
    mysqli_query($mysqli, $sql);

    header('Location: post.php');
}