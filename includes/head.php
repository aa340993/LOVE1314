<?php

/**
 * Cupid - 为爱而来
 * @package     Typecho-Theme-Cupid
 * @author      Veen Zhao
 * @version     1.0
 * @link       https://blog.zwying.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $banner = '';
    $description = '';
    if ($this->is('post') || $this->is('page')) {
        if (isset($this->fields->banner))
            $banner = $this->fields->banner;
        if (isset($this->fields->excerpt))
            $description = $this->fields->excerpt;
    } else {
        $description = Helper::options()->description;
    }
    ?>
    <title><?php Contents::title($this); ?></title>
    <meta name="author" content="<?php $this->author(); ?>" />
    <meta name="description" content="<?php if ($description != '') echo $description;
                                        else $this->excerpt(50); ?>" />
    <meta property="og:title" content="<?php Contents::title($this); ?>" />
    <meta property="og:description" content="<?php if ($description != '') echo $description;
                                                else $this->excerpt(50); ?>" />
    <meta property="og:site_name" content="<?php Helper::options()->title(); ?>" />
    <meta property="og:type" content="<?php if ($this->is('post') || $this->is('page')) echo 'article';
                                        else echo 'website'; ?>" />
    <meta property="og:url" content="<?php $this->permalink(); ?>" />
    <meta property="og:image" content="<?php echo $banner; ?>" />
    <meta property="article:published_time" content="<?php echo date('c', $this->created); ?>" />
    <meta property="article:modified_time" content="<?php echo date('c', $this->modified); ?>" />
    <meta name="twitter:title" content="<?php Contents::title($this); ?>" />
    <meta name="twitter:description" content="<?php if ($description != '') echo $description;
                                                else $this->excerpt(50); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:image" content="<?php echo $banner; ?>" />
    <?php $this->header('description=&'); ?>
    <link rel="shortcut icon" href="<?php if ($this->options->favicon) : $this->options->favicon();
                                    else : $this->options->themeUrl('/favicon.ico');
                                    endif; ?>">
    <link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
    <link href="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.loli.net/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>