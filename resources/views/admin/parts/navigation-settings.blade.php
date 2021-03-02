<div class="admin-navigation">
    <div class="container">
        <h1>Настройки</h1>
        <ul>
            <li>
                <a href="{{route('admin.settings.index')}}"
                    {{ (request()->is('admin/settings') ||
                        request()->is('admin/settings/*/edit') ||
                        request()->is('admin/settings/create'))
                        ? 'class=active' : '' }}>Настройки</a>
            </li>
        </ul>
    </div>
</div>
