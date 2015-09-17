<?php
  if(isset($_SESSION['member'])){
    if($_SESSION['member']['login'] == 'true'){
      ?>
      <p class="text-center">Du är inloggad som medlem, <?php echo $_SESSION['member']['alias'] ?>.</p>
      <p class="text-center">[Inställningar]->(Ändra lösenord)</p>
      <?php
      echo exec('su - daniel');
      echo exec('whoami');
    }
  }
  else{
    ?>
      <div class="panel panel-default memberLogin_max_width col-centered" style="text-align:center;">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3>Inloggning</h3></div>

        <span id="login_fail">
        </span>
        <!-- Table -->
        <table class="table">
          <tr>
            <td><input id="member_username" class="form-control text-center" type="text" name="member_username" value="" placeholder="Medlemsnamn"></td>
          </tr>
          <tr>
            <td><input id="member_password" class="form-control text-center" type="password" name="member_password" value="" placeholder="Medlemslösenord"></td>
          </tr>
          <tr>
            <td class="col-centered"><button id="member_login_btn" class="btn btn-default">Logga in</button></td>
          </tr>
        </table>
        <h6 style="text-align: left; float: left"><a href="./bli_medlem">Bli medlem?</a></h6><h6 style="text-align: right">Glömt lösenord?</h6>
      </div>
    <?php
  } 
?>
