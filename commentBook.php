<!DOCTYPE html>

<?php
include_once('./functions/apigateway.php');
session_start();
$info = getComments();

// print_r($info);

?>
<div class="continer" >
  <div class="head" style="background-color:rgb(217,237,247);height:50px;vertical-align:middle"><h2 style="color: rgb(81,117,114)">PHP留言本</h2></div>
  <div class="body">

  <?php 
  $xxx=123123;
  for($i=count($info)-1; $i>=0; $i--){
    // echo $info[$i]['name'];
    // echo $info[$i]['comment'];

    echo '
      <div class="panel">
        <div class="panel-head" style="background-color: rgb(223,240,216)">
          <span class="name" style="color: rgb(104,148,99)">name: '; 
         echo $info[$i]['name'];

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
              <input id="name" type="text" class="input" name="name" placeholder="游客姓名"/>
            </div>
          </div>
          <div class="form-group">
            <div class="field field-icon-right">
              <input type="text" id="content" class="input" name="content" placeholder="留言内容"/>
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