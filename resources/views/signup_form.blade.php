<h2>Registration Form</h2>

@if( count ($errors)>0)


        @foreach($errors->all() as $error)
            *  {{$error}}<br>
        @endforeach

    @endif

    

    @if(Session::has('error'))

         Error in Submission
    
    @endif
    
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

{{Form::open(array('url'=>'signme','method'=>'post'))}}
            <p>
                <label class="label">User Name :</label>
                <input type="text" name="name" placeholder="Enter User Name" >
            </p>
            <p>
                <label class="label">Email-Id :</label>
                <input type="email" name="email" placeholder="Enter Email-Id" >
            </p>
            <p>
                <label class="label">Password :</label>
                <input type="password" name="password" placeholder="Enter Password" > 
            </p>
            <p>
                <label class="label">Confirm Password :</label>
                <input type="password" name="rpassword" placeholder="Enter Confirm Password"> 
            </p>
            <p>
                <input type="submit" name="submit" value="Submit" style="margin-left: 10%; color: #fff; background-color: #5555ff; padding: 10px; border-radius: 25px; ">
            </p>
            @if(Session::has('success'))

            Signed Up Successfully
            {{ session()-> get('success')}}

            @endif


{{Form::close()}}