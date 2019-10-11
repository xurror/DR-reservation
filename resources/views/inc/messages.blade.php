@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach    
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    
@endif

<div class="alert alert-primary" id="alert-prinary" style="display:none" role="alert-">
    Request <strong>COMPLETE</strong>!
</div>
<div class="alert alert-secondary" id="alert-secondary" style="display:none" role="alert-">
    This is a secondary alert-—check it out!
</div>
<div class="alert alert-success" id="alert-success" style="display:none" role="alert-">
    This is a success alert-—check it out!
</div>
<div class="alert alert-danger" id="alert-danger" style="display:none" role="alert-">
    Sorry an <strong>ERROR</strong> occurred!
</div>
<div class="alert alert-warning" id="alert-warning" style="display:none" role="alert-">
    This is a warning alert-—check it out!
</div>
<div class="alert alert-info" id="alert-info" style="display:none" role="alert-">
    Request <strong>COMPLETE</strong>!
</div>
<div class="alert alert-light" id="alert-light" style="display:none" role="alert-">
    This is a light alert-—check it out!
</div>
<div class="alert alert-dark" id="alert-dark" style="display:none" role="alert-">
    This is a dark alert-—check it out!
</div>