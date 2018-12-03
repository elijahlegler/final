<?php

class BlogController extends Controller{

	public $postObject;

   	public function post($pID){
        $this->postObject = new Post();
		$post = $this->postObject->getPost($pID);
	  	$this->set('post',$post);
   	}

	public function index(){
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);

	}

	/*public function comments($pID){
		$sql = 'SELECT c.commentText, c.date, u.first_name as First Name, u.last_name as Last Name FROM comments c
		INNER JOIN users.u on u.uID = c.uID
		INNER JOIN posts.p on p.pID = c.postID
		WHERE c.postID = ?
';
		$results = $this->db->getrow($sql, array($pID));

		$comments = $results;

		return $comments;
	}*/

}

?>
