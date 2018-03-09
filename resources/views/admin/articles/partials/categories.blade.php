@foreach($categories as $category)

<option value="{{$category->id or ""}}"
    @isset($article->id)
        @foreach($article->categories as $category_article)
        <!-- Если категория из общего списка привязана к новости то она должна быть выбрана -->
            @if($category->id == $category_article->id)
                selected=""
            @endif
        @endforeach
    @endisset
>
{!! $delimiter or "" !!}{{$category->title or ""}}
</option>

@if(count($category->children) > 0)
    @include('admin.articles.partials.categories', [
        'categories' => $category->children,
        'delimiter' => '-'.$delimiter
    ])
@endif
<!-- 5 min -->
@endforeach