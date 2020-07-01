@extends('layouts.app')

@section('content')

<!-- All styles here please -->
<style>
    a {
        color: #FFFFFF;
        text-decoration: none;
    }
</style>
<!-- Content below -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">E-Edu Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button type="button" class="btn btn-success"> <a href="{{route('start-test')}}" style="color:white; text-decoration:none;">
                    <i class="fa fa-check" aria-hidden="true"></i> Start Q & A Evaluation </a> </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
