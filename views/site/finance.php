<?php
  use miloschuman\highcharts\Highcharts;
?>

<div class="col-xs-12">

    <h2 class="alert-success text-center">Финансовые показатели</h2>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box box-solid">
            <div class="box-header"><i class="fa fa-phone"></i>Пульс</div>
            <div class="box-body">

                <?php

                $Xa = [];
                $Ya = [];
                $Ya1 = [];
                $Ya2 =[];

                for ($i = 0; $i<7; $i++) {
                    $Xa[] = $i;
                    $Ya[] = null;
                    $Ya1 [] = null;
                    $Ya2 [] = null;
                }

                for ($i = 0; $i<7; $i++) {
                    $Xa[$i] = date('d-m', strtotime(($i-7).' day'));
                    $Ya[$i] = (int)\app\models\Calling::getCountCall(date('Y-m-d', strtotime(($i-7).' day')), date('Y-m-d', strtotime(($i-7).' day')));
                    $Ya1[$i] = (int)\app\models\Rentdate::getCountReq(date('Y-m-d', strtotime(($i-7).' day')), date('Y-m-d', strtotime(($i-7).' day')));
                    $Ya2[$i] = $Ya[$i] == 0 ? 0 : round($Ya1[$i]/$Ya[$i] * 100);
                }

                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => ''],
                        'chart' => ['height' => '240'],
                        'xAxis' => [
                            'categories' => $Xa
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Кол-во']
                        ],
                        'series' => [
                            ['name' => 'Звонки', 'data' => $Ya ],
                            ['name' => 'Заявки', 'data' => $Ya1 ],
                            ['name' => 'Конверсия', 'data' => $Ya2 ],
                        ]
                    ]
                ]);

                ?>

            </div>
        </div>
    </div>

    <?php
    $n = \app\models\Rentdate::GetSummRent1(date('Y-m-d', strtotime('first day of this month')), date('Y-m-d'));
    $n1 = \app\models\Rentdate::GetSummRentInType(date('Y-m-d', strtotime('first day of this month')), date('Y-m-d'));
    $rr = array_search(10, array_column($n1, 'rd_type'));
    if ($rr > -1) {
        $n11 = number_format($n1[$rr]['sum_r']) . '</b> ₽ за <b>' . $n1[$rr]['d_r'] . '</b> дней аренды.';;
    } else
        $n11 = '';
    $d = -((date('t', strtotime('last day of previous month')))) . ' days';
    $w = \app\models\Rentdate::GetSummRent1(date('Y-m-d', strtotime('first day of previous month')), (date('Y-m-d', strtotime($d, time()))));
    $w1 = \app\models\Rentdate::GetSummRentInType(date('Y-m-d', strtotime('first day of previous month')), (date('Y-m-d', strtotime($d, time()))));
    $s = number_format($n[0]['sum_r']) . '</b> ₽ за <b>' . $n[0]['d_r'] . '</b> дней аренды; '.$n11;
    $s1 = ' ' . number_format($w[0]['sum_r']) . '</b> ₽ за <b>' . $w[0]['d_r'] . '</b> дней аренды.';
    $tr = '"width:'.'30'.'%';
    ?>


    <div class="col-xs-12 col-md-6">
    <div class="info-box bg-light-blue color-palette">
        <span class="info-box-icon"><i class="fa fa-ruble"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Текущий месяц</span>
            <span class="info-box-number"><?php echo $s; ?></span>

            <div class="progress">
                <div class="progress-bar" style="width: 30%"></div>
            </div>
            <span class="progress-description">
                    Прошлый месяц: <?php echo $s1 ?>
                  </span>
        </div>
    </div>
    </div>

    <?php
    $n = \app\models\Rentdate::GetSummRent1(date('Y-m-d', strtotime('first day of this month')), date('Y-m-d', strtotime('last day of this month')));
    $s = number_format($n[0]['sum_r']) . '</b> ₽ за <b>' . $n[0]['d_r'] . '</b> дней аренды.';
    $w = \app\models\Rentdate::GetSummRent1(date('Y-m-d', strtotime('first day of previous month')), date('Y-m-d', strtotime('last day of previous month')));
    $s1 = number_format($w[0]['sum_r']) . '</b> ₽ за <b>' . $w[0]['d_r'] . '</b> дней аренды.';
    ?>

    <div class="col-xs-12 col-md-6">
        <div class="info-box bg-light-blue color-palette">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Текущий месяц</span>
                <span class="info-box-number"><?php echo $s ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: 30%"></div>
                </div>
                <span class="progress-description">
                    Прошлый месяц: <?php echo $s1 ?>
                  </span>
            </div>
        </div>
    </div>

    <?php
    $n = \app\models\Rentdate::GetSummRent1(date('Y-m-d', strtotime('first day of this month')), date('Y-m-d'));
    $d = -((date('t', strtotime('last day of previous month')))) . ' days';
    $w = \app\models\Rentdate::GetSummRent1(date('Y-m-d', strtotime('first day of previous month')), (date('Y-m-d', strtotime($d, time()))));
    $s = number_format($n[0]['sum_r']) . '</b> ₽ за <b>' . $n[0]['d_r'] . '</b> дней аренды.';
    $s1 = ' ' . number_format($w[0]['sum_r']) . '</b> ₽ за <b>' . $w[0]['d_r'] . '</b> дней аренды.';
    ?>


    <div class="col-xs-12 col-md-6">
        <div class="info-box bg-light-blue color-palette">
            <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Выручка в день / Прогноз</span>
                <span class="info-box-number"><?php echo number_format($n[0]['sum_r'] / date('j')) . ' ₽ / ' . number_format($n[0]['sum_r'] / date('j') * date('t')) . ' ₽' ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: 30%"></div>
                </div>
                <span class="progress-description">

                    <?php echo 'Заявок вчера: '.\app\models\Rentdate::getCountReq(date('Y-m-d', strtotime('-1 day')), date('Y-m-d', strtotime('-1 day'))).
                            ', сегодня: '.\app\models\Rentdate::getCountReq(date('Y-m-d', strtotime('-0 day')), date('Y-m-d', strtotime('-0 day'))) ?>
                  </span>
            </div>
        </div>
    </div>
</div>

</div>