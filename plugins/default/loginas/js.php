$(document).ready(function(){
			$user = '<a class="label label-danger" href="<?php echo ossn_loggedin_user()->profileURL();?>"><?php echo ossn_loggedin_user()->fullname;?></a>';
			$back = '<a href="<?php echo ossn_site_url("action/loginas/back", true);?>" class="btn btn-sm btn-danger"><?php echo ossn_print('loginas:back');?></a>';
			$html = "<div class='alert alert-danger loginas'><p>"+Ossn.Print('loginas:text', [$user, $back])+"</p></div>";
            $('body').prepend($html);
});