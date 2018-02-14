<html>
<body>
	<style type="text/css">
		body
		{
			background-color: #e3e3e3;
		}
		.frm
		{
			border: 2px solid #000;
			text-align: center;
			width: 25%;
		}
	</style>
@if(Session::has('error'))

         {{ Session :: get('error') }}
    
    @endif
		<h1>Login</h1>
		@if (count($errors) > 0)
        <div class="alert alert-danger">
         <strong>Whoops!</strong> There were some problems with your input.<br><br>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif

		{{ Form::open(array('url'=>action('AuthController@login'),'method'=>'post')) }}
		{{ csrf_field() }}
	<center><div class="frm">
		<p>
            <label class="label"><B>Email-Id :</B></label>
            <input type="email" name="email" placeholder="Enter Email-Id" >
        </p>
		<p>
			<label class="label"><b>Password :</b></label>
			<input type="password" name="password" placeholder="Enter Password" > 
		</p>
		<p>
			<input type="submit" name="submit" value="Submit">
		</p>
	</div></center>


		{{ Form::close() }}
</body>
</html>