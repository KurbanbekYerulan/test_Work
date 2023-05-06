<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comments') }}
        </h2>

    </x-slot>
    <div class="card">
        <div class="card-body">
            <button onclick="window.location='{{ route("book.index") }}'">
                <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:30px"></i>
            </button>
            <div class="row">
                <div class="col-3">
                    <img src="{{asset('books/'.$data->cover)}}" alt="">
                </div>
                <div class="col-3">
                    <label for="">Title</label>
                    <h5>{{$data->title}}</h5>
                    <br>
                    <label for="">Author</label>
                    <h5>{{$data->author}}</h5>
                </div>
                <div class="col-6">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                <div class="card-body p-4">
                                    <div class="form-outline mb-4">
                                        <form action="{{ route("comment.store") }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <input type="text" id="comment" name="comment" class="form-control"
                                                   placeholder="Type comment..."/>
                                            <button class="btn btn-success mt-1">+ Add a note</button>
                                        </form>
                                    </div>
                                    @foreach($data->comments as $comment)
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <p>{{$comment->comment}}</p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <p class="small mb-0 ms-2">{{$comment->username}}</p>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <p class="small text-muted mb-0">Delete?</p>
                                                        <form method="post"
                                                              action="{{route('comment.destroy',$comment->id)}}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit">
                                                                <i class="fas fa-eraser mx-2"
                                                                   style="margin-top: -0.16rem; color: #ef4444"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
