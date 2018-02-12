<h2>Registration Form</h2>

<?php if( count ($errors)>0): ?>


        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            *  <?php echo e($error); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>

    

    <?php if(Session::has('error')): ?>

         Error in Submission
    
    <?php endif; ?>
    
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

<?php echo e(Form::open(array('url'=>'signme','method'=>'post'))); ?>

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
            <?php if(Session::has('success')): ?>

            Signed Up Successfully
            <?php echo e(session()-> get('success')); ?>


            <?php endif; ?>


<?php echo e(Form::close()); ?>