window.onload = () => {
    $(document).ready(function() {
        var uploadCrop, tempFilename, rawImg, imageId;
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".upload-demo").addClass("ready");
                    $("#cropImagePop").modal("show");
                    rawImg = e.target.result;
                    const type = rawImg.split(';')[0].split('/')[1];
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        uploadCrop = $("#upload-demo").croppie({
            viewport: {
                width: 200,
                height: 200,
            },
            boundary: {
                width: 300,
                height: 300,
            },
            enforceBoundary: false,
            enableExif: true,
            showZoomer: true,
        });

        $("#cropImagePop").on("shown.bs.modal", function() {
            uploadCrop
                .croppie("bind", {
                    url: rawImg,
                })
                .then(function() {
                    $(".cr-slider").attr({
                        min: 0.2,
                        max: 1.5,
                    });
                });
        });

        $(".item-img").on("change", function() {
            imageId = $(this).data("id");
            tempFilename = $(this).val();
            $("#cancelCropBtn").data("id", imageId);
            try {
                readFile(this);
            } catch (e) {
                console.log(e)
            }

        });

        $("#cancel-cropping").on("click", function() {
            document.getElementById("profilePicsFile").value="";
            $("#cropImagePop").modal("hide");
        });

        $("#topclose").on("click", function() {
            document.getElementById("profilePicsFile").value="";
            $("#cropImagePop").modal("hide");
        });

        $('#cropImageBtn').click(function(event) {
            uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $.ajax({
                    url: "/serverit/controllers/uploadController.php",
                    type: "POST",
                    data: {
                        "image": response
                    },
                    success: function(data) {
                        document.getElementById("image-output").src = data;
                        document.getElementById("image-form").remove();
                        $("#cropImagePop").modal("hide");
                    }
                });
            })
        });
    });
};