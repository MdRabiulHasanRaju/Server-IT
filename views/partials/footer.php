<div class="footer" id="footer">
  <footer id="footer-part">
    <div class="footer-top pt-40 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="footer-about mt-40">
              <div class="logo">
                <a href="<?=LINK;?>"><img class="logoImg" src="<?= LINK; ?>public/images/header-logo.png" alt="server it studio Logo" /></a>
              </div>
              <p>
                ServerITStudio.com is a dedicated website to provide quality
                education in the domains of Computer Science, Information
                Technology, Programming Languages.
              </p>

              <ul class="mt-20">
                <?php
                $link_sql = "SELECT * FROM `social_links`";
                $link_stmt = fetch_data($connection, $link_sql);
                if ($link_stmt) {
                  mysqli_stmt_bind_result($link_stmt, $id, $name, $links, $icon);
                  while (mysqli_stmt_fetch($link_stmt)) {
                ?>
                    <li>
                      <a target="_blank" href="<?= $links; ?>" name="<?=$name;?>">
                        <?= $icon; ?>
                      </a>
                    </li>
                <?php }
                } ?>
              </ul>
            </div>
            <!-- footer about -->
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer-link mt-40">
              <div class="footer-title pb-25">
                <h6>Pages</h6>
              </div>
              <ul>
                <?php
                $menu_sql = "SELECT * FROM `menu`";
                $menu_stmt = fetch_data($connection, $menu_sql);
                if ($menu_stmt) {
                  mysqli_stmt_bind_result($menu_stmt, $id, $menu_name, $link);
                  while (mysqli_stmt_fetch($menu_stmt)) { ?>
                    <li>
                      <a href="<?= LINK, $link; ?>" name="<?=$menu_name;?>" ><i class="fa fa-angle-right"></i><?= $menu_name; ?></a>
                    </li>
                <?php }
                } ?>
              </ul>
            </div>
            <!-- footer link -->
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-link support mt-40">
              <div class="footer-title pb-25">
                <!-- <h6>Support</h6> -->
                <h6>Find Us on Map</h6>
              </div>
              <iframe name="google-map-server-it-studio" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.8656585501585!2d91.78024547483585!3d22.358700879644655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd94b007e74f5%3A0x37902ac49758f433!2sServer%20IT%20Studio!5e0!3m2!1sen!2sbd!4v1681164990494!5m2!1sen!2sbd" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- support -->
            <div class="footer-link support mt-3">
              <div class="footer-title pb-25 mb-3">
                <h6>Download Server IT Studio for Android</h6>
              </div>
              <a href="<?= LINK; ?>public/app/serverITStudio.apk" class="btn btn-success slide-btn" Download>Download</a>
            </div>

          </div>

          <?php
          $topbar_sql = "SELECT * FROM `top_bar`";
          $topbar_stmt = fetch_data($connection, $topbar_sql);
          mysqli_stmt_bind_result($topbar_stmt, $id, $address, $email, $number);
          if (mysqli_stmt_fetch($topbar_stmt)) { ?>

            <div class="col-lg-3 col-md-6">
              <div class="footer-address mt-40">
                <div class="footer-title pb-25">
                  <h6>Contact Us</h6>
                </div>
                <ul>
                  <li>
                    <div class="icon">
                      <i class="fa fa-home"></i>
                    </div>
                    <div class="cont">
                      <p><?= $address; ?></p>
                    </div>
                  </li>
                  <li>
                    <div class="icon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <div class="cont">
                      <p><?= $number; ?></p>
                    </div>
                  </li>
                  <li>
                    <div class="icon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <div class="cont">
                      <a href="mailto:<?= $email; ?>">
                        <p><?= $email; ?></p>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- footer address -->
            </div>
          <?php } ?>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- footer top -->
  </footer>
</div>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>