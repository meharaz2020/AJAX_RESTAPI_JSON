<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="load-data">

    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "https://jsonplaceholder.typicode.com/posts",
                type: "GET",
                success: function(data) {

                    $.each(data, function(key, value) {
                        $("#load-data").append(value.id + " " + value.title + "<br>");

                    });
                    // console.log(data);
                }
            });
        });
    </script>
</body>

</html>