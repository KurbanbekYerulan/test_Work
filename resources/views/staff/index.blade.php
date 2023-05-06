<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Staff') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <button class="btn btn-success" onclick="window.location='{{ route("staff.create") }}'">Создать</button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Еmail</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->first_name}}</td>
                                    <td>{{$d->last_name}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <form method="get" action="{{route('staff.edit',$d['id'])}}">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <form method="post" action="{{route('staff.destroy',$d['id'])}}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" >
                                                        <i class="fas fa-eraser" style='color:red'></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
