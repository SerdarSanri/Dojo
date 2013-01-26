{{ Form::open('dojo/users/edit/update', 'PUT',array('class'=>'form-horizontal')) }}
{{Form::token()}}

	

	<center>
	<fieldset>
		<legend><h1>Updating profile of user <b>{{$user->username}}</b></h1></legend><br/>

		@if($errors->has())
			<div>
				{{ $errors->first('username', '<center><span class="error-box">:message</span></center>') }}
				{{ $errors->first('name', '<center><span class="error-box">:message</span></center>') }}
		        {{ $errors->first('password', '<center><span class="error-box">:message</span></center>') }}
		        {{ $errors->first('email', '<center><span class="error-box">:message</span></center>') }}

			</div>
			<br />
		@endif

		<!--username field-->
		<div class="control-group">
			{{Form::label('name','Name:',array('class'=>'control-label'))}}
			<div class="controls">
				{{Form::text('name', $user->name ,array('class' => 'round'))}}
			</div>
		</div>

		<div class="control-group">
			{{Form::label('username','Username:',array('class'=>'control-label'))}}
			<div class="controls">
				{{Form::text('username', $user->username ,array('class' => 'round'))}}
			</div>
		</div>

		<div class="control-group">
		   {{Form::label('email','Email:',array('class'=>'control-label'))}}
		   <div class="controls">
		   		{{Form::text('email', $user->email ,array('class' => 'round'))}}
		   </div>
		</div>

		<div class="control-group">
			{{Form::label('Role','Role:',array('class'=>'control-label'))}}
			<div class="controls">
				{{ Form::select('role', array('user' => 'user', 'admin' => 'admin'),$user->role)}}
			</div>
		</div>

		<div class="control-group">
        	{{Form::label('enable','Enabled:',array('class'=>'control-label'))}} 
        	<div class="controls">
        		@if($user->enable == 1)
        		{{ Form::checkbox('enable','1', true) }}
        		@else
        		{{ Form::checkbox('enable','1',false)}}
        		@endif
        	</div>
		</div>

		<div class="control-group">
			{{Form::label('password','Password:',array('class'=>'control-label'))}}
			<div class="controls">
			{{Form::password('password',array('class' => 'round'))}}
			</div>
		</div>
		{{ Form::hidden('id', $user->id) }}

		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Update',array('class'=>'btn btn-primary')) }}  {{ Form::submit('Cancel',array('class'=>'btn'))}}
			</div>
		</div>

	{{ Form::close() }}
	</fieldset>
</center>