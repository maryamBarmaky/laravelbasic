@extends('layout')
{{--@section('title' ,$card->id .'card')--}}

@section('content')
    {{--<div class="panel-body">--}}
    {{--<form method="GET" action="{{ route('items-lists') }}">--}}

    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="form-group">--}}
    {{--<input type="text" name="titlesearch" class="form-control" placeholder="Enter Title For Search">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="form-group">--}}
    {{--<button class="btn btn-success">Search</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}



    {{--<table class="table table-bordered">--}}
    {{--<thead>--}}
    {{--<th>Id</th>--}}
    {{--<th>body</th>--}}
    {{--<th>Creation Date</th>--}}
    {{--<th>Updated Date</th>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@if($items->count())--}}
    {{--@foreach($items as  $item)--}}
    {{--<tr>--}}
    {{--<td>{{ ++$key }}</td>--}}
    {{--<td>{{ $item->body }}</td>--}}
    {{--<td>{{ $item->created_at }}</td>--}}
    {{--<td>{{ $item->updated_at }}</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--@else--}}
    {{--<tr>--}}
    {{--<td colspan="4">There are no data.</td>--}}
    {{--</tr>--}}
    {{--@endif--}}


    {{--{{ $items->links() }}--}}

    {{--</div>--}}















    <div class="container">
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h5>
                    <ul>
                        @foreach($user->banners as $banner)
                            <li>
                                <a href="#">
                                    {{$banner->city}}
                                </a>
                                {{--<a class="float-right" href="#">{{$banner->user->username}}</a>--}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <small class="text-muted">created at: {{$user->created_at}}</small>
                </div>
            </div>
        </div>
        <hr>

        {{--<h3>add new note</h3>--}}

        {{--<form method="post" action="/cards/{{$card->id}}/notes">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="form-group">--}}
                {{--<textarea name="body" title="body" class="form-control">{{old('body')}}</textarea>--}}
            {{--</div>--}}
            {{--<button class="btn-primary">add note</button>--}}
            {{--<div class="form-group">--}}
                {{--<select id="tag_list" name="tags[]" title="tags" class="form-control" multiple="multiple">--}}
                    {{--@foreach($tags as $tag)--}}
                        {{--<option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</form>--}}




    </div>

@stop

