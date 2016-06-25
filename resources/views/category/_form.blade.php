@if(isset($category))
	{!! Form::model($category, ['url' => 'category/'.$category->id, 'method' => 'put']) !!}
@endif
{!! Form::open(['url' => 'category', 'method' => 'post']) !!}
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-sm-2">Category Name</label>
			<div class="col-sm-5">
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>

	</form>
{!! Form::close() !!}