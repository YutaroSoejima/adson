<?php $this->load->view('header');?>

<div class="jumbotron">
	<div class="container">
		<h1>ログイン</h1>
    	<p>まだ登録がお済みでない方は、<a href="<?=site_url('user/register')?>">新規登録</a>をお願いします。</p>
    	<p>
    		パスワードを忘れてしまった方は、管理者：<a href="http://twitter.com/yutarosoejima" target="_blank">@yutarosoejima</a>までお知らせください。<br>
    		セキュリティの都合上、パスワードをお教えすることはできませんが、再発行には対応いたします。
    	</p>
	</div>
</div>

<div class="container">
	<?php echo validation_errors(); ?>
	
	<?=form_open("user/login");?>
		<div class="form-group">
		    <label for="email">メールアドレス</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレスを入力してください" value="<?php echo set_value('email'); ?>">
		</div>

		<div class="form-group">
		    <label for="password">パスワード</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="パスワードを入力してください" value="<?php echo set_value('password'); ?>">
		</div>

		<button type="submit" class="btn btn-lg btn-block btn-primary">ログインする</button>
	<?=form_close();?>
</div><!-- /content -->

<?php $this->load->view('footer');?>