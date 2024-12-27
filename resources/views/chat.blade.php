<!DOCTYPE html>

<head>
    <title>Chat Application</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> --}}
    {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <style>
        .chat {
            list-style: none;
            margin: 10px;
            padding: 0;
            font-size: 18px;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li.left .chat-body {
            margin-left: 60px;
        }

        .chat li.right .chat-body {
            margin-right: 60px;
        }


        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel .slidedown .glyphicon,
        .chat .glyphicon {
            margin-right: 5px;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }
        .img-circle
        {
            width: 50px;
            border: 2px solid red;
        }
    </style>

</head>

<body>


    <div class="container ">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="panel panel-primary">
                    <div class=" bg-primary p-3 text-light">
                        <span class="glyphicon glyphicon-comment"></span> Chat

                    </div>
                    <div class="panel-body">
                        <ul class="chat mt-5" id="chat-section">
                            {{-- <li class="left clearfix"><span class="chat-img pull-left">
                                    <img src="{{url(asset('userImages.png'))}}" alt="User Avatar"
                                        class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Jack Sparrow</strong> <small
                                            class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                        ornare
                                        dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li> --}}
                            {{-- <li class="right clearfix"><span class="chat-img pull-right">
                                    <img src="{{url(asset('userImages.png'))}}" alt="User Avatar"
                                        class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins
                                            ago</small>
                                        <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                        ornare
                                        dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li>
                            <li class="left clearfix"><span class="chat-img pull-left">
                                    <img src="{{url(asset('userImages.png'))}}" alt="User Avatar"
                                        class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Jack Sparrow</strong> <small
                                            class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                        ornare
                                        dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix"><span class="chat-img pull-right">
                                    <img src="{{url(asset('userImages.png'))}}" alt="User Avatar"
                                        class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins
                                            ago</small>
                                        <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                        ornare
                                        dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="message" name="message" type="text" class="form-control"
                                placeholder="Type your message here..." />
                            <input id="username" name="username" hidden value="{{$username}}" type="text" class="form-control"
                                placeholder="Type your message here..." />
                            <span class="input-group-text">
                                <button class="btn btn-warning " onclick="fireEvent()" id="btn-chat">
                                    Send</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
    <script>
        function fireEvent() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '{{ route('broadcast.chat') }}',
                type: 'POST',
                data:{username:$("#username").val(),message:$("#message").val()},
                success: function(result) {
                        $("#message").val(" ");
                },
                error:function(error)
                {
                    console.log(error);
                }
            })
        }

        setTimeout(() => {
            Echo.channel('chat_message').listen('chat', (data) => {
                $username=$("#username").val();
                const currentDate = new Date(); // Create a new Date object
const hours = currentDate.getHours(); // Get the current hour (0-23)
const minutes = currentDate.getMinutes(); // Get the current minutes (0-59)
const seconds = currentDate.getSeconds();
const currentTime = `${hours}:${minutes}:${seconds}`;
                if($username!=data.username)
            {
               newMessage=` <li class="left clearfix bg-info px-5 py-2 border border-2 rounded-pill"><span class="chat-img pull-left">
                                    <img src="{{url(asset('userImages.png'))}}" alt="User Avatar"
                                        class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">${data.username}</strong> <small
                                            class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>${currentTime}</small>
                                    </div>
                                    <p>
                                       ${data.message}
                                    </p>
                                </div>
                            </li>`;
            }
            else
            {
                newMessage=`<li class="right clearfix  bg-text-success px-5 py-2 border border-2 rounded-pill"><span class="chat-img pull-right">
                                    <img src="{{url(asset('userImages.png'))}}" alt="User Avatar"
                                        class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>${currentTime}</small>
                                        <strong class="pull-right primary-font">${data.username}</strong>
                                    </div>
                                    <p>
                                       ${data.message}
                                    </p>
                                </div>
                            </li>`;
            }
                $("#chat-section").append(newMessage);

            })
        }, 100);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>

</html>
