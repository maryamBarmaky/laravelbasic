@extends('layout')
@section('content')
 <div class="row">
     <div class="col-md-4">
         <h1>{{ $banner->street }}</h1>
         <h2>{!! $banner->price !!}</h2>
         <div class="description">
             {!! nl2br($banner->description) !!}
         </div>

     </div>

     <div class="col-md-8">
         @foreach($banner->photos->chunk(4) as $set)
             <div class="row">
                 @foreach($set as $photo)
                     <div class="col-md-6" style="margin-bottom: 1em">
                         @if($singedIn and $user->owns($banner))
                         <form method="POST" action="/photos/{{$photo->id}}">
                             {{csrf_field('DELETE')}}
                             {{csrf_field()}}
                             <button class="btn-sm btn-danger label" type="submit">&times</button>
                         </form>
                         @endif
                  <a href="/{{$photo->path}}"  data-lity>     <img src="/{{$photo->path}}" alt="">   </a>
                     </div>
                 @endforeach

             </div>
             @endforeach
             @if($singedIn and $user->owns($banner))      {{--agar $singedIn nabashe error migirim. bayad hek kone bebine uese darim ya na --}}
                 <hr>
{{-------------------------------------------------------------------}}
                 <h2>add your photos</h2>
                 <form class="dropzone"  id="addPhotosForm" action="{{route('store_photo_path',[$banner->zip,$banner->street])}}" method="POST">
                     {{csrf_field()}}
                 </form>
{{----------------------------------------------------------------------------}}

             {{--<h2>add your photos</h2>--}}
             {{--<form class="dropzone"  id="addPhotosForm" action="/{{$banner->zip}}/{{$banner->street}}/photos" method="POST">--}}
                 {{--{{csrf_field()}}--}}
             {{--</form>--}}
             @endif
     </div>

 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.addPhotosForm={
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 3, // MB
            acceptedFiles: '.jpg, .jpeg, .png, .bmp '

        };
    </script>
@stop