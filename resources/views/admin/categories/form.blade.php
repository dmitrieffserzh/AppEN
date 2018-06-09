<form action="{{ route('admin.categories.store') }}" method="POST" class="col-lg-6">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="title">Название категории</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="">
    </div>

    <div class="form-group">
        <label for="slug">URL категории</label>
        <input type="text" name="slug" id="slug" class="form-control" placeholder="">
        <p class="mt-1 p-2 bg-light small text-info rounded">Допускается ввод только латинских символов и
            символов " _ " и " - " без пробелов!</p>
    </div>

    <div class="form-group">
        <label for="parent_id">Родительская категория</label>
        <select id="parent_id" class="form-control" name="parent_id">
            <option value="0">-- без родительской --</option>
            @include('admin.categories.partials.item_form', ['categories' => $categories])
        </select>
    </div>

    <div class="form-group">
        <label for="color">Цвет</label>
        <input type="text" name="color" id="color" class="form-control color" value="#007bff">
    </div>

    <button type="submit" class="btn btn-primary">Добавить категорию</button>
</form>