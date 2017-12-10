
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.admin.head')
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form id="login_form" action="{{ url('login') }}" method="post">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ old('email') }}" autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" value="">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->

                            <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->

<script src="{{URL::asset('back/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('back/js/bootstrap.min.js')}}"></script>


</body>

</html>
