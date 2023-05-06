<x-app-layout>
    <div class="card">
        {{ Form::model($data, ['route' => ['category.update', $data,'id' => $data->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'files' => true]) }}
        <div class="card">
            @include('category.form')
            @include('components.footer-buttons', [ 'cancelRoute' => 'category.index', 'id' => $data->id ])
        </div>
        {{ Form::close() }}
    </div>
</x-app-layout>
