<!DOCTYPE html>

<html>
    <head>
        <title>ChatApp  Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />


        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="row">
            <div class="col-sm-5 mx-auto mt-5">
        <form class="" method="post" action="{{route('chat')}}">
            @csrf
            <span>Name</span>
            <input type="text" @if($errors->has('username')) style="border:2px solid red;"  @endif name="username" class="form-control mb-2" />
            <input type="submit" value="Login" class="form-control mb-2 btn btn-primary" />
        </form>
    </div>
    </div>
         </body>
</html>
