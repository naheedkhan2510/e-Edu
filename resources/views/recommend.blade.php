@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                 Course Recommendation</div>

                <div class="card-body">
                    <script>
                        $(window).on('load', function () {
                            setTimeout(function() {
                                $(".wait").fadeOut("slow");
                                $(".recom").fadeIn(500);
                            }, 5000);
                        });
                    </script>
                    <div class="wait">
                        <h3> Please wait while we calculate your result and recommend courses for you. </h3>
                        <img src="{{asset('preloader.gif')}}" alt="preloader" class="center">
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                        <div class="recom" style="display:none;">
                            <h3>Recommended Course: <span
                                style="color:red">@foreach ($data as $key => $value)
                                                     {{ $key }}</span>    
                                                     <br>Score: <span style="color:red">{{ $value }}</span></br>
                                                    @endforeach
                                                    @if ($value <= 10)
                                                        Level: <span style="color:red">Basic</span>
                                                    @elseif ($value > 10 && $value <= 20)
                                                        Level: <span style="color:red">Medium</span>
                                                    @elseif ($value > 20 && $value <= 30)
                                                        Level: <span style="color:red">High</span>
                                                    @endif
                            </h3>
                                                    <form action="{{route('video')}}" method="post">
                                                    @csrf
                                                    @foreach ($data as $key => $value)
                                                    <input type="hidden" name="dta" value={{$key}}>
                                                    @endforeach
                                                    <input type="hidden" name="dta1" value={{$value}}>
                                                    <div class="recom" style="display:none;">
                                                        <button type="submit" class="btn btn-success" id="submitButton">
                                                        NEXT<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                                                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
@endsection
