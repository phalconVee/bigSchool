<?php
$system_name   = $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
$system_title  = $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
?>

<!-- Footer -->
<footer class="main">
	&copy; <?=date('Y');?> <strong><?php echo $system_name;  ?> </strong>
	Powered by <a href="http://bigbroslab.com"
    	target="_blank">BigBrosLab</a>
</footer>
