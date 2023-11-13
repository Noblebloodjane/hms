<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>

        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

		<?php include 'includes.php';?>

        <title><?php echo get_phrase('login');?> | <?php echo $system_title;?></title>

  
    </head>

	<body>

		<?php if($this->session->flashdata('flash_message') != ""):?>

 		<script>

			$(document).ready(function() {

				Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>",text:" "})

			});

		</script>

        <?php endif;?>

        

        <div class="container" style="margin-top: 20px">

            <div class="span4 offset4">

                <div class="padded">

                    <center>

                            <img src="template/images/zone.jpg" alt="Hospital Management System Image" class="hms-img">

                    </center>
                    

                    <div class="login box" style="margin-top: 10px;">

                        <div class="log-heading">

                            <span class="title">Login</span>

                        </div>

                        <div class="box-content padded">

                        <i class="m-icon-swapright m-icon-white"></i>

                        	<?php echo form_open('login' , array('class' => 'separate-sections'));?>

                                <div class="">

                                    

                                    <select class="validate[required]" name="login_type" style="width:100%; border-radius: 20px;">

                                        <option value=""><?php echo get_phrase('account_type');?></option>

                                        <option value="admin"><?php echo get_phrase('admin');?></option>

                                        <option value="doctor"><?php echo get_phrase('doctor');?></option>

                                        <option value="patient"><?php echo get_phrase('patient');?></option>

                                        <option value="nurse"><?php echo get_phrase('nurse');?></option>

                                        <option value="pharmacist"><?php echo get_phrase('pharmacist');?></option>

                                        <option value="laboratorist"><?php echo get_phrase('laboratorist');?></option>

                                        <option value="accountant"><?php echo get_phrase('accountant');?></option>

                                    </select>

    

                                </div>

                                <div class="input-prepend" >

                                    <span class="add-on" href="#" style="border-radius: 20px;">

                                    <i class="icon-envelope"></i>

                                    </span>

                                    <input name="email" type="text" placeholder="<?php echo get_phrase('email');?>" style="border-radius: 20px;">

                                </div>

                                <div class="input-prepend" >

                                    <span class="add-on" href="#" style="border-radius: 20px;">

                                    <i class="icon-key"></i>

                                    </span>

                                    <input name="password" type="password" placeholder="<?php echo get_phrase('password');?> " style="border-radius: 20px;">

                                </div>

                                <div>

                                    <button type="submit" class="btn btn-blue btn-block"style="background-color: #079c1c;border: solid #079c1c; border-radius:20px;" >

                                        <span style="font-size: 12px"><?php echo get_phrase('login');?></span>

                                    </button>

                                </div>

                            <?php echo form_close();?>

                            <div>

                                <a  data-toggle="modal" href="#modal-simple">

                                    <?php echo get_phrase('forgot_password?');?>

                                </a>

                            </div>

                        </div>

                    </div>

                    

                </div>

            </div>

        </div>

        

        

        <!-----------password reset form ------>

        <div id="modal-simple" class="modal hide fade" style="border-radius: 20px" >

          <div class="modal-header" style="border-radius: 20px">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 id="modal-tablesLabel" style="color: #079c1c">Reset Password</h4>

          </div>

          <div class="modal-body" style="border-radius: 20px">

            <?php echo form_open('login/reset_password');?>

            	<select class="validate[required]" name="account_type"  style="margin-bottom: 0px !important; border-radius: 20px;padding-right: 10px;padding-left: 10px;">

                    <option value=""><?php echo get_phrase('account_type');?></option>

                    <option value="admin"><?php echo get_phrase('admin');?></option>

                    <option value="doctor"><?php echo get_phrase('doctor');?></option>

                    <option value="patient"><?php echo get_phrase('patient');?></option>

                    <option value="nurse"><?php echo get_phrase('nurse');?></option>

                    <option value="pharmacist"><?php echo get_phrase('pharmacist');?></option>

                    <option value="laboratorist"><?php echo get_phrase('laboratorist');?></option>

                    <option value="accountant"><?php echo get_phrase('accountant');?></option>

                </select>

                <input type="email" name="email"  placeholder="<?php echo get_phrase('email');?>"  style="margin-bottom: 0px !important; border-radius: 20px; padding-right: 10px;padding-left: 10px;"/>

                <input type="submit" value="<?php echo get_phrase('reset');?>"  class="btn btn-blue btn-medium" style="background-color:#079c1c;border: 1px solid #079c1c; border-radius: 20px"/>

            <?php echo form_close();?>

          </div>

          <div class="modal-footer" style="border-radius: 20px">

            <button class="btn btn-default" style="border-radius: 20px" data-dismiss="modal">Close</button>

          </div>

        </div>

        <!-----------password reset form ------>

        
        

	</body>

</html>