$(document).ready(function() {

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
});



function onSignInSubmit() {
    $('#verifPhNum').on('click', function() {
        let phoneNo = '';
        var code = $('#codeToVerify').val();
        console.log(code);
        console.log('hello2');
        $(this).attr('disabled', 'disabled');
        $(this).text('Processing..');
        confirmationResult.confirm(code).then(function (result) {
            alert('Succecss');
            var user = result.user;
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


    $('#getcode').on('click', function () {
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
    });
    console.log('hello11');
}



// function getCode(phoneNumber) {
//     var appVerifier = window.recaptchaVerifier;
//     firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
//         .then(function (confirmationResult) {
//             console.log(confirmationResult);
//             // SMS sent. Prompt user to type the code from the message, then sign the
//             // user in with confirmationResult.confirm(code).
//             window.confirmationResult = confirmationResult;
//             $('#getcode').removeAttr('disabled');
//             $('#getcode').text('RESEND');
//         }).catch(function (error) {

//             console.log(error);
//             console.log(error.code);
//             // Error; SMS not sent
//             // ...
//         });
//   }
