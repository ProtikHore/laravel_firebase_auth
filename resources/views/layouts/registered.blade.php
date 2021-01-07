<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery-ui.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/font-awesome.all.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.toaster.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/jquery.treegrid.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery.treegrid.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/popupWindow.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/popupWindow.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}" type="text/javascript"></script>

    <link href="{{ asset('css/jquery-confirm.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery-confirm.min.js') }}" type="text/javascript"></script>

    <style type="text/css">
        body {
            font-size: .7rem;
            background-color: #FFFFFF;
        }

        .text_orange {
            color: #A60A67;
        }

        .text_red {
            color: red;
        }

        .btn_orange {
            background-color: #A60A67;
            color: white;
        }

        .margin_left_fifteen_px {
            margin-left: 15px;
        }

        .pagination li {
            padding-right: 5px;
        }

        .page-item:last-child .page-link {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .page-item:first-child .page-link {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .pagination_active {
            background-color: #007bff;
        }

        .table td, .table th {
            padding: .25rem;
        }

        .btn-sm {
            padding: .4rem .5rem;
            line-height: 1;
            font-size: .7rem;
        }

        .form-control {
            height: calc(1rem + .75rem + 2px);
            padding: .25rem .5rem;
            font-size: .7rem;
        }



        .form-group label {
            font-size: .7rem;
        }

        .btn-outline-secondary {
            height: calc(1.90rem + 2px);
            margin-top: -1px;
            padding: .25rem .75rem;
            font-size: .65rem;
        }

        .modal_thirty {
            max-width: 30%;
        }

        .modal_forty {
            max-width: 40%;
        }


        .modal_fifty {
            max-width: 50%;
        }

        .modal_sixty {
            max-width: 60%;
        }

        .modal_seventy {
            max-width: 70%;
        }

        .modal_eighty {
            max-width: 80%;
        }

        .modal_ninety {
            max-width: 90%;
        }

        .ajax_loading_modal {
            display:    none;
            position:   fixed;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 )
            url('{{ asset('storage/img/loading.gif') }}')
            50% 50%
            no-repeat;
        }

        #header {
            height:120px;
            background: linear-gradient(120deg, #1b4b72 55%, #fd7e14 45%);
        }


    </style>
</head>
<body>
<div class="container-fluid">
    <div class="modal fade" id="change_password_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" id="change_password_modal_close" data-dismiss="modal">
                        &times;
                    </button>
                </div>

                <div class="modal-body" style="padding-left: 80px; padding-right: 80px; padding-bottom: 50px;">
                    <div id="change_password_form_message" class="text-danger text-center"></div>
                    <form id="change_password_form">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input name="current_password" type="password" class="form-control" id="current_password" placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row" id="header">
        <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9 mx-auto text-center fixed-top">
            <div class="row">
                <div class="col-6 text-right pt-2">
                    <div class="row">
                        <div class="col text-white header_title_1">2<sup>ND</sup> BES-MAYO ADVANCED</div>
                    </div>
                    <div class="row">
                        <div class="col text-white header_title_1">COURSE IN ENDOCRINOLOGY 2021</div>
                    </div>
                    <div class="row">
                        <div class="col text-white header_title_2">17-20 February, 2021</div>
                    </div>
                </div>
                <div class="col-3 pt-4">
                    <div class="row">
                        <div class="col text-right text-white header_title_3">Organized By</div>
                    </div>
                    <div class="row">
                        <div class="col text-right" style="padding-right: 27px;">
                            <img src="{{ asset('storage/img/logo.png') }}" width="50" height="50">
                        </div>
                    </div>
                </div>
                <div class="col-3 pt-4">
                    <div class="row">
                        <div class="col text-right text-white header_title_3">In Association With</div>
                    </div>
                    <div class="row">
                        <div class="col text-right" style="padding-right: 35px;">
                            <img src="{{ asset('storage/img/mayo_clinic.png') }}" width="50" height="50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col text-right">
            <a href="#" id="user_icon" data-toggle="popover" data-trigger="focus" onclick="javascript:void(0);return false;"><i class="fas fa-user fa-3x text_orange"></i></a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <table class="table table-bordered tree-basic">
                <tbody>
                    <tr> <td><a href="#">Evaluation Form</a></td> </tr>
                    <tr> <td><a href="#">Certificates</a></td> </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-10">
            @yield('content')
        </div>
    </div>
</div>
<div class="container-fluid fixed-bottom" style="font-size: 0.8rem;">
    <div class="row">
        <div class="col text-center" style="padding-top: 15px; color: white; background-color: #222d3f;">
            Copyright &copy; {{ date('Y') }} Bangladesh Endocrine Society. All Rights Reserved.
        </div>
    </div>
    <div class="row">
        <div class="col text-center" style="padding-bottom: 15px; color: white; background-color: #222d3f;">
            Designed & Developed by <a href="https://proximasoft.net" target="_blank">Proxima Soft</a>
        </div>
    </div>
</div>

<div class="ajax_loading_modal">

</div>




<script language="JavaScript">


    $body = $("body");
    $(document).on({
        ajaxStart: function() {
            var zIndex = 999;
            if ($('body').hasClass('modal-open')) {
                zIndex = parseInt($('div.modal').css('z-index')) + 1;
            }
            $(".ajax_loading_modal").css({
                'z-index': zIndex
            });
            $body.addClass("loading");
            $('body.loading .ajax_loading_modal').css({
                'overflow': 'hidden',
                'display': 'block'
            });
        },
        ajaxStop: function() {
            $('body.loading .ajax_loading_modal').css({
                'overflow': 'visible',
                'display': 'none'
            });
            $body.removeClass("loading");

        }
    });


    function isPositiveInteger(s) {
        return /^\d+$/.test(s);
    }

    $(document).ready(function () {

        $(document).tooltip({ selector: '[data-toggle=tooltip]' });

        $('#left_navigation').treegrid();

        $('.modal').modal({
            backdrop: 'static',
            keyboard: true,
            show: false
        });

        $.datepicker.setDefaults({
            dateFormat: 'dd-MM-yy',
            changeMonth: true,
            changeYear: true
        });

        $('#user_icon').popover({
            html: true,
            placement: 'bottom',
            content: "<ul><li><a href='#' id='user_profile'>Profile</a></li><li><a href='#' id='change_password'>Change Password</li><li><a href='{{ url('registered/logout') }}'>Log out</a></li></ul>",
            title: '<div id="user_title" style="font-weight: bold;">{{ session('user_type') . ' ' . session('name') }}</div><div class="text-left" style="font-size:70%;"></div>'
        });

        $(document).on('click', '#change_password', function () {
            $('#change_password_form').trigger('reset');
            $('#change_password_form_message').empty();
            $('#change_password_form').find('.text-danger').removeClass('text-danger');
            $('#change_password_form').find('.is-invalid').removeClass('is-invalid');
            $('#change_password_form').find('span').remove();
            $('#change_password_modal').modal('show').on('shown.bs.modal', function () {
                $('#current_password').focus();
            });
            return false;
        });


        $(document).on('submit', '#change_password_form', function () {

            $('#change_password_form').find('.text-danger').removeClass('text-danger');
            $('#change_password_form').find('.is-invalid').removeClass('is-invalid');
            $('#change_password_form').find('span').remove();
            let userDataPassword = new FormData(this);
            userDataPassword.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('registered/change/password') }}',
                data: userDataPassword,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    if (result === 'Password Updated Successfully') {
                        alert('Password Updated Successfully.. Return to Login page');
                        window.location = '{{url('/registered/logout')}}';
                    }
                    else if(result === 'Invalid Current Password!') {
                        // alert('Current Password id Invalid');
                        $('#change_password_form_message').append('<p>' + result + '</p>');
                    }
                    console.log(result);
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'id') {
                                    $('#' + key).after('<span></span>');
                                    $('#' + key).parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
                                } else {
                                    $.each(value, function (k, v) {
                                        $('#change_password_form_message').append('<p>' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
            return false;
        });


        $('.modal').on("hidden.bs.modal", function (e) {
            if ($('.modal:visible').length) {
                $('body').addClass('modal-open');
            }
        });
    });

</script>
</body>
</html>
