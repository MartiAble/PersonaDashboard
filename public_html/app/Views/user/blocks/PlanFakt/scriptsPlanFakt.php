
<!-- Initializations -->



<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js" integrity="sha512-uplugzeh2/XrRr7RgSloGLHjFV0b4FqUtbT5t9Sa/XcilDr1M3+88u/c+mw6+HepH7M2C5EVmahySsyilVHI/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>
<script src="//unpkg.com/sunburst-chart"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js" integrity="sha512-YB9sg4Z0/6+Q2qyde+om6RdPat0bLazJXJe15qHmZ9FjckJKxHOpHbp1mGTnHq7fzljiKbMEPiwHSLU2cX8qHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script type="text/javascript">
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate({
        monthsFull: [ 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря' ],
        monthsShort: [ 'янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек' ],
        weekdaysFull: [ 'воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота' ],
        weekdaysShort: [ 'вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб' ],
        today: 'сегодня',
        clear: 'удалить',
        close: 'закрыть',
        firstDay: 1,
        format: 'd mmmm yyyy г.',
        formatSubmit: 'yyyy/mm/dd'
    });

    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
<!-- Charts -->
<script type="text/javascript">
    // Small chart
    $(function () {
        $('.min-chart#chart-sales').easyPieChart({
            barColor: "#45d294",
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
        $('.min-chart#chart-sales-appg').easyPieChart({
            barColor: "#4572e5",
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
    });

    $(function () {
        $('#dark-mode').on('click', function (e) {

            e.preventDefault();
            $('h4, button').not('.check').toggleClass('dark-grey-text text-white');
            $('.list-panel a').toggleClass('dark-grey-text');

            $('footer, .card').toggleClass('dark-card-admin');
            $('body, .navbar').toggleClass('white-skin navy-blue-skin');
            $(this).toggleClass('white text-dark btn-outline-black');
            $('body').toggleClass('dark-bg-admin');
            $('h6, .card, p, td, th, i, li a, h4, input, label').not(
                '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
            $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
            $('.gradient-card-header').toggleClass('white black lighten-4');
            $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

        });
    });

</script>
<script type="application/javascript">
    const PlanFakt = new Vue({
        el:'#App',
        data: {
            currStart: '<?=$start?>',
            currEnd: '<?=$end?>',
            currEndSTR:'<?=$endSTR?>',
            viewText: 'Текущий отчет c <?=$startSTR?> по <?=$endSTR?>',
            month:<?=json_encode($month)?>,
            Curmonth:null,
            appg:false,

        },
        computed:{
            single:function(){
                if(this.appg==false){
                    return true
                }
                else{
                    $('.min-chart#chart-sales-appg').easyPieChart({
                        barColor: "#4572e5",
                        onStep2: function (from, to, percent) {
                            $(this.el).find('.percent').text(Math.round(percent));
                        }
                    });
                    return false
                }
            }
        },
        methods:{
            setDatePeriod(){
                const self = this
                let Forma ={
                    month:this.Curmonth
                }
                axios.post('/API/User/getPeriod',Forma).then(res=>{
                    self.currStart = res.data.start
                    self.currEnd = res.data.end
                })
            },
            getInfo(){
                const self = this
                let Forma ={
                    start:this.currStart,
                    end:this.currEnd
                }
                axios.post('/planfakt',Forma).then(res=>{
                    self.content = res.data.content
                    self.viewText = 'Текуший отчет c '+res.data.start+' по '+res.data.end
                    self.currEndSTR = res.data.end
                    self.rerender()
                })
            },
            rerender(){
            }
        }
    })
</script>



<?php for($i=0,$iMax=count($content['current']); $i<$iMax; $i++):?>
    <!-- GRAPHIC CHANGE BAR TO LINE FOR OTHER GROUPS -->
    <script>
        $(function(){
            $('div.lineChange_<?=$i?>').hide();
            $('button.changeCharts_<?=$i?>').on('click', function(){
                $('div.barChange_<?=$i?>, div.lineChange_<?=$i?>').toggle();
            });
        });
    </script>
    <script>
        $(function(){
            $('div.barChangePushkin').hide();
            $('button.changeBackKidsN').hide();
            $('button.changeBackKidsP').hide();
            $('button.changeChartsPushkin').on('click', function(){
                $('div.barChangeKids_<?=$i?>, div.barChangePushkin').toggle();
                $('button.changeChartsPushkin').hide();
                $('button.changeBackKidsP').show();
                $('button.changeBackKidsN').hide();
                $('button.changeChartsNeft').show();
                $('div.barChangeNeft').hide();
                $('div.barChangePushkin').show();
                $('div.barChangeKids_<?=$i?>').hide();
            });
        });
    </script>
    <script>
        $(function(){
            $('div.barChangeNeft').hide();
            $('button.changeBackKidsN').hide();
            $('button.changeBackKidsP').hide();
            $('button.changeChartsNeft').on('click', function(){
                $('div.barChangeKids_<?=$i?>, div.barChangeNeft').toggle();
                $('button.changeChartsNeft').hide();
                $('button.changeBackKidsN').show();
                $('button.changeBackKidsP').hide();
                $('button.changeChartsPushkin').show();
                $('div.barChangePushkin').hide();
                $('div.barChangeNeft').show();
                $('div.barChangeKids_<?=$i?>').hide();
            });
        });
    </script>

    <script>
        $(function(){
            $('button.changeBackKidsP').on('click', function(){
                $('div.barChangePushkin').hide();
                $('div.barChangeKids_<?=$i?>').show();
                $('button.changeBackKidsP').hide();
                $('button.changeChartsPushkin').show();
            });
        });
    </script>

    <script>
        $(function(){
            $('button.changeBackKidsN').on('click', function(){
                $('div.barChangeNeft').hide();
                $('div.barChangeKids_<?=$i?>').show();
                $('button.changeBackKidsN').hide();
                $('button.changeChartsNeft').show();
            });
        });
    </script>


    <script type="text/javascript">
        $(function(){
            $('div.lineChangeKids_<?=$i?>').hide();
            $('button.changeCharts_<?=$i?>').on('click', function(){
                $('div.barChangeKids_<?=$i?>, div.lineChangeKids_<?=$i?>').toggle();
                $('div.barChangeKids_<?=$i?>').hide();
            });
        });
    </script>


    <!-- MAIN BAR -->
    <script>
        var ctxB = document.getElementById("barChart_<?=$i?>");
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [ "План на сегодня","Фактически"],
                datasets: [{
                    label: [],
                    data: [<?=round($content['current'][$i]['CurrentPlan'],1)?>,<?=round(($content['current'][$i]['SummFact']),1)?>],
                    cubicInterpolationMode: 'monotone',
                    backgroundColor: [
                        'rgb(227,204,204,0.85)',
                        'rgb(150,135,135,0.85)',
                    ],
                    borderColor: [
                        'rgb(161,147,147)',
                        'rgb(63,55,55)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <!-- MAIN KIDS -->

    <?php
    $iterrKidsJsMax = count($kidsOther);
    for($iterrKidsJs=0; $iterrKidsJs < $iterrKidsJsMax; $iterrKidsJs++): ?>


    <!-- KIDS PUSHKIN NEFT -->
        <?php
        $currentDay = date('d', strtotime($end));
        ?>
        <script type="text/javascript">
            var ctxB = document.getElementById("barChartKidsPushkin");
            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: [ "План на сегодня","Фактически"],
                    datasets: [{
                        label: [],
                        data: [<?=round(number_format($kidsOther[0]['CurrentPlan'] / 30 * $currentDay, 2,'.',''),1)?>,<?=round(($kidsOther[0]['SummFact']),1)?>],
                        cubicInterpolationMode: 'monotone',
                        backgroundColor: [
                            'rgba(227,204,204,0.85)',
                            'rgba(150,135,135,0.85)',
                        ],
                        borderColor: [
                            'rgb(161,147,147)',
                            'rgb(63,55,55)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
        <script type="text/javascript">
            var ctxB = document.getElementById("barChartKidsNeft");
            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: [ "План на сегодня","Фактически"],
                    datasets: [{
                        label: [],
                        data: [<?=round(number_format($kidsOther[1]['CurrentPlan'] / 30 * $currentDay, 2,'.',''),1)?>,<?=round(($kidsOther[1]['SummFact']),1)?>],
                        cubicInterpolationMode: 'monotone',
                        backgroundColor: [
                            'rgba(227,204,204,0.85)',
                            'rgba(150,135,135,0.85)',
                        ],
                        borderColor: [
                            'rgba(150,135,135,0.85)',
                            'rgb(63,55,55)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>



        <!-- END OF KIDS PUSHKIN & NEFT -->

        <script type="text/javascript">
            var ctxB = document.getElementById("barChartCurrentKids_<?=$iterrKidsJs?>");
            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: [ "План на сегодня","Фактически"],
                    datasets: [{
                        label: [],
                        data: [<?=round($kidsOther[$iterrKidsJs]['CurrentPlan'],1)?>,<?=round(($kidsOther[$iterrKidsJs]['SummFact']),1)?>],
                        cubicInterpolationMode: 'monotone',
                        backgroundColor: [
                            'rgba(227,204,204,0.85)',
                            'rgba(150,135,135,0.85)',
                        ],
                        borderColor: [
                            'rgba(150,135,135,0.85)',
                            'rgb(63,55,55)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>


        <script type="text/javascript">
            $(function(){
                $('div.barChangeCurrentKids_<?=$iterrKidsJs?>').hide();
                $('button.changeCurrentCharts_<?=$iterrKidsJs?>').on('click', function(){
                    $('div.barChangeKids_<?=$i?>, div.barChangeCurrentKids_<?=$iterrKidsJs?>').toggle();
                });
            });
        </script>


        <script type="text/javascript">
            $(function(){
                $('div.lineChangeCurrentKids_<?=$iterrKidsJs?>').hide();
                $('button.changeCharts2_<?=$i?>').on('click', function(){
                    $('div.barChangeKids_<?=$iterrKidsJs?>, div.lineChangeCurrentKids_<?=$iterrKidsJs?>').toggle();
                });
            });
        </script>


        <script type="text/javascript">
            var ctxB = document.getElementById("lineGraphCurrentKids_<?=$iterrKidsJs?>");
            var pieChart = new Chart(ctxB, {
                type: 'line',
                data: {
                    labels: arrayMonth,
                    datasets: [{
                        label: 'План',
                        data: ['9','4','0','2','3','8','7','2','1','4','5'],
                        fill: false,
                        borderColor: [
                            'rgba(227,204,204,0.85)'
                        ],
                    },
                        {
                            label: 'Факт',
                            data: ['1','6','5','2','4','9','10','1','0','9','4'],
                            fill: false,
                            borderColor: [
                                'rgba(150,135,135,0.85)'
                            ],
                        }
                    ]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                    ,}
            });
        </script>


        <script type="text/javascript">
        var ctxB = document.getElementById("barChartKids_<?=$i?>");
            var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
            labels: [ "План на сегодня","Фактически"],
            datasets: [{
            label: [],
            data: [<?=round($content['current'][$i]['CurrentPlan'],1)?>,<?=round(($content['current'][$i]['SummFact']),1)?>],
            cubicInterpolationMode: 'monotone',
            backgroundColor: [
            'rgba(227,204,204,0.85)',
            'rgba(150,135,135,0.85)',
            ],
            borderColor: [
            'rgba(150,135,135,0.85)',
            'rgb(63,55,55)',
            ],
            borderWidth: 1
        }]
        },
            options: {

            scales: {
            yAxes: [{
            ticks: {
            beginAtZero: true
        }
        }]
        }
        }
        });
        </script>

        <script type="text/javascript">
            var currentBarDate = new Date();
            var currentMonth = currentBarDate.getMonth();
            var iterrMonth = 0;
            var arrayMonth = [];
            var allMonth = ['янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'];
            for (iterrMonth; iterrMonth < currentMonth; iterrMonth++) {
                arrayMonth.push(allMonth[iterrMonth]);
            }
        </script>

        <script type="text/javascript">
            var ctxB = document.getElementById("lineGraphKids_<?=$i?>");
            var pieChart = new Chart(ctxB, {
                type: 'line',
                data: {
                    labels: arrayMonth,
                    datasets: [{
                        label: 'План',
                        data: ['1','2','3','7','9','6','0','1','4','2','5'],
                        fill: false,
                        borderColor: [
                            'rgba(239,9,60,0.79)'
                        ],
                    },
                        {
                            label: 'Факт',
                            data: ['4','0','2','3','2','3','1','6','2','6','6'],
                            fill: false,
                            borderColor: [
                                'rgba(11,143,234,0.82)'
                            ],
                        }
                    ]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                    ,}
            });
        </script>
    <?php endfor; ?>




    <script type="text/javascript">
        var ctxB = document.getElementById("lineGraph_<?=$i?>");
        var pieChart = new Chart(ctxB, {
            type: 'line',
            data: {
                labels: arrayMonth,
                datasets: [{
                    label: 'План',
                    data: ['1','2','3','2','3','2','3','2','2','2','2'],
                    fill: false,
                    borderColor: [
                        'rgba(239,9,60,0.79)'
                    ],
                },
                    {
                        label: 'Факт',
                        data: ['4','3','2','3','2','3','1','6','2','6','6'],
                        fill: false,
                        borderColor: [
                            'rgba(11,143,234,0.82)'
                        ],
                    }
                ]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            ,}
        });
    </script>

    <!-- APPG -->

    <script type="text/javascript">
        var ctxB = document.getElementById("barChart_current<?=$i?>");
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [ "План на сегодня","Фактически"],
                datasets: [{
                    label: [],
                    data: [<?=round($content['current'][$i]['CurrentPlan'],1)?>,<?=round(($content['current'][$i]['SummFact'] ),1)?>],
                    backgroundColor: [
                        'rgba(239,9,60,0.79)',
                        'rgba(11,143,234,0.82)',
                    ],
                    borderColor: [
                        'rgb(134,4,33)',
                        'rgb(4,70,110)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script type="text/javascript">
        var ctxB = document.getElementById("barChart_appg<?=$i?>");
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [ "План на сегодня","Фактически"],
                datasets: [{
                    label: ['<?=number_format($content['appg'][$i]['TotalPlan'],0,'.',' ') ?> / <?=number_format($content['appg'][$i]['SummFact'],0,'.',' ') ?>'],
                    data: [<?=round($content['appg'][$i]['TotalPlan'] ,1)?>,<?=round(($content['appg'][$i]['SummFact'] ),1)?>],
                    backgroundColor: [
                        'rgba(239,9,60,0.79)',
                        'rgba(11,143,234,0.82)',
                    ],
                    borderColor: [
                        'rgb(134,4,33)',
                        'rgb(4,70,110)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        const data = {
            name: 'PersonaSport',
            color: 'rgba(11,143,234,0.82)',
            children: [{
                name: 'Пушкин',
                color: '#E85D14ED',
                children: [{
                    name: 'Фитнес',
                    color: '#40B346',
                    size: 1
                }, {
                    name: 'ДК',
                    color: '#dc1010',
                    size: 1
                }, {
                    name: 'Оп',
                    color: '#E85D14ED',
                    size: 1
                }, {
                    name: 'Мас',
                    color: '#40B346',
                    size: 1
                }, {
                    name: 'Рем',
                    color: '#40B346',
                    size: 1
                }
                ]

            }, {
                name: 'Нефть',
                color: '#73c458',
                children: [{
                 name: 'Фитнес',
                 color: '#40B346',
                 size: 1
                }, {
                    name: 'ДК',
                    color: '#E85D14ED',
                    size: 1
                }, {
                        name: 'Оп',
                        color: '#40B346',
                        size: 1
                    }, {
                        name: 'Мас',
                        color: '#40B346',
                        size: 1
                    }, {
                    name: 'Рем',
                    color: '#40B346',
                    size: 1,
                }
                ]
            }]
        };

        Sunburst()
            .data(data)
            .size('size')
            .color('color')
            .radiusScaleExponent(1)
            (document.getElementById('chartDiv'));
    </script>




<?php endfor;?>





