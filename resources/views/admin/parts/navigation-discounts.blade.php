<div class="admin-navigation">
    <div class="container">
        <h1>Акции</h1>
        <ul>
            <li>
                <a href="{{route('admin.discounts.index')}}"
                    {{ (request()->is('admin/discounts') ||
                        request()->is('admin/discounts/*/edit') ||
                        request()->is('admin/discounts/create'))
                        ? 'class=active' : '' }}>Акции</a>
            </li>
            <li>
                <a href="{{route('admin.main-banners.index')}}"
                    {{ (request()->is('admin/main-banners') ||
                        request()->is('admin/main-banners/*/edit') ||
                        request()->is('admin/main-banners/create'))
                        ? 'class=active' : '' }}>Баннеры</a>
            </li>
        </ul>
    </div>
</div>
