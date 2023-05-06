<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>
    <div class="card">
        {{ Form::open(['route' => 'category.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}

        <div class="card">
            @include('category.form')
            @include('components.footer-buttons', [ 'cancelRoute' => 'category.index' ])
        </div>
        {{ Form::close() }}
    </div>
</x-app-layout>
