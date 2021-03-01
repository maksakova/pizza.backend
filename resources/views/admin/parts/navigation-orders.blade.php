<div class="admin-navigation">
    <div class="container">
        <h1>Заказы</h1>
        <ul>
            <li>
                <a href="{{route('admin.orders.index')}}"
                    {{ (request()->is('admin/orders') ||
                        request()->is('admin/orders/*/edit') ||
                        request()->is('admin/orders/create'))
                        ? 'class=active' : '' }}>Заказы</a>
            </li>
        </ul>
    </div>
</div>
