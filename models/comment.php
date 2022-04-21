<?php 

class comment {



    static public function getAllByPostId($id){
        $stmt = DB::connect()->prepare("select * from comment where postId = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll();
    }

		// static public function getAllByPostIds($ids){
		//     $stmt = DB::connect()->prepare("select * from comment where postId in :ids");
		//     $stmt->execute(["ids" => $ids]);
		//     return $stmt->fetchAll();
		// }


	// static public function getcomment($data){
	// 	$id = $data['id'];
	// 	try{
	// 		$query = 'SELECT * FROM comment WHERE id=:id';
	// 		$stmt = DB::connect()->prepare($query);
	// 		$stmt->execute(array(":id" => $id));
	// 		$comment = $stmt->fetch(PDO::FETCH_OBJ);
	// 		return $comment;
	// 	}catch(PDOException $ex){
	// 		echo 'erreur' . $ex->getMessage();
	// 	}
	// }

	static public function add($data){
		$query = 'INSERT INTO comment (text,userId,postId)
		VALUES (:text,:userId,:postId)';
		$stmt = DB::connect()->prepare($query);
		$stmt->bindParam(':text',$data['content']);
		$stmt->bindParam(':userId',$_SESSION['user-id']);
		$stmt->bindParam(':postId',$data['id']);
       
        
		

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		
	}





}
