@extends('layouts.public', [
    'title' => 'Login'
])

@section('content')

    <section class="validOTPForm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="text-center">
                                Account verification
                            </h4>
                        </div>


                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="phone_no">Phone Number</label>

                                    <input type="text" class="form-control" name="phone_no" id="number" placeholder="(Code) *******">
                                </div>
                                <div id="recaptcha-container"></div>
                                <a href="#" id="getcode" class="btn btn-dark btn-sm">Get Code</a>

                                <div class="form-group mt-4">
                                    <input type="text" name="" id="codeToVerify" name="getcode" class="form-control" placeholder="Enter Code">
                                </div>

                                <a href="#" class="btn btn-dark btn-sm btn-block" id="verifPhNum">Verify Phone No</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script language="JavaScript">
        $(document).on('click', '#getcode', function () {
            let phoneNo = $('#number').val();
            $.ajax({
                method: 'get',
                url: '{{ url('otp/mobile/number/check') }}',
                data: {
                    'phone_no': phoneNo
                },
                success: function (result) {
                    console.log(result);
                    if (result === 'Number Found') {
                        // -------------------------------------
                        const firebaseConfig = {
                            apiKey: "AIzaSyDfbsKKiXml3qE-hmcJR_fzncyBCGzl8mc",
                            authDomain: "laravel-firebase-c4ed7.firebaseapp.com",
                            projectId: "laravel-firebase-c4ed7",
                            storageBucket: "laravel-firebase-c4ed7.appspot.com",
                            messagingSenderId: "598426850895",
                            appId: "1:598426850895:web:f209c2e6eaea56d81e3c3a",
                            measurementId: "G-WEKQKFDZR1"
                        };

                        // Initialize Firebase
                        firebase.initializeApp(firebaseConfig);

                        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                            'size': 'invisible',
                            'callback': function (response) {
                                // reCAPTCHA solved, allow signInWithPhoneNumber.
                                console.log('recaptcha resolved');
                                console.log('hello1');
                            }
                        });
                        onSignInSubmit();

                        function onSignInSubmit() {
                            $('#verifPhNum').on('click', function() {
                                let phoneNo = '';
                                var code = $('#codeToVerify').val();
                                console.log(code);
                                console.log('hello2');
                                $(this).attr('disabled', 'disabled');
                                $(this).text('Processing..');
                                confirmationResult.confirm(code).then(function (result) {
                                    //alert('Succecss');
                                    console.log(result.user.phoneNumber);

                                    //------------------------------------------------
                                    let formData = new FormData();
                                    formData.append('mobile_number', result.user.phoneNumber);
                                    formData.append('_token', '{{ csrf_token() }}');
                                    console.log(formData);
                                    console.log('check');
                                    $.ajax({
                                        method: 'post',
                                        url: '{{ url('opt/login') }}',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        success: function (result) {
                                            console.log(result);
                                            if (result === 'Authorized User') {
                                                location = '{{ url('dashboard') }}';
                                            } else {
                                                $('#form_message').text(result);
                                            }
                                        },
                                        error: function (xhr) {
                                            console.log(xhr);
                                        }
                                    });

                                    //------------------------------------------------


                                    var user = result;
                                    console.log(user);
                                    console.log('hello3');


                                    // ...
                                }.bind($(this))).catch(function (error) {

                                    // User couldn't sign in (bad verification code?)
                                    // ...
                                    $(this).removeAttr('disabled');
                                    $(this).text('Invalid Code');
                                    console.log('hello4');
                                    setTimeout(() => {
                                        $(this).text('Verify Phone No');
                                        console.log('hello5');
                                    }, 2000);
                                }.bind($(this)));
                                console.log('hello6');

                            });


                            var phoneNo = $('#number').val();
                            console.log(phoneNo);
                            console.log('hello7');
                            // getCode(phoneNo);
                            var appVerifier = window.recaptchaVerifier;
                            firebase.auth().signInWithPhoneNumber(phoneNo, appVerifier)
                                .then(function (confirmationResult) {

                                    window.confirmationResult=confirmationResult;
                                    coderesult=confirmationResult;
                                    console.log(coderesult);
                                    console.log('hello8');
                                }).catch(function (error) {
                                console.log(error.message);
                                console.log('hello9');

                            });
                            console.log('hello10');
                            console.log('hello11');
                        }

                        //--------------------------------------
                    } else {
                        alert(result);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });
    </script>
@endsection
