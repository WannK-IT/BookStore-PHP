<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3><?= $this->countGroup['totalGroup'] ?></h3>
                    <p>Group</p>
                </div>
                <div class="icon text-white">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="<?= URL::createLink($this->arrParam['module'], 'group', 'index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3><?= $this->countUser['totalUser'] ?></h3>
                    <p>User</p>
                </div>
                <div class="icon text-white">
                    <i class="ion ion-ios-person"></i>
                </div>
                <a href="<?= URL::createLink($this->arrParam['module'], 'user', 'index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3><?= $this->countCategory['totalCategory'] ?></h3>
                    <p>Category</p>
                </div>
                <div class="icon text-white">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a href="<?= URL::createLink($this->arrParam['module'], 'category', 'index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3><?= $this->countBook['totalBook'] ?></h3>
                    <p>Book</p>
                </div>
                <div class="icon text-white">
                    <i class="ion ion-ios-book"></i>
                </div>
                <a href="<?= URL::createLink($this->arrParam['module'], 'book', 'index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>