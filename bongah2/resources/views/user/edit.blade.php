@extends('layout')
@section('content')
    <main class="container main">
        <article>
            <div class="col-sm-8">
                <h1>Member's Edit Profile</h1>
                <form class="form-horizontal" action="{{ route('user.update') }}" method="POST" role="form">
                    <fieldset>
                        <legend>Change Your Profile Details</legend>
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}




                        <div class="form-group">
                            <label for="name" class="control-label col-sm-2">Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                       value="{{ $user->name }}" >
                                <span class="help-block text-primary">Your full name here</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label col-sm-2">Email</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email or Username"
                                       value="{{  $user->email }}">
                                <span class="help-block text-primary">Enter email or username for login</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label col-sm-2">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <span class="help-block text-primary">Your password</span>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-sm-offset-2">
                                <button type="submit" class="btn btn-raised btn-primary">
                                    <i class="fa fa-pencil-square-o"></i>
                                    update
                                </button>
                            </div>

                        </div>


                    </fieldset>
                </form>
            </div>
        </article>

        <div class="col-md-6">
            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                {{csrf_field('DELETE')}}
                {{csrf_field()}}
                <button type="submit" class="btn btn-danger" onclick="return confirm('مطمعنید ک میخواهید دلیت کنیند؟')">
                    <i class="fa fa-trash-o fa-lg"></i> Delete
                </button>
            </form>
        </div>
    </main>

@stop