<?php

class BlogController extends Controller{

	public $postObject;
	public $commentObject;

   	public function post($pID){
				$_SESSION['$pID'] = $pID;
        $this->postObject = new Post();
				$this->commentObject = new Comment();
				$comments = $this->commentObject->getAllComments();
		$post = $this->postObject->getPost($pID);
			$this->set('comments',$comments);
	  	$this->set('post',$post);
   	}


	public function index(){
		unset($_SESSION['$pID']);
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);
	}

	public function comment() {
		$this->commentObject = new Comment();
		$data = array('uID'=>$_SESSION['uID'], 'commentText'=>$_POST['comment'], 'date'=>date("Y-m-d h:i:sa"), 'postID'=>$_SESSION['pID']);
		echo $data;
		$this->commentObject->addComment($data);
	}

}

?>
