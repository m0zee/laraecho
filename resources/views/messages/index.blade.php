<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <div class="container">

        <form id="message-form">
            <div class="mb-3 mt-3">
                <textarea name="message" placeholder="Message here" id="message" class="form-control"></textarea>
            </div>  
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>

    <script>

        let channel = Echo.channel('notify-message');
        let sessionID = channel.pusher.sessionID;
        channel.listen('MessageProcessed', (e, f) => {
            data = e.message;
            if(data.sessionID != sessionID) {
                alert(data.message);
            }
            
        });
        
         $('#message-form').on('submit', function(e) {
            e.preventDefault();
            let message = $('#message').val();
            $.ajax({
                url: "{{route('messages.store')}}",
                type: 'POST',
                data: {
                    message: message,
                    sessionID: sessionID
                },
                success: function(data) {
                    $('#message').val('');
                }
            });
        });
        
    </script>


</body>

</html>