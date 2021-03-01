<div class="admin-navigation">
    <div class="container">
        <h1>Меню</h1>
        <ul>
            <li>
                <a href="{{route('admin.menu-products.index')}}"
                    {{ (request()->is('admin/menu-products')) ? 'class=active' : '' }}>Меню</a>
            </li>
            <li>
                <a href="{{route('admin.menu-categories.index')}}"
                    {{ (request()->is('admin/menu-categories')) ? 'class=active' : '' }}>Категории меню</a>
            </li>
            <li>
                <a href="{{route('admin.menu-filters.index')}}"
                    {{ (request()->is('admin/menu-filters')) ? 'class=active' : '' }}>Фильтры</a>
            </li>
            <li>
                <a href="{{route('admin.menu-ingredient-groups.index')}}"
                    {{ (request()->is('admin/menu-ingredient-groups')) ? 'class=active' : '' }}>Ингредиенты</a>
            </li>
        </ul>
    </div>
</div>
