<section class="category-section wow fadeIn">
  <style>
    img.category-image {
    position: absolute;
    width: 100%;
    min-height: 100px;
    left: 0;
    top: 0;
    object-fit: cover;
}
.category-link:hover .category-image{
  transform:scale(1.2)!important;
  transition: all .5s;
}
.category-card {
    position: relative;
    text-align: center;
    width: 100%;
    height: 100%;
    padding: 0;
    overflow: hidden;
}
.category-card>i {
    font-size: 30px;
    color: #FF0000;
    position: relative;
}
.category-card-title {
    font-size: 24px;
    z-index: 3;
    position: relative;
    background: rgb(0,0,0,0.5);
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    color: white;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
  </style>
  <div class="container">
    <div class="row">
      <?php
      $catSql = "SELECT * FROM `category`";
      $catStmt = fetch_data($connection, $catSql);
      if ($catStmt) {
        mysqli_stmt_bind_result($catStmt, $cat_id, $cat_name, $icon);
        while (mysqli_stmt_fetch($catStmt)) { ?>
          <div class="col-md-3">
            <a class="category-link" href="<?=LINK;?>courses/category/<?= $cat_id; ?>">
              <div class="card category-class">
                <div class="card-body category-card">
                  <img class="category-image" src="<?=IMAGEPATH,$icon;?>" alt="category image">
                  <h5 class="card-title category-card-title"><?= $cat_name; ?></h5>
                </div>
              </div>
            </a>
          </div>
      <?php }
      } ?>
    </div>
  </div>
</section>