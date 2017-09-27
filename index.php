
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="POST" id="myform">
    <input type="file" name="artwork" id="artwork">
    <button class="button btn-primary" id="submit">SUBMIT</button>
</form>

<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>


<script>

    $('#submit').click(function(e){
        e.preventDefault();

        var file = $('#artwork')[0].files[0];

        var formData = new FormData(this);

        formData.append('artwork', file);

        $.ajax({
            type : 'post',
            url : './uploadFile.php',
            data : formData,
            contentType: false,
            processData: false,
            cache: false,
            success : function(results){
                console.log(results)

            },
            complete : function(){

            }
        })






    })
</script>

</body>
</html>