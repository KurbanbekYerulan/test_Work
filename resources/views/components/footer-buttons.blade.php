<div class="card-footer">
    <div class="row">
        <div class="col">
            {{ link_to_route($cancelRoute, 'Отмена', [], ['class' => 'btn btn-danger btn-sm']) }}
        </div><!--col-->

        <div class="col text-right">
            {{ Form::submit((isset($id)) ? 'Обновить' : 'Создать', ['class' => 'btn btn-outline-success btn-sm pull-right']) }}
        </div><!--row-->
    </div><!--row-->
</div><!--card-footer-->
