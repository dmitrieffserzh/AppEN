<form action="{{ route('admin.news.store') }}" method="POST">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="category_id">Категория</label>
        <select id="category_id" class="form-control" name="category_id">
            <option value="0">-- без родительской --</option>
            @include('admin.categories.partials.item_form', ['categories' => $categories])
        </select>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" value="{{ $article->title or "" }}" placeholder="Title">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Body:</strong>
            <textarea name="content" class="form-control"  placeholder="News content">{{ $article->content or "" }}</textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>



@section('scripts')
    <script>
        $('#category_id').select2({
            placeholder: 'Select an option'
        });
    </script>
@endsection