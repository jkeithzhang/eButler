<?php
####################################################################
#	File Name	:	admin_login.php
#	Location	:	/WEBROOT/admin/
####################################################################

require "templates/admin_header.php";

?>
<div class="container">
  <div class="profile">
    <button class="profile__avatar" id="toggleProfile">
      <!-- https://www.abeautifulsite.net/how-to-make-rounded-images-with-css -->
      <img src="assets/img/ke.png" alt="Avatar"/> 
    </button>

    <form method="post" class="profile__form" name="secureLoginForm" id="secureLoginForm">
      <div class="profile__fields">
        <div class="field">
          <input type="text" name="loginName" id="loginName" class="input" required pattern=.*\S.* />
          <label for="loginName" class="label">Username</label>
        </div>
        <div class="field">
          <input type="password" name="loginPwd" id="loginPwd" class="input" required pattern=.*\S.* />
          <label for="loginPwd" class="label">Password</label>
        </div>
        <div class="profile__footer">
          <button type="button" class="btn btn-info" id="loginLink">Log In</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- CONTENT-WRAPPER SECTION END-->
<?php require "templates/admin_login_footer.php"; ?>