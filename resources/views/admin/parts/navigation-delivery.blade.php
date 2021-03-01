<div class="admin-navigation">
    <div class="container">
        <h1>Оплата и доставка</h1>
        <ul>
            <li>
                <a href="{{route('admin.payment-methods.index')}}"
                    {{ (request()->is('admin/payment-methods') ||
                        request()->is('admin/payment-methods/*/edit') ||
                        request()->is('admin/payment-methods/create'))
                        ? 'class=active' : '' }}>Способы оплаты</a>
            </li>
            <li>
                <a href="{{route('admin.delivery-methods.index')}}"
                    {{ (request()->is('admin/delivery-methods') ||
                        request()->is('admin/delivery-methods/*/edit') ||
                        request()->is('admin/delivery-methods/create'))
                        ? 'class=active' : '' }}>Способы доставки</a>
            </li>
        </ul>
    </div>
</div>
