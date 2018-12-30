$().ready(function () {
    $("#update-profile-form").validate({
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
});/**
 * Created by STEVANRADOVAN on 10/12/2018.
 */
