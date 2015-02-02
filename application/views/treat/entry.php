<?php $this->load->view("header"); ?>

<div class="container" id="single">
	<div class="jumbotron">
	    <h1>奢りをお願いする</h1>
	    <p>
	    	【<?=$this->common_model->get_column("name", $treat_proposal->client_id, "clients")?>】の【<?=$this->common_model->get_column("name", $treat_proposal->client_member_id, "client_members")?>】さんが話したいと思った場合、
	    	登録のメールアドレスにメールが来ます！<br>
	    	コメント欄を埋めて、存分に自分をアピールしよう！
	</div>

	<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">エントリーする奢り</h2>
				</div>
				<div class="panel-body">
					<h3>タイトル</h3>
					<h4><a href='<?=site_url("t/$treat_proposal->id")?>'><?=$treat_proposal->title?></a></h4>
					
					<h3>担当者</h3>
					<h4><?=$this->common_model->get_column("name", $treat_proposal->client_member_id, "client_members")?></h4>
				</div>
			</div>
	
	<?=form_open("treat/entry/$treat_proposal->id");?>
		<?php echo validation_errors(); ?>

		<?=form_hidden('treat_id', $treat_proposal->id);?>

		<div class="form-group">
		    <label for="comment">コメント<span class="label label-info">任意</span></label>
		    <textarea type="password" class="form-control" id="comment" name="comment" rows="6" placeholder="意気込みや自己アピールなどをご自由にどうぞ！"><?=set_value('comment')?></textarea>
		</div>

		<button type="submit" class="btn btn-lg btn-block btn-primary">上記の内容でお願いする</button>
	<?=form_close();?>
</div>

<?php $this->load->view("footer"); ?>