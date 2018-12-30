$().ready(function () {
    $("#forgot-form").validate({
        rules: {
            register_email: {
                required: true,
                email: true
            }
        },
        messages: {
            register_email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
        }

    })
});