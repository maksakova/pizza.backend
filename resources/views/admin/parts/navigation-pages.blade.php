<div class="admin-navigation">
    <div class="container">
        <h1>Страницы</h1>
        <ul>
            <li>
                <a href="{{route('admin.pages.index')}}"
                    {{ (request()->is('admin/pages') ||
                        request()->is('admin/pages/*/edit') ||
                        request()->is('admin/pages/create'))
                        ? 'class=active' : '' }}>Страницы</a>
            </li>
        </ul>
    </div>
</div>
