<style type="text/css">
    .login-container{
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .login-form-1{
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-1 h3{
        text-align: center;
        color: #333;
    }
    .login-form-2{
        padding: 5%;
        background: #0062cc;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-2 h3{
        text-align: center;
        color: #fff;
    }
    .login-container form{
        padding: 10%;
    }
    .btnSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }
    .login-form-1 .btnSubmit{
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }
    .login-form-2 .btnSubmit{
        font-weight: 600;
        color: #0062cc;
        background-color: #fff;
    }
    .login-form-2 .ForgetPwd{
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }
    .login-form-1 .ForgetPwd{
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }

</style>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>

    <div class="container">

        <div id="login-row" class="row justify-content-center align-items-center">

            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    {!! Form::open(array("url"=>"/login","method"=>"POST",'class'=>'login-form' )) !!}
                    <h3 class="text-center text-info">Login</h3>
                    @if(Session::has('messageWarning'))
                        <p class="alert alert-danger">{{ Session::get('messageWarning') }}</p>
                    @endif

                    <div class="form-group">
                        <label for="username" class="text-info">Username:</label><br>
                        <input type="email" name="email" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>