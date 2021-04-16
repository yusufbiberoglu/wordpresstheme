<?php 

/*
*
* 404 bulunamadı sayfası
*
*/


get_header();

?>


<div class="text-center btn-danger">
		<h1>OOOOPSS</h2>
	<h3>404 HATA</h3>
	<div><?php get_search_form(); ?></div>
	<p><a href="<?php echo home_url(); ?>">Anasayfa</a></p>

</div>


<?php get_footer(); ?>