<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <?php echo $this->_metaHTTP; ?>
    <?php echo $this->_metaName; ?>
    <?php echo $this->_title; ?>
    <?php echo $this->_cssFiles; ?>
</head>

<body class="login-page bg-gradient-info" style="min-height: 466px;">
    <div class="login-box">
        <?php
        require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
        ?>
    </div>

    <?php echo $this->_jsFiles; ?>
</body>

</html>