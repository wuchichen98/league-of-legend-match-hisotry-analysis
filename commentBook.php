<!DOCTYPE html>

<?php
require './vendor/autoload.php';
include_once('functions/dynamodb.php');
include_once('./functions/apigateway.php');
include_once('./tool.php');
index_top_module('Comment Book');
session_start();
$info = getComments();


if (array_key_exists('content', $_POST) && $_SESSION['fname']!=null) {
  $comment = $_POST['content'];
  $fname = $_SESSION['fname'];
  $time = date('Y-m-d H:i:s',time());
  getCommenttb(count($info)+1,$comment,$_SESSION['fname'],$time);
  //refresh
  echo "<meta http-equiv='refresh' content='0'>";
}



?>
<div class="continer" >
  <div class="head" style="background-color:rgb(217,237,247);height:50px;vertical-align:middle"><h2 style="color: rgb(81,117,114)">Welcome <?php echo $_SESSION['fname'];?>
  To Comment Book</h2></div>
  <div class="body">

  <?php 
 
  for($i=count($info)-1; $i>=0; $i--){
    echo '
      <div class="panel">
        <div class="panel-head" style="background-color: rgb(223,240,216)">
          <span class="name" style="color: rgb(104,148,99)">Name: '; 
         echo $info[$i]['name'];
         echo ' Time Commented: ';
         echo $info[$i]['time'];
          echo'</span>
          <span style="color: rgb(104,148,99)">|</span>
        </div>
        <div class="panel-body">
          <span class="content">comment: ';
         echo $info[$i]['comment']; 
          echo'</span>
          <span class="time" style="float: right"> your are number '; 
         echo $info[$i]['id'];
          echo' to comment</span>
        </div>
      </div>
  </div>';
  }
?>


  <div class="foot">
    <form method="post">
      <div class="panel" style="background-color: rgb(245,245,245)">
        <div class="panel-body" style="padding:30px; width: 20%">
          <div class="form-group">
            <div class="field field-icon-right">
              <input type="text" id="content" class="input" name="content" placeholder="please enter content"/>
            </div>
          </div>
          <div class="form-group">
            <span><button name="liuyan">post</button></span>
            <span><button name="restart" onclick="clearDefaultText(this)">clear</button></span>
          </div>
        </div>
 
      </div>
    </form>
  </div>
</div>
<script>
function clearDefaultText(){
  var nickname = document.getElementById('name');
  var content = document.getElementById('content');
  nickname.value="";
  content.value="";
}
</script>