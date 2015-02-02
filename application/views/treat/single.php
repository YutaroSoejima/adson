<?php $this->load->view("header"); ?>

<div class="container" id="single">
	<div class="jumbotron">
		<p class="text-right"><span class="label label-danger">人事の奢り</span></p>

	    <h1><?=$treat_proposal->title;?></h1>

	    <p><span class="label label-info"><?=$this->common_model->get_column('name', $treat_proposal->food_id, 'foods');?></span></p>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> どんな人にごはんを奢りたいか？</h2>
				</div>
				<div class="panel-body">
					<p><?=nl2br($treat_proposal->content);?></p>
				</div>
			</div>

			<ul class="nav nav-tabs">
			  <li class="active"><a href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 担当の人事さん</a></li>
			  <li><a href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> 法人紹介</a></li>
			</ul>

			<div class="tab-content">
			  <div class="tab-pane active" id="tab1">
			  	<div class="panel panel-default panel-connect">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-3">
								<div class="prof_img">
									<img src='<?=site_url("images/$client_member->img_name")?>' alt="<?=$client_member->name;?>">
								</div>
							</div>
							<div class="col-xs-9">
								<h3 class="mt0"><?=$client_member->name;?><small> @ <?=$client->name;?></small></h3>
								<p><?=nl2br($client_member->introduction);?></p>
							</div>
						</div>
					</div>
				</div>
			  </div>

			  <div class="tab-pane" id="tab2">
			  		<div class="panel panel-default  panel-connect">
						<div class="panel-body">
							<h3><?=$client->name;?></h3>
							<p><?=nl2br($client->introduction);?></p>
						</div>
					</div>
			  </div>
			</div>

			<a class="btn btn-primary btn-lg btn-block hidden-xs" href='<?=site_url("treat/entry/$treat_proposal->id")?>'>「奢って！」とお願いする</a>
		</div>

		<div class="col-sm-4">
		    <a class="btn btn-primary btn-lg btn-block mb20 hidden-xs" href='<?=site_url("treat/entry/$treat_proposal->id")?>'>「奢って！」とお願いする</a>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> エントリーの手順</h2>
				</div>
				<div class="panel-body">
					<ol>
						<li>【「奢って！」とお願いする】ボタンをクリックしてエントリー</li>
						<li>あとは待つだけ！<br>【<?=$client->name?>】の【<?=$client_member->name;?>】さんが話したいと思った場合、登録のメールアドレスにメールが来ます！</li>
					</ol>
				</div>
			</div>

			<a class="btn btn-primary btn-lg btn-block hidden-sm hidden-md hidden-lg" href='<?=site_url("treat/entry/$treat_proposal->id")?>'>「奢って！」とお願いする</a>
		</div>
	</div>
</div>

<?php $this->load->view("footer"); ?>