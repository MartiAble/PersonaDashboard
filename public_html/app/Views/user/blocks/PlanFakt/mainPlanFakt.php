<!-- Main layout -->
<main style="min-height: 90vh" id="App">
    <div class="container-fluid">
        <!-- Section: Intro -->
        <section class="mt-md-2 pt-md-2 mb-5 pb-4">
            <div class=" mb-4">
                <div class="col-lg-6">
                    <div class="card mt-n3">
                        <div class="maintable-card-body">
                            <div class="row justify-content-center  mt-3 mb-2">
                                <div class="container">
                                    <label for="select">Прошлые месяцы</label>
                                    <select class="form-control  text-black-50" v-model="Curmonth"
                                            v-on:change="setDatePeriod">
                                        <option value="null" selected disabled class="text-black-50"> Выберите месяц
                                        </option>
                                        <option v-for="(item,index) in month" :value="index+1" v-text="item"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between mb-2 mt-3">
                                <div class="col">
                                    <label for="startDate">Дата начала</label>
                                    <input type="date" class="form-control text-black-50" v-model="currStart" />
                                </div>

                                <div class="col">
                                    <label for="EndDate">Дата конца</label>
                                    <input type="date" class="form-control text-black-50" v-model="currEnd" />
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3 mt-3">
                                <div class="col">
                                    <a :href="'/planfakt?start='+currStart+'&end='+currEnd">
                                        <button class="button-view" v-on:click="getInfo"style="font-size: 14pt">Показать</button>
                                    </a>
                                </div>
                                <div class="col form-check form-switch lastyear">
                                    <input class="form-check-input textlastyear" type="checkbox"
                                           id="flexSwitchCheckChecked" v-model="appg">
                                    <label class="form-check-label textlastyear" for="flexSwitchCheckChecked">Показать
                                        прошлый год</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>