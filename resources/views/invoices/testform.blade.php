<div>
    {{ Form::open(['route' => 'invoices.create', 'id' => 'testForm']) }}
    <div class="form-group row">
        {{ Form::label('field1',
            'Field 1',
            ['class' => 'col-xs-2']
        ) }}
        <div class="col-xs-10">
            <?= Form::text('field1', null, ['class' => 'col-xs-12 required ' . ($errors->has('field1') ? 'parsley-error' : '') ]) ?>
            @if ($errors->has('field1'))
                <ul class="parsley-errors-list filled">
                    {{ $errors->first('field1', '<li class="parsley-required">:message</li>') }}
                </ul>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('field2', 'Field 2', ['class' => 'col-xs-2']) }}
        <div class="col-xs-10">
            <?= Form::text('field2', null, ['class' => 'col-xs-12 ' . ($errors->has('field2') ? 'parsley-error' : '') ]) ?>
            @if ($errors->has('field2'))
                <ul class="parsley-errors-list filled">
                    {{ $errors->first('field2', '<li class="parsley-required">:message</li>') }}
                </ul>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('field3', 'Field 3', ['class' => 'col-xs-2']) }}
        <div class="col-xs-10">
            <?= Form::text('field3', null, ['class' => 'col-xs-12 required ' . ($errors->has('field3') ? 'parsley-error' : '') ]) ?>
            @if ($errors->has('field3'))
                <ul class="parsley-errors-list filled">
                    {{ $errors->first('field3', '<li class="parsley-required">:message</li>') }}
                </ul>
            @endif
        </div>
    </div>
    {{ Form::submit('Submit form', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
</div>

{{ HTML::style('http://parsleyjs.org/src/parsley.css') }}
{{ HTML::script('http://code.jquery.com/jquery-1.11.1.min.js') }}
{{ HTML::script('http://parsleyjs.org/dist/parsley.min.js') }}

<script type="text/javascript">
    $(document).ready(function() {
        $("#testForm").parsley();
    });
    </script>