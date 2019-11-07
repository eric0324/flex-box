@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('success_message'))
        <div class="alert alert-success">{{ Session::get('success_message') }}</div>
    @endif

    @if (Session::has('error_message'))
        <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
    @endif
</div>
<div class="container">
    <div class="row">
    @foreach ($flexes as $flex)
        <div class="col-3">
            <div class="card">
                <img src="{{ url($flex->demo_image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><a href="{{ route('flex.show', $flex->demo_code) }}">{{ $flex->name }}</a></h5>
                    <p class="card-text">{{ $flex->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    {!! $flexes->links() !!}
</div>
@endsection
