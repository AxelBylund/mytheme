<head>
    <meta charset="utf-8">
    <title>
        <?php wp_title('|',1,'right'); ?>
            <?php bloginfo('name'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_enqueue_script("jquery"); ?>
        <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
                <a class="brand" href="<?php echo site_url(); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <?php wp_list_pages(array('title_li' => '', 'exclude' => 4)); ?>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <?php if(!is_front_page()):?>
        <div class="container">
            <?php endif;?>