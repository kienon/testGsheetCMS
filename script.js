$(document).ready(function () {
    $('#form').submit(function (event) {
        event.preventDefault();
        
        var formData = {
            'name': $('#name').val(),
            'email': $('#email').val()
        };

        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
                console.log('Success!', response);
                alert('Form submitted successfully!');
                $('#form')[0].reset();
            },
            error: function (error) {
                console.error('Error!', error);
                alert('Error occurred while submitting the form. Please try again later.');
            }
        });
    });
});
