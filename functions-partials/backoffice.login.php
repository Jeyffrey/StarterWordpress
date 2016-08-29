<?php function my_login_logo() { ?>
    <?php $logo = '/assets/img/logo.png'; ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            height: 150px;
            width: 100%;
            background-image: url( <?= get_stylesheet_directory_uri() . $logo; ?> );
            background-size: auto 100%;
            margin-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
