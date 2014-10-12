
<!--<script src="js/facebook.js"></script>-->

<div id="page-wrapper">
	<div id="page" class="container">
	<?php if($pre_page_data) { ?> <div class="page_message"><?php echo $this->utility->message($pre_page_data); ?></div> <?php } ?>
	
		<div class="page_block_4">
			<h1>管理系統</h1>
			<div class="menu_selector">
				<div class="menu_item"><a href="/admin/banner">上傳封面</a></div>
				<div class="menu_item"><a href="/admin/bulletin">賣場公告</a></div>
				<div class="menu_item"><a href="/admin/new_page">新增頁面</a></div>
				<div class="menu_item"><a href="/admin/pages">頁面管理</a></div>
				<div class="menu_item"><a href="/admin/new_good">新增商品</a></div>
				<div class="menu_item"><a href="/admin/goods">瀏覽商品</a></div>
				<div class="menu_item"><a href="/admin/record">購買記錄</a></div>
				<div class="menu_item"><a href="/admin/member">瀏覽會員</a></div>
			</div>
		</div>
		<?php
			$this->load->view($this->config->item('template') . "/$view_admin[0]", $view_admin[1]);
		?>
		
		<!--
		<div class="page_block">
		<form method="POST" action="/admin/update">
			<textarea name="content" id="content" rows="10" cols="80"></textarea>
			<script>
                CKEDITOR.replace( 'content' );
            </script>
		</form>
		</div>
		-->
</div>