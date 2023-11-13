<style>
        /* Add CSS to make the textarea non-resizable and adjust its size */
        #complaint_text {
            resize: none;
            width: 400px; /* Set the width to your desired value, for example, 400px */
            height: 200px; /* Set the height to your desired value, for example, 200px */
        }
    </style>
<div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('appointment_list');?>

                    	</a></li>
						<li >

<a href="#make_appointment" data-toggle="tab"><i class="icon-align-justify"></i> 

	<?php echo get_phrase('make_appointment');?>

		</a></li>		

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('date');?></div></th>

                    		<th><div><?php echo get_phrase('doctor');?></div></th>

                    		<th><div><?php echo get_phrase('department');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php $count = 1;foreach($appointments as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo date('d M,Y', $row['appointment_timestamp']);?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>

							<td>

								<?php 

								$department_id	=	$this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'department_id');

								$department_name=	$this->crud_model->get_type_name_by_id('department',$department_id,'name');

								echo $department_name;

								?>

                            </td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

			</div>

            <!----TABLE LISTING ENDS--->

            

           <!----CREATION FORM STARTS---->

		   <div class="tab-pane box" id="make_appointment">
    <div class="box-content">
        <?php echo form_open('patient/request_appointment/', array('class' => 'form-horizontal validatable')); ?>
        <div class="padded">
            <div class="control-group">
                <label class="control-label"><?php echo get_phrase('date'); ?></label>
                <div class="controls">
                    <input type="text" class="datepicker fill-up" name="appointment_timestamp" />
                </div>
            </div>
            <div>
                <label for="complaint_text">Reason :</label>
                <textarea id="complaint_text" name="reason_text" placeholder="Enter your Reason"></textarea>
            </div>
            <div>
                <input type="hidden" name="reason_submitted" value="1">
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?php echo get_phrase('request_appointment'); ?></button>
        </div>
        <?php echo form_close(); ?>

        <?php
        // Display success message if available in session flashdata
        $success_message = $this->session->flashdata('success_message');
        if ($success_message) {
            echo '<div class="alert alert-success">' . $success_message . '</div>';
        }
        ?>
    </div>
</div>


<!----CREATION FORM ENDS--->



</div>

</div>

</div>