
<?php include('views/elements/header.php');?>
<?php
if( is_array($post) ) {
    extract($post);

}?>

    <div class="container">
        <div class="page-header">

            <h1><?php echo $title;?></h1>
        </div>
        <p><?php echo $content;?></p>
        <sub><?php echo 'Posted on ' . $date . ' by <a href="'.BASE_URL.'members/view/'. $uid.'">'. $first_name . ' ' . $last_name . '</a> in <a href="'.BASE_URL.'category/view/'. $categoryid.'">' . $name .'</a>'; ?>
        </sub>

        <?php if (isset($_SESSION['uID'])) {?>
          <br>
          <br>
          <?php foreach($comments as $c){?>
              <h4><?php echo $c['fname'] . ' ' . $c['lname'] . ' ';?><sub><?php echo 'Posted on ' . $c['date'];?></sub></h4>
              <h5><?php echo $c['commentText'];?>
              <br>
              <br>
        <?php  }?>
          <form id="comment_form" action="<?php echo BASE_URL;?>blog/post/addComment" method="post">
            <fieldset>
            <textarea name = 'comment' id = 'comment' rows = '3' cols = '8'>Type your comment here</textarea>
            <br>
            <input type = 'submit'>
          </fieldset>
          </form>
          <?php
           }
        else {?>
          <br>
          <br>
          <button><a href = '../../login/'>Log in to comment</a><button>
      <?php } ?>


    </div>


<?php include('views/elements/footer.php');?>
