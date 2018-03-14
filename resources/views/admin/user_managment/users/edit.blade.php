@extends('layouts.admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumb')
    @slot('title') Редактирование пользователя @endslot
    @slot('parent') Главная @endslot
    @slot('active') Пользователи @endslot
    @endcomponent    
    
    <hr>
    
    <form action="{{route('admin.user_managment.user.update', $user)}}" class="form-horizotal" method="post">
       <input type="hidden" name="_method" value="put">
        {{method_field('PUT')}}
        {{csrf_field()}}
        
        {{--Form include--}}
        @include('admin.user_managment.users.partials.form')
        
    </form>
</div>
@endsection