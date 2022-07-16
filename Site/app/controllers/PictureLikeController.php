<?php

namespace App\controllers;

class PictureLikeController extends \App\core\Controller {

    function add($picture_id, $otherProfile_id) {
        $allPictureLikes = new \App\models\PictureLike();
        $allPictureLikes = $allPictureLikes->findAllLikes();

        $profile = new \App\models\Profile();
        $profile = $profile->findUserId($_SESSION['user_id']);

        $duplicate = false;
        foreach ($allPictureLikes as $likes) {
            if ($likes->picture_id == $picture_id && $profile->profile_id == $likes->profile_id) {
                $duplicate = true;
            }
        }

        if ($duplicate != true) {
            $picture_like = new \App\models\PictureLike();
            $picture_like->profile_id = $profile->profile_id;
            $picture_like->picture_id = $picture_id;
            $picture_like->read_status = "unseen";

            $picture_like->insert();

            header("location:" . BASE . "/Profile/otherProfile/$otherProfile_id");
        } else {
            header("location:" . BASE . "/Profile/otherProfile/$otherProfile_id");
        }
    }

    function delete($picture_id, $otherProfile_id) {
        $profile = new \App\models\Profile();
        $profile = $profile->findUserId($_SESSION['user_id']);

        $allPictureLikes = new \App\models\PictureLike();
        $allPictureLikes = $allPictureLikes->findAllLikes();

        $ifExists = false;
        foreach ($allPictureLikes as $likes) {
            if ($likes->picture_id == $picture_id && $profile->profile_id == $likes->profile_id) {
                $ifExists = true;
            }
        }

        if ($ifExists == true) {
            $picture_like = new \App\models\PictureLike();
            $picture_like = $picture_like->find($picture_id, $profile->profile_id);
            $picture_like->delete();
            header("location:" . BASE . "/Profile/otherProfile/$otherProfile_id");
        } else {
            header("location:" . BASE . "/Profile/otherProfile/$otherProfile_id");
        }
    }

}

?>