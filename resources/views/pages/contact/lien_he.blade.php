@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>{{ __('Contact us') }}</h2>
                <p></p>
                @foreach($contact as $key => $cont)
                    <div style="padding: 30px; text-align: initial; margin-left: 100px" class="col-md-5">
                        {!!$cont->info_contact!!}
                        {!!$cont->info_fanpage!!}

                    </div>
                    <div class="col-md-5">
                        {!!$cont->info_map!!}
                    </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>
@endsection
