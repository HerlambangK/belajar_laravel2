@extends('layout.success')
@section('title','checkout success')

@section('content')

{{-- suces page --}} 

<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
        <img src="{{url('frontend/images/ic_mail.png')}}" alt="success">
            <h1>Yay! Success</h1>
            <p>we've sent you email for trip information
                <br>
                Please read it as well</p>
            <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>


    
@endsection
