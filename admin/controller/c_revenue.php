<?php
require_once '../../Project1_Group-TechZone/model/m_yearStatistics.php';
$c_revenues = new m_yearStatistics();
class YearStatisticsController {
    private $model;
    public function showYearlyStatistics() {
        $revenues = $this->model->getYearlyStatistics();
        require_once '../../Project1_Group-TechZone/admin/view/page_home.php';
    }
}
?>
