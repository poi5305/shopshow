<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">ShopShow</a></h1>
	</div>
	<div id="menu">
		<ul>
			<li><a href="/" accesskey="1" title="">Home</a></li>
			<?php if(isset($_SESSION) && isset($_SESSION["user_type"]) && $_SESSION["user_type"]==0) { ?>
				<li><a href="/admin" accesskey="4" title="">管理系統</a></li>
			<?php } else { ?>
				<li><a href="/record" accesskey="4" title="">購買記錄</a></li>
			<?php } ?>
			
			<li><a href="/member" accesskey="4" title="">會員中心</a></li>
			<?php if(isset($_SESSION) && isset($_SESSION["user_account"])) { ?>
				<li><a href="/member/logout" accesskey="2" title="">登出</a></li>
			<?php } else { ?>
				<li><a href="/member/login" accesskey="2" title="">登入</a></li>
			<?php } ?>
		</ul>
	</div>
</div>