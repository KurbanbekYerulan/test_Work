<x-app-layout>
    <div class="card">
        {{ Form::model($data, ['route' => ['book.update', $data,'id' => $data->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'files' => true]) }}
        <div class="card">
            @include('book.form')
            @include('components.footer-buttons', [ 'cancelRoute' => 'book.index', 'id' => $data->id ])
        </div>
        {{ Form::close() }}
    </div>
</x-app-layout>
