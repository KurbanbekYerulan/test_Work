<div class="card-body">
    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('title', 'Title', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('slug', 'Slug', ['class' => 'col-md-2 from-control-label']) }}
                <div class="col-md-10">
                    {{ Form::text('slug', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('author', 'Author', ['class' => 'col-md-2 from-control-label']) }}
                <div class="col-md-10">
                    {{ Form::text('author', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('description', 'Description', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('rating', 'Rating', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::number('rating', null, ['class' => 'form-control', 'required' => 'required', 'step' => 'any']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('cover', 'Cover', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::file('cover', null) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('category_id', 'Category', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($data->category as $d)
                            <option value="{{$d['id']}}">{{$d['title']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
