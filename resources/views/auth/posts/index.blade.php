@extends('layouts.auth')


@section('content')

 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Posts </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('auth/Posts') }}">Posts</a></li>
          <li class="breadcrumb-item active" aria-current="page">All Posts</li>
        </ol>
      </nav>
    </div>
    <div class="row">
     
      
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Striped Table</h4>
            <p class="card-description"> Add class <code>.table-striped</code>
            </p>
            @if(count($posts) > 0)

              <table id="myTable" class="table table-striped">
                <thead>
                  <tr>
                    <th> Image </th>
                    <th> Post Titile </th>
                    <th> Category Name </th>
                    <th> Description </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  
                
                  @foreach($posts as $post)
                  <tr>
                   

                    
                    <td class="py-1">
                      <img src="{{ asset('storage/images/posts/' . optional($post->gallery)->image) }}" alt="image">
                      {{-- <img src="{{ asset('storage/images/'.$post->gallery->image) }}" alt="image"> --}}

                    </td>
                    <td>  
                      {{$post->title}}
                    </td>
                    <td>
                      {{$post->category->name}}
                    </td>
                    <td> 
                      {{$post->description}}
                    </td>
                    <td> 
                      {{$post->is_publish}}
                    </td>
                    <td> 
                      <a href="" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                      <a href="" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                      <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                     
                    </td>

                    
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>

            @else
              <h3 class="alert-danger text-danger text-center">NO Posts Found</h3>
            @endif
          </div>
        </div>
      </div>
      
      
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->

@endsection



@section('scripts')
<script>


  </script>

@endsection