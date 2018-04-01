<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Dashboard heading</h4>
	</div>
	<div class="panel-body">
		<?php
		if (isset($launcher)) {
			foreach ($launcher as $key => $value) { ?>
			<div class="col-xs-12">
				<a href="<?php echo $value['url'];?>">
					<div class="card" style=" margin-right: 10px; ">
						<div class="card-body text-center" style="padding: 25px;">
							<i style="font-size: 24px;" class="<?php echo $value['icon'];?>">
							</i>
							<br/>
							<strong>
								<?php echo $value['label'];?>
							</strong>
						</div>
					</div>
				</a>
			</div>
			<?php	
		}
	}else{ ?>

	<?php	} ?>	
	<h2>
		Hai <?php echo (isset($username))? ucwords($username) : 'dude';?> !, 
		<small>
			Congratulation u already signed in dashboard panel.
		</small>
	</h2>	
	<h3>How to use it?</h3>
	<ol>
		<li>
			Create controller with prefix <code>App_</code> , for example 
			<code>App_order.php</code>
		</li>
		<li>
			<?php echo anchor('permission/','Set permission');?> if u is administrator. in controller <code>Permission</code>
		</li>
		<li>
			After set permission the launcher will be appear in this page
		</li>
		<li>
			If u really don't understand :v , just <a href="mailto:firmawaneiwan@gmail.com">mail me</a> or create issue in <a href="https://github.com/ifirmawan/ciapakai">my repository github</a>
		</li>
	</ol>
</div>

</div>