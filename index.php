<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AppController {
	public function __construct() {
		parent::__construct();

        session_start();

	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<div class="container">

    <div class="overlay">
        <?php echo $login; ?>
        <?php echo $register; ?>
    </div>
    <div class="row">

        <?php echo $list_menu; ?>

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="user_upload/M_DSC3118_bw_sm-800x300.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="user_upload/dreamstime_s_29457499-800x300.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="user_upload/velcro-baby-800x300.jpg" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="row">


                <?php  

                // Write SQL Statement
                $sql = "
                  SELECT * FROM product
                  ";

                // Execute SQL Statement
                $results = db::execute($sql);

                while ($row = $results->fetch_assoc()) {

                $path_parts = pathinfo($row['name']);

                ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo 'user_upload/products/' . $row['name']; ?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo '$' . $row['price']; ?></h4>
                                <h4>
                                    <a href="detail_page.php?product_id=<?php echo $row['product_id'] ?>">
                                    <?php  echo $path_parts['filename']; ?>
                                    </a>
                                </h4>
                                <p><?php echo $row['description'] ?></p>
                            </div>
                            
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>

    </div>

</div>
<?php echo $copyright; ?>