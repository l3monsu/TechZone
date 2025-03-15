<?php
require_once './model/SearchModel.php'; // Đảm bảo đúng đường dẫn

class SearchController {
    private $model;

    public function __construct() {
        // Khởi tạo model ở đây
        require_once './model/searchModel.php';  // Đảm bảo đường dẫn đúng với file model
        $this->model = new SearchModel();  // Khởi tạo đối tượng model
    }

    public function search() {
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $query = $_GET['query'];
            $results = $this->model->getSearchResults($query);  // Lấy kết quả tìm kiếm từ model
        } else {
            $results = [];  // Nếu không có từ khóa tìm kiếm, trả về mảng rỗng
        }

        // Render view với kết quả tìm kiếm
        require_once './view/search.php';
    }
}

    
    
?>
