<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Sheets Form</title>
</head>
<body>
    <h1>Submit Form</h1>
    <form id="form">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit">Submit</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#form').submit(function (event) {
                event.preventDefault();
                
                var formData = {
                    'name': $('#name').val(),
                    'email': $('#email').val()
                };

                $.ajax({
                    type: 'POST',
                    url: 'https://script.google.com/macros/s/AKfycbxM_IcTGvsJ9d363tTiypVpK0ihbjkoN4LRU91lEEf0jgzkA_10dTNNeGaRgi4C5BsAXw/exec',
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
    </script>
</body>
</html>
