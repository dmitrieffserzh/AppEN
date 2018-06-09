@extends('admin.administrator')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.5 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.news.create') }}"> Create New Article</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($articles as $article)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $article->title}}</td>
        <td>{{ $article->body}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.news.show',$article->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('admin.news.edit',$article->id) }}">Edit</a>
            <form action="{{ route('admin.news.destroy', $article->id) }}" method="POST" style="display:inline">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Del</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>


    {!! $articles->links() !!}
@endsection