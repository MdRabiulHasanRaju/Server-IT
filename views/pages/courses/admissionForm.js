$(document).ready(function() {
    $("#admission").on("click", function() {
        $("#admissionForm").modal("show");
    });
    let formId = document.getElementById("formID");
    formId.addEventListener("submit", (e) => {
        e.preventDefault();
        let user_name = document.getElementById("name").value;
        let mobile = document.getElementById("mobile").value;
        let course_id = document.getElementById("course_id").value;
        let courseName = document.getElementById("courseName").value;
        $.ajax({
            url: "/serverit/controllers/admissionController.php",
            type: "POST",
            data: {
                "name": user_name,
                "mobile": mobile,
                "course_id": course_id,
                "courseName": courseName,
            },
            success: function(data) {
                var jsonData = JSON.parse(data);
                if (jsonData.success == 1) {
                    window.location = jsonData.success_msg;
                } else if (jsonData.name == 0) {
                    document.getElementById("admission_name").innerHTML = "";
                    document.getElementById("admission_mobile").innerHTML = "";
                    let error = jsonData.error_msg;
                    document.getElementById("admission_name").innerHTML = error;
                    
                }
                else if (jsonData.mobile == 0) {
                    document.getElementById("admission_name").innerHTML = "";
                    document.getElementById("admission_mobile").innerHTML = "";
                    let error = jsonData.error_msg;
                    document.getElementById("admission_mobile").innerHTML = error;

                }
            },

        });


    })

});