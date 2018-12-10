@extends('layout')
@section('content')
    <div class="container">

        <article>
            <div class="col-md-8">
                <h2>Your Details</h2>
                <dl class="dl-horizontal">
                    <dt>Name:</dt>
                    <dd>{{ $user->name ?: '-' }}</dd>
                    <dt>Email:</dt>
                    <dd>{{ $user->email ?: '-' }}</dd>

                </dl>
            </div>
        </article>
    </div>
    <div class="container">
        <h5>you can edit the profile</h5>
        <div class="col-lg-offset-2">
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-raised btn-primary">
                <i class="fa fa-pencil-square-o"></i> Edit
            </a>
        </div>
    </div>
    <br>
    <div class="container">
        <h1>show all banner</h1>
        <div class="col-lg-offset-2">
            <a href="{{ route('showBanner',$user->id) }}" class="btn btn-raised btn-primary">
                <i class="fa fa-pencil-square-o"></i> show
            </a>
        </div>

    </div>

    <div class="container">
        <h1>create your banner</h1>
        <div class="col-lg-offset-2">
            <a href="{{ route('banners.create') }}" class="btn btn-raised btn-primary">
                <i class="fa fa-pencil-square-o"></i> create
            </a>
        </div>

    </div>



@stop