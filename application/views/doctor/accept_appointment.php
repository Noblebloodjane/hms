<div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

                        <li>
    <a href="#app" data-toggle="tab">
        <i class="icon-check"></i>
        <?php echo get_phrase('accept_request');?>
    </a>
</li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>


            

			<!----CREATION FORM STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">
             <div class="box-content">
  <!-- Add this section inside your view file where you want to display the 'request_appointments' data -->
    <h4><?php echo get_phrase('request_appointments');?></h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo get_phrase('appointment_id');?></th>
                <th><?php echo get_phrase('appointment_timestamp');?></th>
                <th><?php echo get_phrase('Reason');?></th>
                <th><?php echo get_phrase('patient_name');?></th>
                <th><?php echo get_phrase('Accept');?></th>
                <th><?php echo get_phrase('Decline');?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($request_appointments as $appointment): ?>
                <tr>
                    <td><?php echo $appointment['appointment_id']; ?></td>
                    <td><?php echo $appointment['appointment_timestamp']; ?></td>
                    <td><?php echo $appointment['Reason']; ?></td>
                    <td><?php echo $this->crud_model->get_type_name_by_id('patient', $appointment['patient_id'], 'name'); ?></td>
                    <td><a href="<?php echo base_url('index.php?doctor/accept_appointment/accept/') . $appointment['appointment_id']; ?>" class="btn btn-danger"><?php echo get_phrase('Accept'); ?></a></td>
                    <td><a href="<?php echo base_url('index.php?doctor/accept_appointment/decline/') . $appointment['appointment_id']; ?>" class="btn btn-primary"><?php echo get_phrase('Decline'); ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


                </div>                

			</div>

			<!----CREATION FORM ENDS--->

      
<!----CREATION FORM ENDS--->

		</div>

	</div>

</div>