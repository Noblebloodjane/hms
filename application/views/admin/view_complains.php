<div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('view_complains');?>

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box active" id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('name');?></div></th>
							<th><div><?php echo get_phrase('complaint');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
							<th><div><?php echo get_phrase('Profession');?></div></th>

                    		<th><div><?php echo get_phrase('staff');?></div></th>

                    		<th><div><?php echo get_phrase('staff id');?></div></th>
							

						</tr>

					</thead>

                    <tbody>

					<?php $count = 1; foreach($complaints as $row): ?>
    <tr>
        <td><?php echo $count++; ?></td>
        <td><?php echo $row['name']; ?></td>
		<td><?php echo $row['complaint']; ?></td>
        <td><?php echo $row['date_of_complaint']; ?></td>
        <td><?php echo $row['staff_profession']; ?></td>
        <td><?php echo $row['staff_reported']; ?></td>
        <td><?php echo $row['staff_id']; ?></td>
    </tr>
<?php endforeach; ?>
                    </tbody>

                </table>

			</div>

            <!----TABLE LISTING ENDS--->