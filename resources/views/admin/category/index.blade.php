@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Category</div>
                  <div class="card-body">
                    <!-- Alert -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <!-- end alert -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorise as $key=>$category)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->user_id}}</td>
                                    <td>
                                        @if($category->created_at ==NULL)
                                            <span class="text-danger">Item selected</span>
                                        @else
                                            {{$category->created_at->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('Category/Edit/'.$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{url('softdelete/Category/'.$category->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="" class="btn btn-danger btn-sm">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                      <!--  {!! $categorise->links() !!}  -->
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category</div>
                    <div class="card-body">
                        <form action="{{route('store.category')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Category</label>
                                <input type="text" name="category_name" class="form-control  @error('category_name') is-invalid @enderror " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                                @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
 <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trash List</div>
                  <div class="card-body">
                    <!-- Alert -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <!-- end alert -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trashCat as $key=>$category)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->user_id}}</td>
                                    <td>
                                        @if($category->created_at ==NULL)
                                            <span class="text-danger">Item selected</span>
                                        @else
                                            {{$category->created_at->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('Category/Restore/'.$category->id)}}" class="btn btn-primary btn-sm">Restore</a>
                                        <a href="{{url('Category/P_Delete/'.$category->id)}}" class="btn btn-danger btn-sm">P_Delete</a>
                                       
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                      <!--  {!! $categorise->links() !!}  -->
                    </div> 
                </div>
            </div>
        </div>
        </div>
@endsection
