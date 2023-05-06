<x-app-layout>
    <div class="card">
        {{ Form::model($data, ['route' => ['staff.update', $data,'id' => $data->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'files' => true]) }}
        <div class="card">
            @include('staff.form')
            @include('components.footer-buttons', [ 'cancelRoute' => 'staff.index', 'id' => $data->id ])
        </div>
        {{ Form::close() }}
    </div>
</x-app-layout>
