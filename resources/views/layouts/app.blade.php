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


    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col fixed-top" style="height: 60px; background-color: #F5F5F5;">
            <div class="row" style="padding-top: 10px;">
                <div class="col">
                    <img src="{{ asset('storage/img/logo.png') }}" width="50" height="50" alt="">
                </div>
                <div class="col text-right">
                    <a href="#" id="user_icon" data-toggle="popover" data-trigger="focus" onclick="javascript:void(0);return false;"><i class="fas fa-user fa-3x text_orange"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 75px;">
    <div class="row">
        <div class="col">
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
            content: "<ul><li><a href='#' id='user_profile'>Profile</a></li><li><a href='#' id='change_password'>Change Password</li><li><a href='{{ url('logout') }}'>Log out</a></li></ul>",
            title: '<div id="user_title" style="font-weight: bold;">{{ session('user_type') . ' ' . session('name') }}</div><div class="text-left" style="font-size:70%;"></div>'
        });

        $('.modal').on("hidden.bs.modal", function (e) {
            if ($('.modal:visible').length) {
                $('body').addClass('modal-open');
            }
        });
    });

    function readPhotoURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#photo').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
</body>
</html>
