$().ready(function () {
    $("#profile-form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            address: {
                required: true
            },
            personal_number: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true
            }
        },
        messages: {
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",
            address: "Please enter your address",
            personal_number: {
                required: "Please enter your UCRN",
                number: "This field must contains only numbers"
            },
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please enter your phone",
                number: "This field must contains only numbers"
            }

        }

    })
});