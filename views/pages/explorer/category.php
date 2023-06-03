<section class="category-section wow fadeIn">
  <div class="container">
    <div class="row">
      <?php
      $catSql = "SELECT * FROM `category`";
      $catStmt = fetch_data($connection, $catSql);
      if ($catStmt) {
        mysqli_stmt_bind_result($catStmt, $cat_id, $cat_name, $icon);
        while (mysqli_stmt_fetch($catStmt)) { ?>
          <div class="col-md-3">
            <a href="<?=LINK;?>courses/category/<?= $cat_id; ?>">
              <div class="card category-class">
                <div class="card-body">
                  <?= $icon; ?>
                  <h5 class="card-title"><?= $cat_name; ?></h5>
                </div>
              </div>
            </a>
          </div>
      <?php }
      } ?>
    </div>
  </div>
</section>