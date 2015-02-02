<?php $this->load->view('header');?>

<div class="jumbotron">
  <div class="container">
    <h1 class="hidden-xs"><?=$this->config->item('site_name')?></h1>
    <p>
      ベンチャーでのガッツリ勤務から、大企業のインターンシップ、NPOでのボランティアまで、<br>様々な法人の、様々な案件が探せます！
    </p>
    <p>
      そのついでに、人事さんが学生の皆さんにごはんをごちそうしてくれます。<br>
      興味のある企業や人事さんを見つけて、「奢って！」ボタンを押してみましょう！<br>
      ごはんが食べれて、いっしょにチャンスも掴めるかもしれません。
    </p>
    <p>
        ただいま、関関同立、産近甲龍、京阪神、府大市大の計１３校の学生を対象にβテスト中です。
    </p>
    <div class="text-right">
      <a class="btn btn-success btn-lg" href="<?=site_url('treat')?>" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 奢りをさがす</a>
    </div>
  </div>
</div>

<div class="container">
  <h2><span class="glyphicon glyphicon-glass"></span> おすすめの奢り</h2>

  <div class="list-group">
    	<?php foreach ($treat_proposals as $row):?>
  	    <a href='<?=site_url("t/$row->id")?>' class="list-group-item">
          <h3 class="list-group-item-heading overflow-dotted"><?=$row->title?></h3>
          <p><?=$this->common_model->get_column("name", $row->client_id, "clients")?></p>
    	    <p class="list-group-item-text overflow-dotted"><?=$row->content?></p>
    	  </a>
  	  <?php endforeach;?>
  </div>

  <a class="btn btn-primary btn-lg btn-block" href="<?=site_url('treat')?>">人事の奢りをもっとみる</a>
</div><!-- /.container -->

<?php $this->load->view('footer');?>