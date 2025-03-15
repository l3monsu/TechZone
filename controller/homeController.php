<?php
class HomeController{
    private $product;

    public function __construct()
    {
        require_once './model/productModel.php';
    }

    public function viewHome(){
        require_once './view/home.php';
    }

    public function getPro(){
        $product = new ProductModel();
        $this->product->getPro();
    }

}

?>
