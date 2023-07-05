@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="pull-left col-sm-6">
                    <h1 class="m-0">{{ __('Posts') }}</h1>
                </div><!-- /.col -->
                <div class="pull-right col-sm-6">
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        List
                        
                    </div>



                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><img src="/image/{{ $post->image }}" width="100px"></td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->author_name }}</td>
                                        <td>
                                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                 
                                                <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                                  
                                                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                 
                                                @csrf
                                                @method('DELETE')
                                    
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $posts->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection