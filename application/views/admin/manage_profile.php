<div class="box" style="border-radius: 20px">

	<div class="box-header" style="border-radius: 20px">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					Manage Profile

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content" style="border-radius: 20px">

        	<!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="list" style="padding: 5px; border-radius: 20px;">

                <div class="box-content padded">

					<?php 

                    foreach($edit_profile as $row):

                        ?>

                        <?php echo form_open('admin/manage_profile/update_profile_info/' , array('class' => 'form-horizontal validatable'));?>

                                <div class="control-group">

                                    <label class="control-label">Name</label>

                                    <div class="controls">

                                        <input style="border-radius:20px; width: 50%" type="text" class="" name="name" value="<?php echo $row['name'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">Email</label>

                                    <div class="controls">

                                        <input style="border-radius:20px; width: 50%" type="text" class="" name="email" value="<?php echo $row['email'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">Address</label>

                                    <div class="controls">

                                        <input style="border-radius:20px; width: 50%" type="text" class="" name="address" value="<?php echo $row['address'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">Phone</label>

                                    <div class="controls">

                                        <input style="border-radius:20px; width: 50%" type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>

                                    </div>

                                </div>

                                <div class="form-actions" >

                            		<button type="submit" class="btn" style="background-color:#079c1c;border: 2px solid #079c1c;border-radius:20px;" ><?php echo get_phrase('update_profile');?></button>

                        		</div>

                        <?php echo form_close();?>

						<?php

                    endforeach;

                    ?>

                </div>

			</div>

            <!----EDITING FORM ENDS--->

            

		</div>

	</div>

</div>





<!--password-->

<div class="box" style="border-radius: 20px">

	<div class="box-header" style="border-radius: 20px">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-lock"></i> 

					Change Password

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content" style="border-radius: 20px">

        	<!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="list" style="padding: 5px; border-radius: 20px">

                <div class="box-content padded">

					<?php 

                    foreach($edit_profile as $row):

                        ?>

                        <?php echo form_open('admin/manage_profile/change_password/' , array('class' => 'form-horizontal validatable'));?>

                                <div class="control-group">

                                    <label class="control-label">Password</label>

                                    <div class="controls">

                                        <input style="border-radius:20px; width: 50%" type="password" class="" name="password" value=""/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">New Password</label>

                                    <div class="controls">

                                        <input style="border-radius:20px; width: 50%" type="password" class="" name="new_password" value=""/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">Confirm New Password</label>

                                    <div class="controls">

                                        <input style="border-radius:20px; width: 50%" type="password" class="" name="confirm_new_password" value=""/>

                                    </div>

                                </div>

                                <div class="form-actions">

                            		<button type="submit" class="btn" style="background-color:#079c1c;border: 2px solid #079c1c;border-radius:20px" ><?php echo get_phrase('update_password');?></button>

                        		</div>

                        <?php echo form_close();?>

						<?php

                    endforeach;

                    ?>

                </div>

			</div>

            <!----EDITING FORM ENDS--->

            

		</div>

	</div>

</div>