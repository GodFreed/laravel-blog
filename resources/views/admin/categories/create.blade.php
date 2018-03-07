@extends('layouts.admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumb')
    @slot('title') Создание категории @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
    @endcomponent    
    
    <hr>
    
    <form action="{{route('admin.category.store')}}" class="form-horizotal" method="post">
        {{csrf_field()}}
        
        {{--Form include--}}
        @include('admin.categories.partials.form')
    </form>
</div>
@endsection