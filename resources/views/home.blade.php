@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome <b> {{ Auth::user()->name }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>
                        <a href="http://localhost:8000/admin/dashboard" class="btn btn-success">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
