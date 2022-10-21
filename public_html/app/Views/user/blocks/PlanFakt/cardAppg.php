<!-- APPG -->
<?php for($i = 0,$iMax=count($content['current']); $i<$iMax; $i++): ?>

    <div class="col-lg-6 mt-4" v-show="appg">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="h3 text-white"><?=str_replace('!','',$content['current'][$i]['Club'])?></h3>
                <p class="text-white">План — <span
                            class="text-white"><?=round($content['current'][$i]['TotalPlan']/1000000,1)?></span> млн. руб.</p>
                <p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Прогноз —
                    <span
                            class="text-white"><?=round($content['current'][$i]['TotalPlan']*$content['current'][$i]['Percent']/100000000,1)?></span>
                    млн. руб.</p>
            </div>
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col row justify-content-center">
                    <span class="min-chart my-4 row justify-content-center" id="chart-sales"
                          data-percent="<?=$content['current'][$i]['Percent']?>">
                        <span class="percent"></span>
                        <span style="font-size: xx-small"> Основной</span>
                    </span>
                    </div>
                    <br>
                    <div class="col row justify-content-center">
                    <span class="min-chart my-4" id="chart-sales-appg"
                          data-percent="<?=$content['appg'][$i]['Percent']?>">
                        <span class="percent" id="percent2"></span>
                        <span style="font-size: xx-small"> Ранее</span>
                    </span>
                    </div>
                </div>

                <?php
                $barChart_current = '<canvas id="barChart_current'.$i.'" height="200px"></canvas>';
                $barChart_appg = '<canvas id="barChart_appg'.$i.'" height="200px"></canvas>';

                $kidsChart_current = '<canvas id="pieChart_current'.$i.'" height="200px"></canvas>';
                $kidsChart_appg = '<canvas id="pieChart_appg'.$i.'" height="200px"></canvas>';
                ?>

                <div class="row justify-content-between">
                    <div class="col">
                        <?php
                        if ($content['current'][$i]['Club'] == 'Kids') {
                            echo $kidsChart_current;
                        } else {
                            echo $barChart_current;
                        };
                        ?>
                    </div>
                    <br>
                    <div class="col">
                        <?php
                        if ($content['appg'][$i]['Club'] == 'KIDS') {
                            echo $kidsChart_appg;
                        } else {
                            echo $barChart_appg;
                        };
                        ?>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="" style="color: #26599E">{{'План на '+currEndSTR}} — <span class=""
                                                                                         style="color: #26599E"><?=round($current['CurrentPlan']/1000000,1)?> </span><span class=""
                                                                                                                                                                           style="color: #26599E"> млн. руб.</span></p>
                    <p class="" style="color: #F05050; margin-top: -1rem !important; ">Фактически — <span class=""
                                                                                                          style="color: #F05050"><?=round($current['SummFact']/1000000,1)?></span> <span class=""
                                                                                                                                                                                         style="color: #F05050"> млн. руб.</span></p>
                    <?php if($current['CurrentPlan'] - $current['SummFact'] > 0):?>
                        <p class="text-danger"
                           style="margin-top: -1rem !important; margin-bottom: -.5rem !important; color: #F05050;"> Дельта:
                            -<?=round(($current['CurrentPlan'] - $current['SummFact'])/1000000,1)?><span class=""
                                                                                                         style="color: #F05050;"> млн. руб.</span></p>
                    <?php else: ?>
                        <p class="text-success"
                           style="margin-top: -1rem !important; margin-bottom: -.5rem !important; color: #45D294;"> Дельта:
                            <?=round(($current['CurrentPlan'] - $current['SummFact'])/1000000,1)?><span class=""
                                                                                                        style="color: #45D294;"> млн. руб.</span></p>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php endfor;?>
</div>
<!-- Grid row -->
</section>
<!-- Section: Intro -->
</div>
</main>