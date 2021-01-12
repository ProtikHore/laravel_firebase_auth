@extends('layouts.app', [
    'title' => $title,
])

@section('content')
    <div class="row">
        <div class="col">
            <div class="row" style="margin-top: 0%;">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="card bg-light text-black-50">
                        <div class="card-body text-center">
                            <h4 class="card-title">Proxima Soft</h4>
                            <p class="card-text"><i class="fas fa-home"></i> House # 04, Road # 08, Block # A, Section # 10, Mirpur, Dhaka, Bangladesh.</p>

                            <p class="card-text"><i class="fas fa-phone"></i> +8801704800311, +8809611700000</p>
                            <p class="card-text"><i class="fas fa-envelope-square"></i> info@proximasoft.net</p>
                            <a href="www.proximasoft.net" class="card-link"><i class="fas fa-globe"></i> www.proximasoft.net</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="float-right">
                        {{--                        <img src="{{ asset('storage/image/app/logo_full.png') }}">--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
