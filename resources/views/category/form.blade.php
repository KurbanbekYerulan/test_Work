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
                {{ Form::label('slug', 'Slug', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
        </div>
    </div>
</div>
