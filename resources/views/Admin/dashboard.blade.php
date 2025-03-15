@extends('Admin.Layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        @include('Admin.Layouts.sidebar')
        <div class="col-md-9">
            <div class="mt-2 row">
            <div class="col-md-12">
                <div class="card-header bg-[#d99a00]">
                    <h2 class="mt-2">Dashboard</h2>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
