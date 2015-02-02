<?php $this->load->view("header"); ?>

<div class="container">
	<div class="jumbotron">
	    <h1><?=$org->name;?></h1>

	    <p><?=$org->description;?></p>
	</div>

	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">会社概要</h2>
		</div>
		<div class="panel-body">
			<?=nl2br($org->content);?>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">開催するレクチャー</h2>
		</div>
		<div class="panel-body">
				<?php foreach ($lectures as $row):?>
					    <h3><a href="<?=site_url("lecture/$row->id")?>"><?=$row->title?></a></h3>
					    <p><?=$row->description?></p>
				<?php endforeach;?>
		</div>
	</div>
</div>

<?php $this->load->view("footer"); ?>