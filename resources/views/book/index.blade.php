<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    @if(Auth::user()->role_id===1 or Auth::user()->role_id===3)
                        <button class="btn btn-success" onclick="window.location='{{ route("book.create") }}'">Создать
                        </button>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Rating</th>
                                <th>Cover</th>
                                @if(Auth::user()->role_id===1 or Auth::user()->role_id===3)
                                    <th></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->title}}</td>
                                    <td>{{$d->slug}}</td>
                                    <td>{{$d->author}}</td>
                                    <td style="width: 500px">{{$d->description}}</td>
                                    <td>{{$d->rating}}</td>
                                    <td>
                                        <img src="{{ asset('books/'.$d->cover) }}" alt="tag" width="100" height="100">
                                    </td>
                                    <td>
                                        <div class="row">
                                            @if(Auth::user()->role_id===1 or Auth::user()->role_id===3)
                                                <div class="col-6 col-md-3 col-lg-2" style="padding: 0">
                                                    <form method="get" action="{{route('book.edit',$d['id'])}}">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-6 col-md-3 col-lg-2" style="margin-left: 15px">
                                                    <form method="post" action="{{route('book.destroy',$d['id'])}}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit">
                                                            <i class="fas fa-eraser" style='color:red'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                                <div class="col-6 col-md-3 col-lg-2" style="margin-left: 15px">
                                                    <button onclick="window.location='{{ route('comment.show',$d['id']) }}'">
                                                    <i class="fas fa-comment"></i>
                                                    </button>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
