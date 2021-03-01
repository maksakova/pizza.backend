<div class="admin-navigation">
    <div class="container">
        <h1>Меню</h1>
        <ul>
            <li>
                <a href="{{route('admin.menu-products.index')}}"
                    {{ (request()->is('admin/menu-products') ||
                        request()->is('admin/menu-products/*/edit') ||
                        request()->is('admin/menu-products/create'))
                        ? 'class=active' : '' }}>Меню</a>
            </li>
            <li>
                <a href="{{route('admin.menu-categories.index')}}"
                    {{ (request()->is('admin/menu-categories') ||
                        request()->is('admin/menu-categories/*/edit') ||
                        request()->is('admin/menu-categories/create')) ? 'class=active' : '' }}>Категории меню</a>
            </li>
            <li>
                <a href="{{route('admin.menu-filters.index')}}"
                    {{ (request()->is('admin/menu-filters') ||
                        request()->is('admin/menu-filters/*/edit') ||
                        request()->is('admin/menu-filters/create')) ? 'class=active' : '' }}>Фильтры</a>
            </li>
            <li>
                <a href="{{route('admin.menu-ingredient-groups.index')}}"
                    {{ (request()->is('admin/menu-ingredient-groups') ||
                        request()->is('admin/menu-ingredient-groups/*/edit') ||
                        request()->is('admin/menu-ingredient-groups/create') ||
                        request()->is('admin/menu-ingredients') ||
                        request()->is('admin/menu-ingredients/*/edit') ||
                        request()->is('admin/menu-ingredients/create')) ? 'class=active' : '' }}>Ингредиенты</a>
            </li>
        </ul>
    </div>
</div>
