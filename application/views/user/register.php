<?php $this->load->view('header');?>

<div class="jumbotron">
	<div class="container">
		<h1>新規会員登録</h1>
    	<p>無料で<?=$this->config->item('site_name')?>に登録しよう！</p>
    	<p>登録がお済みの方は、<a href="<?=site_url('user/login')?>">ログイン</a>をお願いします。</p>
	</div>
</div>

<div class="container">
	<?php echo validation_errors(); ?>
	
	<?=form_open("user/register");?>
		<div class="form-group">
		    <label for="name">名前</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="例）山田太郎" value="<?php echo set_value('name'); ?>">
		</div>

		<div class="form-group">
		    <label for="email">メールアドレス</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレスを入力してください" value="<?php echo set_value('email'); ?>">
		</div>

		<div class="form-group">
		    <label for="password">パスワード</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="パスワードを入力してください" value="<?php echo set_value('password'); ?>">
		</div>

		<div class="form-group">
		    <label for="school">学校</label>
		    <select class="form-control" id="school" name="school">
		    	<option value="">選択してください</option>
		    	<?php foreach ($schools as $school): ?>
		    		<option value="<?=$school->id?>" <?php echo set_select('school', $school->id); ?>><?=$school->name?></option>
		    	<?php endforeach;?>
		    </select>
		</div>

		<div class="form-group">
		    <label for="graduation_year">卒業年度</label>
		    <select class="form-control" id="graduation_year" name="graduation_year">
		    	<option value="">選択してください</option>
		    	<?php foreach ($graduation_years as $year): ?>
		    		<option value="<?=$year?>" <?php echo set_select('graduation_year', $year); ?>><?=$year?>年</option>
		    	<?php endforeach;?>
		    </select>
		</div>

		<button type="submit" class="btn btn-default btn-block btn-primary">上記の内容で登録する</button>
	<?=form_close();?>
</div><!-- /content -->

<?php $this->load->view('footer');?>