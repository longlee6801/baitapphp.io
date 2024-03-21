<?php
 include_once('app/views/share/header.php')
 ?>
<div class="row">
<form action="/chieu5/product/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$product->id?>"/>
  <div class="form-group">
    <label for="name">Name </label>
    <input type="text" class="form-control" id="name" name="name" value="<?=$product->name?>">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="<?=$product->description?>"> <!-- Added name attribute -->
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" name="price" value="<?=$product->price?>"> <!-- Added name attribute -->
  </div>

  <div class="form-group">
    <label for="thumbnail">Thumbnail</label> <!-- Corrected the label spelling -->
    <img src="/chieu5/<?= $product->images ?>" alt="Current Thumbnail" style="max-width: 200px;"><br>
  </div>

  <br>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
 <?php
 include_once('app/views/share/footer.php')
 ?>
