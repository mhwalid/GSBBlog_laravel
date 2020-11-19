@extends('layouts.app')


@section('content')

 <div class="card">
    <div class="card-header text-center font-weight-bold">
      Ajoutez un nouveau post
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('posts.update' ,$post ->id)}}"> 
        @method('PUT')
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ strip_tags($post->title) }}"  >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="body" id="body"class="form-control" >{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
        
@endsection


@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'body', {
        filebrowserUploadUrl: "{{route('posts.create')}}",
        filebrowserUploadMethod:'form'
  } );
</script>
    
@endsection

  