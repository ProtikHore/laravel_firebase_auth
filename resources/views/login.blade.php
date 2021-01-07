@extends('layouts.public', [
    'title' => 'Login'
])

@section('content')

    <div class="row">
        <div class="col text-center" style="margin-top: 0px; font-size: 200%;">
            User Log In
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col" style="margin-top: 20px; padding: 50px 100px; border: 1px solid #f8d7da;">
            <div id="form_message" class="text-danger text-center"></div>
            <form id="login_form">
                <div class="form-group">
                    <label for="login_id">Login ID</label>
                    <input name="login_id" type="text" class="form-control" id="login_id" placeholder="Login ID">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="text-left">
                    <a href="{{ url('otp/login') }}" class="btn btn-success btn-sm">Otp Login</a>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success btn-sm">Login</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>

    <script language="JavaScript">
        $('#login_form').submit(function(){
            $('#form_message').empty();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('login') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    if (result === 'Authorized User') {
                        location = '{{ url('dashboard/1') }}';
                    } else {
                        $('#form_message').text(result);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        if (xhr.responseJSON.errors.hasOwnProperty('login_id') || xhr.responseJSON.errors.hasOwnProperty('password')) {
                            $('#form_message').text('Unauthorized Access!');
                        }
                    }
                }
            });
            return false;
        });
    </script>
@endsection
