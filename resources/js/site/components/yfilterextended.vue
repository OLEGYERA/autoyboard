<template>
    <div class="yfilterextended">
        <div class="yfilter_selected-item">
            <div class="yb-items_selected">
                <div class="item_selected">
                    <span>Легковые</span>
                    <i class="fas fa-times"></i>
                </div>
                <div class="item_selected">
                    <span>Легковые</span>
                    <i class="fas fa-times"></i>
                </div>
                <div class="item_selected">
                    <span>Легковые</span>
                    <i class="fas fa-times"></i>
                </div>
                <div class="item_selected">
                    <span>Легковые</span>
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="ybexpanded_search">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <div class="yb-carsearch_items">
                <div class="yoptions_items">
                    <div class="yoption_btn">
                        <button class="change_type active">Все</button>
                        <button class="change_type">Новые</button>
                        <button class="change_type">Б/у</button>
                    </div>
                    <div class="ycheckbox_options">
                        <ycheckbox
                            :text="'Поиск со всех ресурсов'">
                        </ycheckbox>
                        <ycheckbox
                            :text="'Провереные'">
                        </ycheckbox>
                        <ycheckbox
                            :text="'С фото'">
                        </ycheckbox>
                    </div>
                    <div class="y-transport_options">
                        <h2>Тип транспорта</h2>
                        <ydropdown></ydropdown>
                        <h3>Тип кузова</h3>
                        <div class="yb-checked_type">
                            <div class="yl-vis checkbox">
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check1" type="checkbox">
                                    <label class="y-body_name" for="check1">Универсал</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check2"  type="checkbox">
                                    <label class="y-body_name" for="check2">Кроссовер</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check3" type="checkbox">
                                    <label class="y-body_name" for="check3">Минивэн</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check4" type="checkbox">
                                    <label class="y-body_name" for="check4">Лифтбек</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check5" type="checkbox">
                                    <label class="y-body_name" for="check5">Хэтчбек</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check6" type="checkbox">
                                    <label class="y-body_name" for="check6">Кабриолет</label>
                                </div>
                            </div>
                            <div class="yr-vis checkbox">
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check7" type="checkbox">
                                    <label class="y-body_name" for="check7">Седан</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check8" type="checkbox">
                                    <label class="y-body_name" for="check8">Купе</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check9" type="checkbox">
                                    <label class="y-body_name" for="check9">Пикап</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check10" type="checkbox">
                                    <label class="y-body_name" for="check10">Ростер</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check11" type="checkbox">
                                    <label class="y-body_name" for="check11">Лимузин</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check12" type="checkbox">
                                    <label class="y-body_name" for="check12">Другой</label>
                                </div>
                            </div>
                        </div>
                        <h4>Страна производитель</h4>
                        <ydropdown></ydropdown>
                    </div>
                </div>
                <div class="ymarcks_items">2</div>
                <div class="ymodel-years_items">3</div>
            </div>
        </div>
    </div>
</template>

<script>
    import Yselectsearch from "./yselectsearch";
    import Ydropdownfilter from "./ydropdownfilter";
    export default {
        components: {Ydropdownfilter, Yselectsearch}
    }
</script>
