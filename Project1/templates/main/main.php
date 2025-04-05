<?php
    require dirname(__DIR__).'../header.php';
?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Text</th>
        <th scope="col">Author</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($articles as $article):?>
      <tr>
        <th scope="row"><?=$article->getId();?></th>
        <td><a href="<?=dirname($_SERVER['SCRIPT_NAME']).'/article/'.$article->getId();?>"><?=$article->getName();?></a></td>
        <td><?=$article->getText();?></td>
        <td><?=$article->getAuthor()->getNickname();?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>