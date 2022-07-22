<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->_metaHTTP; ?>
    <?= $this->_metaName; ?>
    <?= $this->_title; ?>
    <link rel="shortcut icon" href="<?= $this->_dirImg ?>favicon.ico" type="image/x-icon" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3c50210ea0.js" crossorigin="anonymous"></script>
    <?= $this->_cssFiles; ?>

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
    <!-- footer -->
    <?php require_once "html/footer.php" ?>

    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->

    <!-- Script -->
    <?= $this->_jsFiles ?>

    <script>
        $(document).ready(function() {
            $('#cart-summary').text(<?= count($_SESSION['cart']['quantity']) ?>);
        })

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