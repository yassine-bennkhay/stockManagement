<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?=PUBLICROOT?>./css/shop.css">

    <!-- StyleSheet -->
    <link rel="stylesheet" href="styles.css">

    <title><?php echo SHOPNAME?></title>
</head>

<body>

    <!-- Header -->

    <header class="header" id="header">
        <nav class="nav">
            <div class="nav__center container">
                <div class="logo">
                    <h1><?php echo SHOPNAME?></h1>
                </div>

                <div class="nav__menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#header" class="nav__link scroll-link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="#new" class="nav__link scroll-link">Shop Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="hero">
            <div class="hero__center container">
                <div class="hero__left">
                    <h1>All You Need in One!</h1>
                    <p>
                        We provide valuable products to our valuable clients!
                    </p>
                    <a href="#new" class="button hero__btn">Shop Now</a>
                </div>
            </div>

           
        </div>
    </header>

    <!-- New Products -->

    <main>
        <section class="section new" id="new">
            <div class="new__center container">
                <div class="title">
                    <h1>New Products</h1>
                </div>

                <div class="product__center">
                <?php foreach ($data['products'] as $product) : ?>
                    <div class="product">
                        <div class="product__header">
                            <img src="<?= PUBLICROOT . '/img/' . $product->image_url ?>" alt="">
                        </div>
                        <div class="product__footer">
                            <h2><?php echo $product->product_name ?></h2>
                            <div class="rating">
                            </div>
                            <h4 class="price"><?php echo $product->selling_price . '$' ?></h4>
                        </div>
                    </div>
                    <?php endforeach; ?>
               
        </section>
    
    </main>

    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer__top">
                <div class="footer-top__box">
                    <h3>INFORMATION</h3>
                    <a href="#">About Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Site Map</a>
                </div>
                <div class="footer-top__box">
                    <h3>MY ACCOUNT</h3>
                    <a href="#">My Account</a>
                    <a href="#">Order History</a>
                    <a href="#">Wish List</a>
                    <a href="#">Newsletter</a>
                    <a href="#">Returns</a>
                </div>
                <div class="footer-top__box">
                    <h3>CONTACT US</h3>
                    <div>
                        
                        43,Essalam, Safi,Morroco.
                    </div>
                    <div>
                        
                       stockmanagement@gmail.com
                    </div>
                    <div>
                     
                        0645645645
                    </div>
                    <div>
                      
                        Safi,Morocco
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>


   
</body>

</html>