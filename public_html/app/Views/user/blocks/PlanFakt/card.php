
<!-- Grid row -->
<h4 class="h4 text-center mt-4" style="color: #332525 !important; margin-top: 2rem !important;" v-text="viewText"></h4>

<div class="row">
    <!-- Grid column -->
    <!-- Card -->
    <?php
    $iterration = 0;
    foreach ($content['current'] as $current):?>
    <?php
    $barChart = '
     <div class="barChange_'.$iterration.'">
     <canvas id="barChart_'.$iterration.'" height="200px"></canvas>
     </div>';
    $lineChart = '
    <div class="lineChange_'.$iterration.'">
    <canvas id="lineGraph_'.$iterration.'" height="300px" style="width: 100%"></canvas>
    </div>';
    $buttonChange = '<button class="row changeCharts_'.$iterration.' btn btnCardChange" style="color: white">Переключить графики</button>';
    $kidsClub = 'Kids';
    $barChartKids = '
        <div class="barChangeKids_'.$iterration.'">
             <canvas id="barChartKids_'.$iterration.'" height="200px"></canvas>
        </div>';
    $lineChartKids = '
        <div class="lineChangeKids_'.$iterration.'">
            <canvas id="lineGraphKids_'.$iterration.'" height="300px" style="width: 100%"></canvas>
        </div>';
    ?>

    <div class="col-lg-6" v-show="single" style="display: none !important; padding-top: 2rem;">
        <div class="card">
            <div class="card-header bg-dark">

                <div class="row" style="color: white">
                    <div class="col-8">
                        <h3 class="h3 text-white">
                            <?=str_replace('!','',$current['Club']);?>
                        </h3>
                        <p class="text-white">План — <span class="text-white" ><?=round(($current['TotalPlan']/1000000),1)?></span> млн. руб.</p>
                        <p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Прогноз — <span class="text-white" ><?=round(($current['TotalPlan']*$current['Percent'])/100000000,1)?></span>  млн. руб.</p>
                    </div>
                    <div class="col">
                        <span class="min-chart" id="chart-sales" data-percent="<?=$current['Percent']?>">
                            <span class="percent"></span>
                            <span style="font-size: xx-small"> Основной</span>
                        </span>
                    </div>
                </div>



            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <!-- GRAPHICS -->

                        <!-- BAR CHARTS IF\NON KIDS  -->
                        <?php
                        if ($current['Club'] != $kidsClub) {
                            echo $barChart;
                        }
                        if ($current['Club'] == $kidsClub) {
                            echo $barChartKids;
                            echo $barChartCurrentKids;
                            echo $barKidsPushkin;
                            echo $barKidsNeft;
                        }
                        if ($current['Club'] != $kidsClub)
                            {
                                echo $lineChart;
                            }
                        if ($current['Club'] == $kidsClub)
                            {
                                echo $lineChartKids;
                            }
                        ?>
                        <!-- LINE GRAPHS KIDS -->
                        <!-- GRAPHICS -->
                        <!-- PHP FOR KIDS -->
                    <?php
                    if ($current['Club'] == $kidsClub) {
                        echo $buttonChangeBackKidsP;
                        echo $buttonChangeBackKidsN;
                        echo $buttonChangePushkin;
                        echo $buttonChangeNeft;
                    }
                    ?>
                        <?php
                        $barKidsPushkin = '<div class="barChangePushkin">
                            <canvas id="barChartKidsPushkin" height="200px"></canvas>
                        </div>';
                        $barKidsNeft = '<div class="barChangeNeft">
                            <canvas id="barChartKidsNeft" height="200px"></canvas>
                        </div>';
                        $buttonChangePushkin = '<button class="row changeChartsPushkin btn btnCardKids">Пушкин</button>';
                        $buttonChangeNeft = '<button class="row changeChartsNeft btn btnCardKids">Нефть</button>';
                        $buttonChangeBackKidsP = '<button class="row changeBackKidsP btn btnCardKids"><- Kids</button>';
                        $buttonChangeBackKidsN = '<button class="row changeBackKidsN btn btnCardKids"><- Kids</button>';
                        ?>


                        <!--


        <?php
        $lengthKids = count($kidsOther);
        $lengthKids = $lengthKids;
        for ($iterrKids = 0; $iterrKids < $lengthKids; $iterrKids++) {
            $barChartCurrentKids = '
                            <div class="barChangeCurrentKids_' . $iterrKids . '">
                                 <canvas id="barChartCurrentKids_' . $iterrKids . '" height="200px"></canvas>
                            </div>';
            $lineChartCurrentKids = '
                            <div class="lineChangeCurrentKids_' . $iterrKids . '">
                                <canvas id="lineGraphCurrentKids_' . $iterrKids . '" height="200px"></canvas>
                            </div>';
            $buttonChangeKids = '<button class="row btn btn-success changeCurrentCharts_' . $iterrKids . '">' . str_replace('!', '', $kidsOther[$iterrKids]['Club']) . '</button>';
            if ($current['Club'] == 'Kids') {
                echo $buttonChangeKids;
            }
        } ?>-->

                        <?php
                            echo $buttonChange;
                        ?>

                    </div>
                </div>


               <!-- <div id="lineBar_<?=$iterration?>" style="height: 25em;"></div> -->
                <div class="card-footer">

                    <p class="" style="color: #3B3D42FF; font-size: 12pt !important;">{{'План на '+currEndSTR}} — <span class="" style="color: #3B3D42FF">
                            <?=round($current['CurrentPlan']/1,10)?> </span>
                        <span class="" style="color: #3B3D42FF"> руб.</span></p>
                    <p class="" style="color: ; font-size: 12pt !important; margin-top: -1rem !important; "> Фактически —
                        <span class="" style="color: #968787">
                            <?=round($current['SummFact']/1,10)?></span> <span class="" style="color: #968787"> руб.</span></p>
                    <?php if($current['CurrentPlan'] - $current['SummFact'] > 0):?>
                        <p class="" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #984c4c;"> Дельта: -<?=round(($current['CurrentPlan'] - $current['SummFact'])/1,10)?><span class="" style="color: #984C4CFF;"> руб.</span></p>
                    <?php else: ?>
                        <p class="" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #65916AFF;"> Дельта: <?=round(($current['CurrentPlan'] - $current['SummFact'])/1,10)?><span class="" style="color: #65916AFF;"> руб.</span></p>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>


    <?php $iterration++;?>
    <?php endforeach; ?>


        <!-- DOP CARDS UNDEFINED DATA -->
        <!------------------------------>


    <!-- Card -->
    <div class="col-lg-6" v-show="single" style="padding-top: 2rem;">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="h3 text-white">
                    УК
                </h3>
                <p class="text-white"><span class="text-white"> </span> </p>
                <p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">
                    <span class="text-white"> </span> </p>
                <br>
                <br>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col mt-2 row justify-content-center">



                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- Card -->
        <div class="col-lg-6" v-show="single" style="padding-top: 2rem;">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="h3 text-white">
                        Persona Med
                    </h3>
                    <p class="text-white">План — <span
                                class="text-white">0</span> млн. руб.</p>
                    <p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Прогноз
                        — <span
                                class="text-white">0</span>
                        млн. руб.</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col mt-4 row justify-content-center">

                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="" style="color: #26599E; font-size: 12pt !important;">План на DD.MM.YYYY — <span
                                    class="" style="color: #26599E">0 </span><span
                                    class="" style="color: #26599E"> млн. руб.</span></p>
                        <p class="" style="color: #F05050; font-size: 12pt !important; margin-top: -1rem !important; ">
                            Фактически — <span class=""
                                               style="color: #F05050">0</span> <span class=""
                                                                                     style="color: #F05050"> млн. руб.</span></p>
                        <p class="text-danger"
                           style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #F05050;">
                            Дельта: 0 <span style="color: #F05050;"> млн. руб.</span></p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Card -->
    <div class="col-lg-6" v-show="single" style="padding-top: 2rem;">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="h3 text-white">
                    Persona Food
                </h3>
                <p class="text-white">План — <span
                            class="text-white">0</span> млн. руб.</p>
                <p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Прогноз
                    — <span
                            class="text-white">0</span>
                    млн. руб.</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col mt-4 row justify-content-center">

                    </div>
                </div>
                <div class="card-footer">
                    <p class="" style="color: #26599E; font-size: 12pt !important;">План на DD.MM.YYYY — <span
                                class="" style="color: #26599E">0 </span><span
                                class="" style="color: #26599E"> млн. руб.</span></p>
                    <p class="" style="color: #F05050; font-size: 12pt !important; margin-top: -1rem !important; ">
                        Фактически — <span class=""
                                           style="color: #F05050">0</span> <span class=""
                                                                                 style="color: #F05050"> млн. руб.</span></p>
                    <p class="text-danger"
                       style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #F05050;">
                        Дельта: 0 <span style="color: #F05050;"> млн. руб.</span></p>
                </div>
            </div>
        </div>
    </div>

