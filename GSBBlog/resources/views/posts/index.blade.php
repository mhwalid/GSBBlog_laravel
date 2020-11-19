@extends('layouts.app')


@section('content')
        
            <h1>Posts</h1>
           @if (count($posts)>0)
                @foreach ($posts as $post)
                    <div class="jumbotron  py-4 ">
                    <h3><a href="/posts/{{$post->id}}"> {{$post->title}} </a></h3>
                    <small>Written on {{ $post->created_at}}</small>
                    </div>
                

                    <form class="pt-1" method="POST" action="{{route('posts.destroy',$post->id)}}">
                           @csrf
                        @method('delete')
                       
                    <button type="submit" class="btn btn-danger pt" > Supprimer</button>
                    </form>
                @endforeach
               
                {{ $posts->links( "pagination::bootstrap-4") }}
           @endif
        
@endsection

