
$(document).ready(function() {
    $("#formval").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please provide your phone number",
                digits: "Please enter a valid phone number",
                minlength: "Your phone number must be at least 10 digits long",
                maxlength: "Your phone number cannot be more than 10 digits long"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
