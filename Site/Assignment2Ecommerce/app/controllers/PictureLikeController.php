<?php
namespace App\controllers;

class PictureLikeController extends \App\core\Controller{

	//function to add a record... for a parent record
	function add($picture_id, $profile_id){
            
            /// Not sure where the destination is
			///$this->view('Note/newNoteForm',$person);
	}

	function delete($picture_id, $profile_id){
		$picture_like = new \App\models\PictureLike();
		$picture_like = $picture_like->find($picture_id, $profile_id);
		$picture_like->delete();
        /// Not sure where the destination is
		///header("location:".BASE."/Picture/index/$note->person_id");
	}
}
?>