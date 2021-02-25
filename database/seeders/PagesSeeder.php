<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [];
        $inputs[] = [
            'name'    => 'Карта доставки',
            'slug'    => 'map',
            'content' => '<p>Кликните на зону, чтобы узнать условия доставки.</p>',
            'add'     => 'В часы пик, выходные, праздничные, предпраздничные дни заказы могут нами не приниматься.',
        ];
        $inputs[] = [
            'name'    => 'Условия заказа',
            'slug'    => 'howto',
            'content' => '<div class="text-page">
                        <h3>Порядок действий при оформлении заказа на сайте:</h3>
                        <ol>
                            <li>Добавить нужные товары в корзину путем нажатия на кнопку купить в уменьшенной карточке товара;</li>
                            <li>Для перехода в корзину товаров нажать на сумму рядом с изображением корзины в шапке (верхней части) сайта;</li>
                            <li>В корзине товаров просмотреть и при необходимости отредактировать состав заказа, после чего нажать на кнопку «Вперед»;</li>
                            <li>Далее заполнить поля «Имя», «Телефон» и «Адрес» и нажать на кнопку «Вперед»</li>
                            <li>Выбрать способ оплаты, после чего нажать на кнопку «Вперед». Далее в зависимости от выбранного способа оплаты совершить необходимые дей ствия.</li>
                        </ol>
                        <ul>
                            <li>Время приема заказов на доставку: <strong>с 10.00 – до 22.00 ежедневно</strong>.</li>
                            <li>Доставка еды осуществляется <strong>только в г. Минске</strong>.</li>
                            <li>Доставка осуществляется <strong>строго в соответствии с границами</strong> <router-link to="/map" class="link">зоны доставки</router-link>.</li>
                            <li><strong>Адрес доставки</strong> автоматически проверяется в форме заказа.</li>
                            <li>Если ваш адрес не входит в зону доставки, вы можете воспользоваться <strong>самовывозом</strong>. Мы находимся по адресу <strong>г.Минск, ул. Ложинская, 5</strong>.</li>
                            <li>Оплаченные заказы <strong>не подлежат редактированию</strong>.</li>
                        </ul>
                    </div>',
            'add'     => '',
        ];
        $inputs[] = [
            'name'    => 'Как оплатить заказ',
            'slug'    => 'payment',
            'content' => '<h2>Способы оплаты товаров в интернет-магазине:</h2>
                        <ol>
                            <li><strong>Наличными</strong> денежными средствами экспедитору. К оплате принимаются <strong>только белорусские рубли</strong>.</li>
                            <li>Банковской пластиковой <strong>картой экспедитору</strong>.</li>
                            <li>Банковской платёжной картой через систему WebPay.</li>
                            <li>ЕРИП (в соответствии с инструкцией, приведенной ниже)</li>
                        </ol>
                        <h2>Оплата картой через систему WabPay</h2>
                        <img src="/img/contacts/webpay.png">
                        <p>Безопасный сервер WEBPAY устанавливает шифрованное соединение по защищенному протоколу TLS и конфиденциально принимает от клиента данные его платёжной карты (номер карты, имя держателя, дату окончания действия, и контрольный номер банковской карточке CVC/CVC2).</p>
                        <p>После совершения оплаты с использованием банковской карты необходимо сохранять полученные карт-чеки (подтверждения об оплате, полученные в Интернет-магазине) для сверки с выпиской из карт-счёта (с целью подтверждения совершённых операций в случае возникновения спорных ситуаций)".</p>
                        <h2>Иструкция оплаты через EРИП</h2>
                        <img src="/img/contacts/erip.png">
                        <p><strong>Оплату Вы можете произвести в любом банке:</strong></p>
                        <ol>
                            <li>Интернет-банкинге.</li>
                            <li>Мобильном банкинге.</li>
                            <li>Инфокиоске.</li>
                            <li>Банкомате.</li>
                            <li>Кассе</li>
                        </ol>
                        <p><strong>Совершить оплату можно с использованием:</strong></p>
                        <ol>
                            <li>Наличных денежных средств.</li>
                            <li>Любых электронных денег.</li>
                            <li>Банковских платежных карточек.</li>
                        </ol>
                        <p><strong>ДЛЯ ПРОВЕДЕНИЯ ПЛАТЕЖА НЕОБХОДИМО::</strong></p>
                        <ol>
                            <li>Выбрать</li>
                            <li>Для оплаты «Услуги» ввести Номер заказа.</li>
                            <li>Ввести сумму платежа (если не указана).</li>
                            <li>Проверить корректность информации.</li>
                            <li>Совершить платеж.</li>
                        </ol>
                        <p>В случае, если Вы не получили заказ (не оказана услуга), Вам необходимо обратиться (в службу технической поддержки) по телефонам <strong><a href="tel:8 (029) 112-11-77">8 (029) 112-11-77</a></strong>,  <strong><a href="tel:8 (029) 2-821-821">8 (029) 2-821-821</a></strong>,  <strong><a href="tel:8 (025) 631-33-55">8 (025) 631-33-55</a></strong><br> или e-mail <strong><a href="mailto:goodcarspizza@gmail.com">goodcarspizza@gmail.com</a></strong>. Менеджеры Вас проконсультируют.</p>
                        <p>Документом, подтверждающим оплату товара, является чек. Пример чека представлен ниже.</p>
                        <img src="/img/contacts/check.jpg">
                        <h2>Условия возврата денежных средств</h2>
                        <p>При оплате банковской платежной картой возврат денежных средств осуществляется на карточку, с которой была произведена оплата.</p>',
            'add'     => '',
        ];
        DB::table('pages')->insert($inputs);
    }
}
