$().ready(function () {
    $("#cancel-form").validate({
        rules: {
            reason: {
                required: true,
                minlength: 10,
            }
        },
        messages: {
            reason: {
                required: "Reason field is required",
                minlength: "Reason field must be at least 10 characters long"
            },
        }

    })
});