<label for="published">Статус</label>
<select name="published" class="form-control">
    @if(isset($category->id))
    <option value="0" @if($category->published == 0) selected="" @endif >Не опубликовано</option>
    <option value="1" @if($category->published == 1) selected="" @endif >Опубиковано</option>
    @else
    <option value="0">Не опуликовано</option>
    <option value="1">Опубликовано</option>
    @endif
</select>

<label for="title">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Наименование категори" {{$category->title or ""}} required>

<label for="slug">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" {{$category->slug or ""}} readonly="">

<label for="parent_id">Родительская категория</label>
<select name="parent_id" class="form-control">
    <option value="0">-- без родительской категории --</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<hr>

<input type="submit" class="btn btn-primary" type="submit" value="Сохранить">