<div class="tab-pane fade" id="v-pills-allstudent" role="tabpanel" aria-labelledby="v-pills-allstudent-tab" tabindex="0">
    <div class="title">
        <h3>All Student List</h3>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Admission Date</th>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Student's Phone</th>
                <th scope="col">Gaurdian's Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Duration</th>
                <th scope="col">Course Fee</th>
                <th scope="col">Paid</th>
                <th scope="col">Due</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from students";
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name,$student_id,$image, $student_phone, $gaurdian_phone, $address, $course_name, $course_duration, $fee, $paid, $due, $date_of_birth, $admission_date);
            while (mysqli_stmt_fetch($stmt)) { ?>

                <tr>
                    <th scope="row"><?= $id; ?></th>
                    <td><?= $admission_date; ?></td>
                    <td><?= $student_id; ?></td>
                    <td><?= $name; ?></td>
                    <td><?= $student_phone; ?></td>
                    <td><?= $gaurdian_phone; ?></td>
                    <td><?= $address; ?></td>
                    <td><?= $date_of_birth; ?></td>
                    <td><?= $course_name; ?></td>
                    <td><?= $course_duration; ?></td>
                    <td><?= $fee; ?></td>
                    <td><?= $paid; ?></td>
                    <td><?= $due; ?></td>
                    <td>
                        <a class="action" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="action" href=""><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

</div>