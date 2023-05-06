<div class="card-body">
    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('first_name', 'First name', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('last_name', 'Last name', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('email', 'Email', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
            <br>
            <div class="form-group row">
                {{ Form::label('password', 'Password', ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::password('password', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
        </div>
    </div>
</div>
