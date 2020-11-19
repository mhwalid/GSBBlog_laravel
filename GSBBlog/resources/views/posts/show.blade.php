@extends('layouts.app')


@section('content')

                        <a href="/posts" class="btn btn-dark mb-4"> Back</a>        
                <h1> {{$post->title}} </h1>
                    <div class="jumbotron  py-4 ">
                        {!!$post->body!!}
                       
                    </div>
                    <hr>
                    <small>Written on {{ $post->created_at}}</small>
                    <hr>

                <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
                {{-- <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger"> supprimer</a></button></td> --}}
                

               
@endsection

