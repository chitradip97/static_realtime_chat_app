<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div id='start-chat'>
        <form id="save-name">
            <input type="text" name="name" id="name" placeholder="Enter Name" required>
            <input type="submit" value="Let's chat">
        </form>
    </div>

    <div id='chat-part'>
        <form id="chat-form">
            @csrf
            <input type="hidden" name="username" id="username">
            <input type="text" name="message" id="message" placeholder="Enter Message" required>
            <input type="submit" value="Send">
        </form>
        <div id="chat-container">

        </div>
    </div>

    <script>
        $('#chat-part').hide();
        $('#start-chat').submit(function(event){
            event.preventDefault();
            $('#username').val($('#name').val());
            $('#start-chat').hide();
            $('#chat-part').show();

        });

        $('#chat-part').submit(function(event){
            event.preventDefault();
            var username=$('#username').val();
            var message=$('#message').val();
            var formData=$(this).serialize();
            $.ajax({
                url:"{{url('broadcast-message')}}",
                type:'POST',
                'headers': {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                data:{username:username,message:message}

            });
            //$('#message').val("");

        });

        // Window.Echo.channel('message')
        // .listen('MessageEvent',(e)=>{
        //     let html=`<br>
        //     <b>`+e.username+`</b>
        //     <span>`+e.message+`</span>`;
        //     $('#chat-container').append(html);
        // })
    </script>
</body>
</html>