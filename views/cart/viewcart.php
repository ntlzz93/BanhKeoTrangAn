<html>
    <?php include VIEWS_PATH . '/_layout/link.php'; ?>
    <body>
        <?php include VIEWS_PATH . '/_layout/header.php'; ?>

        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Trang chủ</a></li>
                        <li class="active">Giỏ hàng</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Sản phẩm</td>
                                <td class="description">Mô tả</td>
                                <td class="price">Đơn giá</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Thành tiền</td>
                                <td>Hành động</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $row) {
                                    $id = $row['id'];
                                    $productModel = new Product();
                                    $product = $productModel->selectByIDProduct($id);
                                    ?>
                                    <tr class="items">
                                        <td class="cart_product">
                                            <img  class="img-products" src="<?= ROOT_PATH ?>img/upload/<?= $product[0]['Image'] ?>" alt="<?= $product[0]['Name'] ?>">
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="#"><?= substr($product[0]['Description'], 0, 20) ?></a></h4>
                                            <p>Web ID: <?= rand(100, 10000) ?></p>
                                        </td>
                                        <td class="cart_price">
                                            <p><?= number_format($row['price'], 0) ?> VND</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <input class="cart_quantity_input" type="text" name="quantity" value="<?= $row['quantity'] ?>" autocomplete="off" size="2">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price"><?= number_format($row['price'] * $row['quantity'], 0) ?> VND</p>
                                        </td>
                                        <td class="cart_delete">
                                            <a type="button" onclick="return confirm('Bạn có muốn xoá sản phẩm này khỏi giỏ hàng?');" href="<?= ROOT_PATH ?>vn/cart/deletecart/viewcart/<?= $row['id']; ?>" title="Xoá" class="btn btn-danger btn-xs btn-delete">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6">
                        <div class="total_area">                   
                            <ul>

                                <li>Trước thuế <span><?= isset($_SESSION['price']) ? number_format($_SESSION['price'], 0) : "0" ?> VND</span></li>
                                <li>Thuế <span><?= isset($_SESSION['price']) ? number_format($tax = $_SESSION['price'] * 5 / 100, 0) : "0" ?> VND</span></li>
                                <li>Phí giao hàng <span>Miễn phí</span></li>
                                <li>Tổng <span><?php
                                        $tax = 0;
                                        if (isset($_SESSION['price'])) {
                                            $price = $_SESSION['price'];
                                            $tax = $_SESSION['price'] * 5 / 100;
                                        } else {
                                            $price = 0;
                                        }
                                        $total = $tax + $price;
                                        echo number_format($total, 0) . " VND";
                                        ?></span>
                                </li>

                            </ul>
                            <a class="btn btn-default check_out" href="<?= ROOT_PATH ?>vn/cart/checkout">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->   

        <?php include VIEWS_PATH . '/_layout/footer.php'; ?> 

        <script src="<?= WEBROOT_PATH ?>/js/jquery.js"></script>
        <script src="<?= WEBROOT_PATH ?>/js/bootstrap.min.js"></script>
        <script src="<?= WEBROOT_PATH ?>/js/jquery.scrollUp.min.js"></script>
        <script src="<?= WEBROOT_PATH ?>/js/price-range.js"></script>
        <script src="<?= WEBROOT_PATH ?>/js/jquery.prettyPhoto.js"></script>
        <script src="<?= WEBROOT_PATH ?>/js/main.js"></script>
        <script src="<?= WEBROOT_PATH ?>/js/main1.js"></script> <!-- Gem jQuery -->
    </body>
</html>
<style>
    #do_action{
        margin-bottom: -20px;
    }
    .items{
        max-height: 120px;
    }
    td.cart_product{
        width: 150px;
        height: 60px;
    }
    .cart_product img{
        width: 80px !important;
        height: 65px !important;
    }
    img.img-products{
       
    }

</style>