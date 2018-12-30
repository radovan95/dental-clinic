$().ready(function () {
    $("#comment-form").validate({
        rules: {
            comment: {
                required: true,
                minlength: 30,
            }
        },
        messages: {
            comment: {
                required: "Comment field is required",
                minlength: "Comment field must be at least 30 characters long"
            },
        }

    })
});
