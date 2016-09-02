<?php
####################################################################
#	File Name	:	admin_index.php
#	Location	:	/WEBROOT/admin/
####################################################################

require "templates/admin_header.php";

?>
<div class="container">
  <div class="profile">
    <button class="profile__avatar" id="toggleProfile">
      <!-- https://www.abeautifulsite.net/how-to-make-rounded-images-with-css -->
      <img src="assets/img/ke.jpg" alt="Avatar" /> 
    </button>
    <div class="profile__form">
      <div class="profile__fields">
        <div class="field">
          <input type="text" id="fieldUser" class="input" required pattern=.*\S.* />
          <label for="fieldUser" class="label">Username</label>
        </div>
        <div class="field">
          <input type="password" id="fieldPassword" class="input" required pattern=.*\S.* />
          <label for="fieldPassword" class="label">Password</label>
        </div>
        <div class="profile__footer">
          <button class="btn">Login</button>
        </div>
      </div>
     </div>
  </div>
</div>

<!-- CONTENT-WRAPPER SECTION END-->
<?php require "templates/admin_footer.php"; ?>