<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Staff') }}
        </h2>
    </x-slot>
    <div class="card">
        {{ Form::open(['route' => 'staff.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}

        <div class="card">
            @include('staff.form')
            @include('components.footer-buttons', [ 'cancelRoute' => 'staff.index' ])
        </div>
        {{ Form::close() }}
    </div>
</x-app-layout>
