<?php
	$system_name        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$system_title       =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
  $system_logo        = '<img src="'.base_url().'"uploads/logo.png"  style="max-height:60px;"/>';
	$text_align         =	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
	$account_type       =	$this->session->userdata('login_type');
	$skin_colour        =   $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description;
	$active_sms_service =   $this->db->get_where('settings' , array('type'=>'active_sms_service'))->row()->description;
	$running_year 		=   $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
?>

<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">
<head>
	<title>
        <?php echo $page_title;?> | <?php echo $system_title;?>
    </title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="BigBrosLab School ERP" />
	<meta name="author" content="BigBrosLab" />

	<?php include 'includes_top.php';?>

    <style type="text/css">
        <!--
        .style2 {color: #FF0000; font-size: 24px;}
        .style5 {color: #0066FF; font-size: 18px; }
        -->
    </style>

    <style type="text/css">
        #chart-container {
            width: 640px;
            height: auto;
        }
    </style>

</head>


<body class="page-body <?php if ($skin_colour != '') echo 'skin-' . $skin_colour;?>" >

	<div class="page-container <?php if ($text_align == 'right-to-left') echo 'right-sidebar';?>

		<?php if($page_name == 'student_bulk_add' || $page_name == 'attendance_report_view') echo 'sidebar-collapsed';?>" >

        <!-- side bar nav menu -->
        <?php include $account_type.'/navigation.php';?>
        <!-- end -->

	  <div class="main-content">
		
			<?php include 'header.php';?>

           <h3 style="">
           	<i class="entypo-right-circled"></i> 
				<?php echo $page_title;?>
           </h3>

               <p align="center">
                 <?php include $account_type.'/'.$page_name.'.php';?>
               </p>

               <p align="center">
                     <?php include 'footer.php';?>
               </p>

	  </div>

		<?php //include 'chat.php';?>
        	
	</div>
    <?php include 'modal.php';?>

    <?php include 'includes_bottom.php';?>


</body>
</html>