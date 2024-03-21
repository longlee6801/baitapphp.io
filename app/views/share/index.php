
<?php
include_once 'app/views/share/header.php'
?>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Sản phẩm 1 -->
    <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="col">
            <div class="card">
            <a href="/chieu5/product/detail/<?=$row['id']?>">
                <img src="<?=$row['thumnail'];?>" class="card-img-top" alt="...">
            </a>
                <div class="card-body">
                    <h5 class="card-title"><?= $row['name'] ?></h5>
                    <p class="card-text"><?= $row['description'] ?></p>
                    <p class="card-text"><?= $row['price'] ?></p>
                    <a href="#" class="btn btn-primary">Mua Ngay</a>
                    <a href="/chieu5/product/edit/<?=$row['id']?>" class="btn btn-warning">Sửa</a>
                    <form action="/chieu5/product/delete/<?=$row['id']?>" method="post" style="display: inline;">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc sẽ xóa sản phẩm này?')">Xóa</button>
                    </form>
                </div>
                
            </div>
        </div>
    <?php endwhile; ?>
</div>


<?php
include_once 'app/views/share/footer.php'
?>
