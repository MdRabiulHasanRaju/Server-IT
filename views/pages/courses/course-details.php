<?php ob_start();
session_start();
if (isset($_GET['id'])) {
  $course_id = $_GET["id"];
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
$title_sql = "select title,sub_title from courses_table where id=$course_id";
$title_stmt = mysqli_prepare($connection, $title_sql);
mysqli_stmt_execute($title_stmt);
mysqli_stmt_store_result($title_stmt);
mysqli_stmt_bind_result($title_stmt, $course_title, $course_sub_title);
mysqli_stmt_fetch($title_stmt);
$meta_title = "$course_title Training Course in Chittagong - Server IT Studio";
$meta_description = "$course_sub_title - server it studio Call 880 1945 4668 21";
$meta_keywords = "$course_title,$course_sub_title, Server IT Studio, server it,server,server studio";
$header_active = "Courses";
include("../../partials/header.php");
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/views/pages/courses/admission-form.php";
?>
<style>
  .accordion {
    --bs-accordion-active-bg: #ededed;
  }

  .courseDetails {
    padding: 20px 0;
    ;
  }

  p,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    margin: 0;
    padding: 0;
  }

  h6 {
    font-weight: bold;
  }

  .courseInstructor {
    display: flex;
    align-items: center;
    padding: 15px 0;
    gap: 5px;
  }

  .courseInstructor>h6 {
    font-size: 18px;
    font-weight: bold;
  }

  .courseInstructor>p {
    font-size: 18px;
    font-weight: bold;
  }

  .courseDescription {
    padding-bottom: 20px;
    text-align: justify;
  }

  .courseDescription>h3 {
    padding-bottom: 15px;
    padding-top: 35px;
    font-size: 26px;
    font-weight: bold;
    text-align: left;
  }

  .courseDescription>p {
    font-size: 15px;
  }

  .courseContent>h4 {
    padding-bottom: 15px;
    padding-top: 10px;
    font-size: 25px;
    font-weight: bold;
  }

  .courseContent>h6 {
    padding-bottom: 12px;
    font-size: 18px;
    font-weight: 500;
  }

  .courseDetailsRow {
    justify-content: space-between;
  }


  @media screen and (max-width:768px) {
    .courseDetailsRow {
      flex-direction: column-reverse;
    }

    .col-md-4.courseDetailsSectionRight {
      display: grid;
      place-content: center;
    }

    ul.list-group.list-group-flush {
      width: 95%;
    }

    img.card-img-top {
      width: 95%;
    }
  }
