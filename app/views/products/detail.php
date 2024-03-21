
<?php
include_once 'app/views/share/header.php'
?>

<div class="row">
    <img src="/chieu5/<?= $product->thumnail; ?>" class="card-img-top" style="width:20vh" alt="...">
    <h5 class="card-title"><?= $product->name ?></h5>
    <p class="card-text"><?= $product->description ?></p>
    <p class="card-text">Giá: <?= $product->price ?></p>
    <a href="/chieu5/product/edit/<?= $product->id ?>" class="btn btn-primary">sửa</a>| 
    <form action="/chieu5/product/delete/<?=$row['id']?>" method="post" style="display: inline;">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc sẽ xóa sản phẩm này không?')">Xoa</button>
                    </form>
</div>

<?php
include_once 'app/views/share/footer.php'
?>
