<?php
include_once 'app/views/share/header.php'
?>
<div class="row">
    <?php if (isset($errors)) {
        echo "<ul>";
        foreach ($errors as $err) {
            echo "<li class='text-danger'>$err</li>";
        }
        echo "</ul>";
    }
    ?>
    <form action="/chieu5/account/checklogin" method="post">
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control" name="email">
        </div>
       
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" class="form-control" name="password">
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php
include_once 'app/views/share/footer.php'
?>