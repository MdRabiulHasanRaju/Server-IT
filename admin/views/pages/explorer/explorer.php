<style>
    section.explorer {
        min-height: 450px;
        padding: 40px 0;
        text-align: center;
    }

    table.table {
        border: 1px solid #ebebeb;
        font-size: 12px;
    }

    .sidebar-option {
        border: 1px solid #aba9a9;
        background: #ebebeb;
        border-radius: 7px;
    }

    button {
        color: black !important;
    }

    button.active {
        color: white !important;
        background: red !important;
    }

    button.accordion-button {
        background: #ebebeb;
    }

    .insert-student {
        width: 800px;
        text-align: left;
    }

    .form-group {
        padding: 10px 0;
    }

    label {
        font-weight: 700;
        font-size: 12px ;
    }

    input {
        padding: 10px !important;
        font-size: 12px !important;
    }

    .title {
        text-align: left;
    }
    .title>h3 {
    font-size: 22px;
}

    .title:after {
        content: "";
        width: 70px;
        border: 2px solid red;
        display: block;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .double-item-form {
    display: flex;
    column-gap: 10px;
}
</style>
<section class="explorer">
    <div class="row">
        <div class="col">
            <div class="explorer-data">
                <div class="d-flex align-items-start">
                    <!-- sidebar-option-start -->
                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/serverit/admin/views/pages/explorer/side-bar.php"; ?>
                    <!-- side-option-end -->

                    <!-- main content start-->
                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/serverit/admin/views/pages/explorer/content-box.php"; ?>
                    <!-- main content end-->
                </div>

            </div>
        </div>
    </div>
</section>