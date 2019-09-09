@extends('layouts.master')

@section('content')

  <div class="col-md-4 mb-3">
                              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

@endsection
