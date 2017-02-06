<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <title>Immoffice</title>
        <meta charset="utf-8">
           <meta name="author" content="">
        <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, corrupti, fugit, vero ipsum nobis esse asperiores eligendi quam rerum nisi nulla nemo quod! Iusto, incidunt repudiandae sed enim est recusandae." />
        <meta name="keywords" content="mot, mot, mot" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/global/css/screen.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" />
        <script src="<?php echo base_url(); ?>/assets/global/libs/modernizr.js"></script>
    </head>
	</head>
	<?php $this->load->view('common/header') ?>
	<?php $this->load->view($this->router->class.'/'.$this->router->method) ?>
		
   
    <?php $this->load->view('common/js') ?>
</html>