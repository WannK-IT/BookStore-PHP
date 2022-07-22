<?php Session::init(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?= $this->_dirImg?>favicon.ico" type="image/x-icon"/>
    <?php echo $this->_metaHTTP; ?>
    <?php echo $this->_metaName; ?>
    <?php echo $this->_title; ?>
    <?php echo $this->_cssFiles; ?>
</head>

<body>
    <div class="loader_skeleton">
        <div class="typography_section">
            <div class="typography-box">
                <div class="typo-content loader-typo">
                    <div class="pre-loader"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- header start -->
    <?php require_once "html/header.php" ?>
    <!-- header end -->

    <?php
    require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
    ?>

    <!-- Footer -->
    <?php require_once "html/footer.php" ?>
    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->

    <!-- Script -->
    <?php echo $this->_jsFiles; ?>
    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
            document.getElementById("search-input").focus();
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
</body>

</html>