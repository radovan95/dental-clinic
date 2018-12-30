$().ready(function () {
    $("#register-form").validate({
        rules: {
            register_first_name: {
                required: true
            },
            register_last_name: {
                required: true
            },
            register_email: {
                required: true,
                email: true
            },
            register_password: {
                required: true,
                minlength: 8
            },
            register_address: {
                required: true
            },
            register_phone: {
                required: true,
                number: true
            }
        },
        messages: {
            register_first_name: "Please enter your firstname",
            register_last_name: "Please enter your lastname",
            register_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            register_email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            register_address: "Please enter your address",
            register_phone: {
                required: "Please enter your phone",
                number: "Phone field must contains only numbers"
            }

        }

    })
});