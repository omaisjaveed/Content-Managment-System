@extends('layouts.auth')

@section('title', 'create Post')

@section('styles')

    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')


 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Posts </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('auth/Posts') }}"> Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Posts</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">



            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


              <h4 class="card-title">Create Posts</h4>
              <form action="{{ route('Posts.store') }}" method="post" enctype="multipart/form-data" class="forms-sample">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputName1" placeholder="Title">
                </div>
               
                <div class="form-group">
                  <label>Choose Category</label>
                  <select class="form-control" name="category">

                    <option disabled selected>Choose Category</option>
                        @foreach($category as $cat)
                            <option @selected( old('category') == $cat->id ) value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                  </select>

                </div>
                <div class="form-group">
                  <label>Publish</label>
                  <select name="is_publish" class="form-select" id="exampleSelectGender">
                    <option selected>Choose Option</option>
                    <option @selected( old('is_publish') == 1) value="1">Publish</option>
                    <option @selected( old('is_publish') == 0) value="0">Draft</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>File upload</label>
                  <input type="file" name="file" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea rows="10" class="form-control" id="summernote" name="description">
                        {{ old('description') }}
                    </textarea>
                </div>

                {{-- <div class="summernote"></div> --}}

                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
              </form>

            </div>
          </div>
        </div>
       
        
      </div>
    </div>



@endsection



@section('scripts')

<script>

    $(document).ready(function() {
        $('#summernote').summernote();
      });

</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

@endsection

