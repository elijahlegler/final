<?php
class Comment extends Model{

    public function getAllComments(){

		    $sql = 'SELECT c.commentText, c.date, u.first_name as fname, u.last_name as lname FROM comments c
		    INNER JOIN users u on u.uid = c.uid';//WHERE c.postID = ?
		    $results = $this->db->execute($sql);

        while ($row=$results->fetchrow()) {
          $comments[] = $row;
        }
        echo $sql;
		    return $comments;
  }

    public function getAllPosts($limit = 0){

        if($limit > 0){

            $numposts = ' LIMIT '.$limit;
        }

        $sql =  'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name FROM posts p
		INNER JOIN categories c on c.categoryid = p.categoryid
		INNER JOIN users u on u.uid = p.uid'.$numposts;

        // perform query
        $results = $this->db->execute($sql);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;

    }

    public function addComment($data) {

      $sql = 'INSERT INTO comments (uID,commentText,date,postID) VALUES (?,?,?,?)';
      $this->db->execute($sql,$data);
      $message = 'Comment added.';
      return $message;
    }

  /*  public function updatePost($data) {

        $sql = 'UPDATE posts SET title = ?, content = ?, categoryID = ?, date = ? where pID = ?';
        $this->db->execute($sql, $data);
        $message = "Post updated.";
        return $message;
    }*/

    public function deleteComment($data) {

    }
}
