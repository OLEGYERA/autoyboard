<main class="yb-content">
    <section class="filter">
        <h1 class="filter-title">Результаты поиска</h1>
        <div class="filter-content-box">
            <aside class="filter-search">
                <filter-form :validate_data="{{json_encode($validateData)}}"></filter-form>
            </aside>
            <div class="filter-finding">
                <filter-cards :currency="{{json_encode($currency)}}"></filter-cards>
            </div>
        </div>
    </section>
</main>

{{--: <span class="finding-title">{{$title}}</span>--}}
