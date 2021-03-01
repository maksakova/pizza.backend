<div class="admin-navigation">
    <div class="container">
        <h1>Контакты</h1>
        <ul>
            <li>
                <a href="{{route('admin.contacts.index')}}"
                    {{ (request()->is('admin/contacts') ||
                        request()->is('admin/contacts/*/edit') ||
                        request()->is('admin/contacts/create'))
                        ? 'class=active' : '' }}>Контакты</a>
            </li>
        </ul>
    </div>
</div>
