<form method="get" id="searchform" action="<?php echo esc_url(home_url()); ?>/">
	<input type="text" placeholder="Search..."  name="s" id="s" onfocus="if(this.value == 'Search') {this.value = '';}"
	onblur="if(this.value == '') {this.value = 'Search';}"/>
	<input type="submit" id="searchsubmit" value="gönder"/>
</form>