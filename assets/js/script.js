$(document).ready(function () {
    tinymce.init({
        selector: '#mytextarea'
    });

    var userId; var imageName; var photoId;

    $(".modal_thumbnails").click(function () {
        $("#set_user_image").prop("disabled", false);
        userId = $("#user-id").prop("href").split("=")[1];

        let imageArr = $(this).prop("src").split("/");
        imageName = imageArr[imageArr.length - 1];

        photoId = $(this).attr("data-photoid");

        $.ajax({
            url: "models/userImage.php",
            data: { photoId },
            type: "POST",
            success: function (data) {
                if (!data.error) {
                    $("#modal_sidebar").html(data);
                }
            }
        });

    });

    $("#set_user_image").click(function () {
        $.ajax({
            url: "models/userImage.php",
            data: { userId, imageName },
            type: "POST",
            success: function (data) {
                if (!data.error) {
                    $(".userImageBox a img").prop("src", data);
                }
            }
        });
    })


    // edit photo sidebar 
    $(".info-box-header").click(function () {
        $(".inside").slideToggle("fast");

        $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon");
    })

    // DELETE confirmation event 

    $(".deleteLink").click(function () {
        return confirm("Are you sure you want to delete this item?");
    })


})



