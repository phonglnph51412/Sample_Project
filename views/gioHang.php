<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./public/css/indexx.css">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <nav class="menu">
                <ul>
                    <li><a href="http://localhost/du_an_mau/">Trang chủ</a></li>
                    <li><a href="index.php?action=cart">Giỏ hàng
                        <?php
                        $cartItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                        if ($cartItemCount > 0) {
                            echo '(' . $cartItemCount . ')';
                        }
                        ?>
                    </a></li>
                    <li><a href="dangKy.html">Đăng ký</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main Content -->
        <div class="main-content">
            <div class="cart-section">
                <h2>Giỏ hàng</h2>
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <h3><?php echo $item['name']; ?></h3>
                        <p class="product-price"><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</p>
                        <p>Số lượng: <?php echo $item['quantity']; ?></p>
                        <form method="post" action="index.php?action=removeFromCart">
                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                            <button type="submit">Xóa</button>
                        </form>
                    </div>
                <?php endforeach; ?>
                <div class="cart-total">
                    <h3>Tổng tiền: <?php echo calculateCartTotal($cartItems); ?> VNĐ</h3>
                </div>
                <div class="cart-actions">
                    <form method="post" action="index.php?action=clearCart">
                        <button type="submit">Xóa giỏ hàng</button>
                    </form>
                    <a href="index.php" class="btn-continue">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <p>&copy; 2024 My project.</p>
            </div>
        </footer>
    </div>
</body>

</html>

<?php

function calculateCartTotal($cartItems) {
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return number_format($total, 0, ',', '.');
}

?>
