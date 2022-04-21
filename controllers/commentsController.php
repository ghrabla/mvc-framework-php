<?php 

class commentsController{
    public function getAllByPostId($id){
        return comment::getAllByPostId($id);
    }

	public function addcomment(){
		// if(isset($_POST['submit'])){
            // var_dump($_POST);
			$data = array(
				'content' => $_POST['content'],
                'id' => $_POST['id']
			);
			
			$result = comment::add($data);
			if($result === 'ok'){
				Session::set('success','comment added');
				Redirect::to('post');
			}else{
				echo $result;
			}
		// }
	}


}



?>