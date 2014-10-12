
<!--<script src="js/facebook.js"></script>-->

<div id="page-wrapper">
	<div id="page" class="container">
	<?php if($pre_page_data) { ?> <div class="page_message"><?php echo $this->utility->message($pre_page_data); ?></div> <?php } ?>
	<form method="POST" action="/member/update">
		<div class="page_block_4">
		<!--
			<h1>會員中心</h1>
			<div class="menu_selector">
				<div class="menu_item"><a href="/member">修改會員資料</a></div>
			<?php if($user["user_type"] == 0) { ?>
				<div class="menu_item"><a href="/member/">網站設定</a></div>
				<div class="menu_item"><a href="/member/">網站設定</a></div>
			<?php } ?>
			</div>
		-->
		</div>
		<div class="page_block_3">
			<h1>會員資料</h1>
			<div class="member_info_item">
				<div class="item_name">認證模式：</div>
				<span class="item_value"><?php echo $user["account_type"]==0?"普通":"Facebook"; ?></span>
			</div>
			<div class="member_info_item">
				<div class="item_name">帳號：</div>
				<span class="item_value"><?php echo $user["account"]; ?></span>
			</div>
			<div class="member_info_item">
				<div class="item_name">Email：</div>
				<input class="item_value" type="text" id="email" name="email" value="<?php echo $user["email"]; ?>" />
			</div>
			<div class="member_info_item">
				<div class="item_name">常用姓名：</div>
				<input class="item_value" type="text" id="name1" name="name1" value="<?php echo $user["name1"]; ?>" />
			</div>
			<div class="member_info_item">
				<div class="item_name">常用電話：</div>
				<input class="item_value" type="text" id="telephone1" name="telephone1" value="<?php echo $user["telephone1"]; ?>" />
			</div>
			<div class="member_info_item">
				<div class="item_name">常用郵遞區號：</div>
				<input class="item_value" type="text" id="region1" name="region1" value="<?php echo $user["region1"]; ?>" />
			</div>
			<div class="member_info_item">
				<div class="item_name">常用地址：</div>
				<input class="item_value" type="text" id="address1" name="address1" value="<?php echo $user["address1"]; ?>" />
			</div>
		</div>
		
		<div class="page_block_3">
		<?php if($user["account_type"] == 0) { ?>
			<h1>修改密碼</h1>
			<div class="member_info_item">
				<div class="item_name">輸入舊密碼：</div>
				<input class="item_value" type="text" id="o_passwd" name="o_passwd" value="" />
			</div>
			<div class="member_info_item">
				<div class="item_name">輸入新密碼：</div>
				<input class="item_value" type="text" id="n1_passwd" name="n1_passwd" value="" />
			</div>
			<div class="member_info_item">
				<div class="item_name">新密碼確認：</div>
				<input class="item_value" type="text" id="n2_passwd" name="n2_passwd" value="" />
			</div>
		<?php } ?>
		</div>
		<div class="page_block_4"></div>
		<div class="page_block_3">
			<div class="member_info_item">
				<div class="item_name"><input type="submit" name="submit" value="儲存變更" /></div>
			</div>
		</div>
	</form>
</div>