</style>
<?php
$sql = "select id ,cat_id,image,title,sub_title,description,course_content,level,duration,numberOfClass,instructor_id,price,discount_price,tags,total_students from courses_table where id=?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $param_id);
$param_id = $course_id;
if (mysqli_stmt_execute($stmt)) {
  mysqli_stmt_store_result($stmt);
  if (mysqli_stmt_num_rows($stmt) == 0) {
    header("location: " . LINK . "error/404");
    die();
  } else {
    mysqli_stmt_bind_result(
      $stmt,
      $id,
      $cat_id,
      $image,
      $title,
      $sub_title,
      $description,
      $course_content,
      $level,
      $duration,
      $numberOfClass,
      $instructor_id,
      $price,
      $discount_price,
      $tags,
      $total_students
    );
    if (mysqli_stmt_fetch($stmt)) { ?>

      <section class="container courseDetails">
        <div class="col-md-12" style="padding-bottom:20px">
          <div class="row courseDetailsRow">
            <div class="col-md-8 courseDetailsSectionLeft">
              <div class="courseInstructor">
                <?php
                $ins_sql = "select * from instructors where id=$instructor_id";
                $ins_stmt = fetch_data($connection, $ins_sql);
                mysqli_stmt_bind_result($ins_stmt, $ins_id, $ins_name, $ins_expertise, $ins_about, $ins_image);
                mysqli_stmt_fetch($ins_stmt);
                ?>
                <img style="min-height:80px; width: 100px;border-radius:50%;border: 1px solid #ededed ;" src="<?= IMAGEPATH, $ins_image; ?>" alt="Instructor Image" />
                <h6>Instructor:</h6>
                <p><?= $ins_name; ?></p>
              </div>


              <div class="courseContent">
                <h4>Course Content</h4>
                <h6>Level <?=$level;?> - Classes <?=$numberOfClass;?></h6>
                <div class="accordion courseContentList" id="accordionExample">

                  <?php
                  if($course_content){
                  $course_content = explode('/', $course_content);
                  $i=0;
                  foreach ($course_content as $courseContentList) {
                    
                    $courseContentList = explode(':', $courseContentList);

                    //get Item Title
                    $courseItemTitle = $courseContentList[0];

                    //get Item Description
                    $courseItemDes = $courseContentList[1];

                    $courseItemDescriptions = explode(',', $courseItemDes);
                  ?>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button <?=$i==0?'':'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $i; ?>" aria-expanded="<?=$i==0?'true':'false'; ?>" aria-controls="<?= $i; ?>">
                          <h6 style="display: flex; align-items: center; gap: 15px">
                            <?= $courseItemTitle; ?>
                            (<?=count($courseItemDescriptions);?> Topics)
                          </h6>
                        </button>
                      </h2>
                      <div id="<?= $i; ?>" class="accordion-collapse collapse <?=$i==0?'show':''; ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <ul class="list-group">
                            <?php
                            foreach ($courseItemDescriptions as $courseItemDes) { ?>

                              <li class="list-group-item">
                                <img
                                  style="width: 20px; min-height: 15px"
                                  src="<?= IMAGEPATH; ?>course_details/list.png"
                                  alt="offline-class-icon" />
                                <b><?= $courseItemDes; ?></b>
                              </li>
                            <?php } ?>

                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php $i++; }} ?>

                </div>

              </div>


              <div class="courseDescription">
                <h3><?= $sub_title; ?></h3>
                <p>
                  <?= $description; ?>
                </p>
              </div>

            </div>
            <div class="col-md-4 courseDetailsSectionRight">
              <div style="border:1px solid #e8e8e8;position:sticky;top:0;" class="card" style="width: 100%">
                <img style="min-height: 190px;"
                  src="<?= IMAGEPATH, $image; ?>"
                  class="card-img-top"
                  alt="graphic-design" />
                <div style="display: grid;place-items: center;gap: 5px;" class="card-body">
                  <h5 class="card-title" style="font-size: 25px;">
                    ৳ <?= $discount_price; ?> <sub><del>৳ <?= $price; ?> </del></sub>
                  </h5>
                  <h6 style="font-size: 18px;" class="card-text">
                    <?= $title; ?>
                  </h6>
                  <a
                    href="#purchaseid"
                    type="button"
                    class="btn btn-danger"
                    style="
                --bs-btn-padding-y: 0.25rem;
                --bs-btn-padding-x: 0.5rem;
                --bs-btn-font-size: 1rem;
              ">
                    কোর্সটি কিনুন
                  </a>
                </div>
                <ul class="list-group list-group-flush">
                  <li style="display: flex; align-items: center;justify-content: space-between;gap:5px;" class="list-group-item">
                    <div style="display: flex; align-items: center;gap:5px;">
                      <img style="width: 20px; min-height: 15px" src="<?= IMAGEPATH; ?>course_details/instructor.png" alt="instructor">
                      <h6>Instructor</h6>
                    </div>
                    <h6><?= $ins_name; ?></h6>
                  </li>
                  <li style="display: flex; align-items: center;justify-content: space-between;" class="list-group-item">
                    <div style="display: flex; align-items: center;gap:5px;">
                      <img style="width: 20px; min-height: 15px" src="<?= IMAGEPATH; ?>course_details/level.png" alt="level">
                      <h6>Level</h6>
                    </div>
                    <h6><?=$level;?></h6>
                  </li>
                  <li style="display: flex; align-items: center;justify-content: space-between;" class="list-group-item">
                    <div style="display: flex; align-items: center;gap:5px;">
                      <img style="width: 20px; min-height: 15px" src="<?= IMAGEPATH; ?>course_details/clock.png" alt="clock">
                      <h6>Duration</h6>
                    </div>
                    <h6><?=$duration;?></h6>
                  </li>
                  <li style="display: flex; align-items: center;justify-content: space-between;" class="list-group-item">
                    <div style="display: flex; align-items: center;gap:5px;">
                      <img style="width: 20px; min-height: 15px" src="<?= IMAGEPATH; ?>course_details/training.png" alt="training">
                      <h6>Class</h6>
                    </div>
                    <h6><?=$numberOfClass;?></h6>
                  </li>
                  <li style="display: flex; align-items: center;justify-content: space-between;" class="list-group-item">
                    <div style="display: flex; align-items: center;gap:5px;">
                      <img style="width: 20px; min-height: 15px" src="<?= IMAGEPATH; ?>course_details/certificate.png" alt="certificate">
                      <h6>Certificate</h6>
                    </div>
                    <h6>Yes</h6>
                  </li>
                </ul>
                <div style="display: flex; align-items: center;justify-content: center;gap:10px;" class="card-body">
                  <h6 style="display: flex; align-items: center;justify-content: center;gap:10px;">
                    <img style="width: 25px; min-height: 20px" src="<?= IMAGEPATH; ?>course_details/share.png" alt="share">
                    Share With
                  </h6>

                  <a target="_blank" href="https://facebook.com/sharer/sharer.php?u=https://serveritstudio.com/course-details/<?= $id; ?>">
                      <img style="width: 30px; min-height: 25px" src="<?= IMAGEPATH; ?>course_details/facebook.png" alt="facebook">
                  </a>
                  
                  <a target="" href="https://api.whatsapp.com/send?text=<?= $title; ?>%0Ahttps://serveritstudio.com/course-details/<?= $id;?>">
                      
                      <img style="width: 30px; min-height: 25px" src="<?= IMAGEPATH; ?>course_details/whatsapp.png" alt="whatsapp">
                  </a>

                </div>
              </div>
            </div>
          </div>
        </div>

        <!--purchase part start-->
        <div class="bottom-details-2" id="purchaseid">
          <h1>
            Go from Beginner to Expert
          </h1>
          <div class="purchase">
            <h2>
              Enroll the Complete Bundle
            </h2>
            Own it forever!
            Limited Time!
            <p class="price1">৳
              <?= $discount_price; ?> <del>৳
                <?= $price; ?>
              </del>
            </p>

            <?php
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                  <button id="admission" class="btn btn-primary slide-btn">Admission</button>
              <?php } else { ?>
                  <a href="<?= LINK; ?>auth">
                      <button style="padding: 14px 10px;" class="btn btn-primary slide-btn">কোর্সটি কিনতে লগিন করো</button>
                  </a>
              <?php } ?>


          </div>
        </div>
        <!--purchase part start-->
      </section>

<?php
    }
  }
}
?>
<?php include("../../partials/footer.php");
ob_end_flush(); ?>
<script src="<?= LINK; ?>public/jquery/jquery.js"></script>
<script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
<!-- <script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script> -->
<script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>
<script>
  new WOW().init();
</script>
<script src="<?= LINK; ?>views/pages/courses/admissionForm.js"></script>
<script src="<?= LINK; ?>main.js"></script>
</body>

</html>