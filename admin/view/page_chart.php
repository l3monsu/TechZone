
    <div id="myChart" style="width:100%; max-width: 900px; height: 700px;"></div>
    <?php
require_once '../../Project1_Group-TechZone/model/m_base.php';
require_once '../../Project1_Group-TechZone/model/m_chart.php';
    $model = new m_Chart();
    print_r($model);
    echo $model->chartData();
    ?>
<?

