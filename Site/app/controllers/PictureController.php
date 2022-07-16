<?php

namespace App\controllers;

//#[\App\core\OtherFilter]

class PictureController extends \App\core\Controller {

    function index() {
        $currentProfile = new \App\models\Profile();
        $currentProfile = $currentProfile->findUserId($_SESSION['user_id']);

        $pictures = new \App\models\Picture();
        $pictures = $pictures->getAllPictures($currentProfile->profile_id);

        $picture_likes = new \App\models\PictureLike();
        $picture_likes = $picture_likes->findAllLikes();

        
        $getNameLikes = new \App\models\Profile();
        $getNameLikes = $getNameLikes->getAllProfiles();
        
        $this->view('Picture/notificationLikes', ['pictures' => $pictures, 'picture_likes' => $picture_likes, 'getNameLikes' => $getNameLikes]);

        foreach ($pictures as $pics) {
            foreach ($picture_likes as $likes) {
                if ($pics->picture_id == $likes->picture_id && $likes->read_status == "unseen") {
                    $likes->read_status = "seen";
                    $likes->update();
                }
            }
        }
    }

    function add() {
        if (isset($_POST['action'])) {
            if (isset($_FILES['myImage'])) {
                $imageProperties = getimagesize($_FILES['myImage']['tmp_name']);
                $allowedTypes = ['image/gif', 'image/jpeg', 'image/png'];
                if ($imageProperties !== false && in_array($imageProperties['mime'], $allowedTypes)) {
                    $extension = ['image/gif' => 'gif', 'image/jpeg' => 'jpg', 'image/png' => 'png'];
                    $extension = $extension[$imageProperties['mime']];
                    $target_folder = 'uploads/';

                    $targetFile = uniqid() . ".$extension";
                    if (move_uploaded_file($_FILES['myImage']['tmp_name'], $target_folder . $targetFile)) {
                        $picture = new \App\models\Picture();
                        $picture->filename = $targetFile;
                        $picture->caption = $_POST['caption'];
                        $profile = new \App\models\Profile();
                        $profile = $profile->findUserId($_SESSION['user_id']);
                        $picture->profile_id = $profile->profile_id;
                        $picture->insert();
                        header('location:' . BASE . '/Profile/index');
                    } else {
                        echo 'error';
                    }
                } else {
                    echo "INVALID: Please input an image of type '.gif', '.jpeg' or '.png'.<br><br>";
                    echo "<a href='" . BASE . "/Picture/add'>&#8592 Go Back to Upload</a>";
                }
            }
        } else
            $this->view('Picture/upload');
    }

    function delete($picture_id) {
        $currentProfile = new \App\models\Profile();
        $currentProfile = $currentProfile->findUserId($_SESSION['user_id']);

        $pictureLike = new \App\models\PictureLike();
        $pictureLike->deleteAll($picture_id);

        $picture = new \App\models\Picture();
        $picture = $picture->find($picture_id);

        $path = getcwd() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $picture->filename;
        unlink($path);
        $picture->delete();

        header('location:' . BASE . '/Profile/index');
    }

    function edit($picture_id) {
        $picture = new \App\models\Picture();
        $picture = $picture->find($picture_id);
        if (isset($_POST['action'])) {
            $picture->caption = $_POST['caption'];
            $picture->update();
            header('location:' . BASE . '/Profile/index');
        } else {
            $this->view('Picture/editPicture', $picture);
        }
    }
}

?> 