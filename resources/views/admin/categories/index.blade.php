@extends('admin.administrator')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Категории новостей</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> Создать новую категорию</a>
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
        @include('admin.categories.partials.item', ['categories' => $categories])
    {{--@foreach ($categories as $category)--}}
    {{--<tr>--}}
        {{--<td>{{ ++$i }}</td>--}}
        {{--<td>{{ $category->title}}</td>--}}
        {{--<td>{{ $category->slug}}</td>--}}
        {{--<td>--}}
            {{--<a class="btn btn-info" href="{{ route('admin.categories.show', $category->id) }}">Show</a>--}}
            {{--<a class="btn btn-primary" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>--}}
            {{--<form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline">--}}
                {{--@csrf--}}
                {{--{{ method_field('DELETE') }}--}}
                {{--<button type="submit" class="btn btn-danger">Del</button>--}}
            {{--</form>--}}
        {{--</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    </table>


    {!! $categories->links() !!}
@endsection