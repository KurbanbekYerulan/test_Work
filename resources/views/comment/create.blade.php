<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>
    <div class="card">
        {{ Form::open(['route' => 'book.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true,'enctype'=>'multipart/form-data']) }}

        <div class="card">
            @include('book.form')
            @include('components.footer-buttons', [ 'cancelRoute' => 'book.index' ])
        </div>
        {{ Form::close() }}
    </div>
</x-app-layout>
