<style>
    .admission-page-logo {
        width: 200px;
    }

    .admission-page-title {
        text-align: center;
        margin: auto;
    }

    .admission-page-title>h3 {
        padding: 10px 0;
        font-weight: 700;
    }

    .admission-page-title>p {
        font-weight: 700;
        font-size: 12px;
    }

    .admission-input>label {
        font-size: 14px;
    }

    .admission-input>input {
        font-size: 13px;
    }

    #adclose {
        position: relative;
        bottom: 57px;
    }
</style>
<section class="admission-form">
    <div class="container">
        <div class="row">
            <div class="modal" id="admissionForm" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title admission-page-title">
                                <img class="admission-page-logo" src="<?= LINK; ?>/public/images/header-logo.png" alt="Server IT Studio - Logo">
                                <h3>Fill out the form below with accurate information.</h3>
                                <p>Our representative will contact you shortly after you complete the form.</p>
                            </div>
                            <button id="adclose" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formID" action="" method="post">
                                <div class="form-group admission-input">
                                    <label for="name">Your Full Name <span style="color:red;">*</span></label>
                                    <input name="name" value="<?= $_SESSION['name']; ?>" type="text" id="name" class="form-control" required>
                                    <span style="color:red;" id="admission_name"></span>
                                </div>
                                <div class="form-group admission-input" >
                                    <label for="mobile">Phone Number <span style="color:red;">*</span></label>
                                    <input name="mobile" value="<?= $_SESSION['mobile']; ?>" type="text" id="mobile" class="form-control" required>
                                    <span style="color:red;" id="admission_mobile"></span>
                                </div>
                                <div class="form-group admission-input">
                                    <label for="email">Email</label>
                                    <input name="email" value="<?= $_SESSION['username']; ?>" type="text" id="email" class="form-control" disabled>
                                </div>
                                <input type="hidden" id="course_id" name="course_id" value="<?=$course_id;?>">
                                <input type="hidden" id="courseName" name="courseName" value="<?=$course_title;?>">
                                <div class="form-group admission-input">
                                    <label for="courseName">The Course You Wish to Take</label>
                                    <input name="courseName" value="<?= $course_title; ?>" type="text" id="courseName" class="form-control" disabled>
                                </div>
                                <input id="admissionSubmit" name="submit" type="submit" value="Submit" class="btn btn-primary slide-btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>