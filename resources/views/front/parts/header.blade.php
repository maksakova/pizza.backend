<header>
    <div class="container">
        <div class="row">
            <div class="col-2 d-sm-none">
                <div class="hamburger" v-on:click="isActive = !isActive">
                    <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21 1.5C21 2.32843 20.3284 3 19.5 3H1.5C0.671573 3 0 2.32843 0 1.5C0 0.671573 0.671573 0 1.5 0H19.5C20.3284 0 21 0.671573 21 1.5Z" fill="#202020"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.25 9.5C15.25 10.3284 14.5784 11 13.75 11H1.5C0.671573 11 0 10.3284 0 9.5C0 8.67157 0.671573 8 1.5 8H13.75C14.5784 8 15.25 8.67157 15.25 9.5Z" fill="#202020"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21 17.5C21 18.3284 20.3284 19 19.5 19H1.5C0.671573 19 0 18.3284 0 17.5C0 16.6716 0.671573 16 1.5 16H19.5C20.3284 16 21 16.6716 21 17.5Z" fill="#202020"/>
                    </svg>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-4 col-7" v-on:click="isActive = false">
                <the-logo></the-logo>
            </div>
            <div class="col-xl-5 col-lg-5 col-sm-8 nav" v-bind:class="{ active: isActive }">
                <ul>
                    <li>
                        <a href="/"><span>Меню</span></a>
                    </li>
                    <li v-on:click="isActive = false">
                        <a href="/map">Карта доставки</a>
                    </li>
                    <li v-on:click="isActive = false">
                        <a href="/howto">Как заказать</a>
                    </li>
                    <li v-on:click="isActive = false">
                        <a href="/payment">Оплата</a>
                    </li>
                    <li v-on:click="isActive = false">
                        <a href="/discounts">Акции</a>
                    </li>
                    <li v-on:click="isActive = false">
                        <a href="/contacts">Контакты</a>
                    </li>
                </ul>
                <div class="nav__mobile">
                    <p>
                        <the-phone class="nav__mobile__phone"/>
                    </p>
                    <p class="nav__mobile__address">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 2.75C6.45081 2.75 2.75 6.45081 2.75 11C2.75 15.5492 6.45081 19.25 11 19.25C15.5492 19.25 19.25 15.5492 19.25 11C19.25 6.45081 15.5492 2.75 11 2.75ZM11 17.75C7.2782 17.75 4.25 14.7218 4.25 11C4.25 7.2782 7.2782 4.25 11 4.25C14.7218 4.25 17.75 7.2782 17.75 11C17.75 14.7218 14.7218 17.75 11 17.75Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                            <path d="M10.2499 11.207V11.3105L10.3232 11.3837L13.1161 14.1767C13.409 14.4696 13.8838 14.4696 14.1767 14.1767C14.4696 13.8838 14.4696 13.409 14.1767 13.1161L11.7499 10.6893V6.49994C11.7499 6.08573 11.4142 5.74994 10.9999 5.74994C10.5857 5.74994 10.2499 6.08573 10.2499 6.49994V11.207Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                        </svg>
                        <time/>
                        <span class="text-light">Доставка по Минску</span>
                    </p>
                    <the-links/>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-8 col-sm-7 col-1">
                <p>
                    <the-phone class="phone"/>
                </p>
                <p class="address">Доставка по Минску
                    <the-time/>
                </p>
            </div>
            <div class="col-xl-2 offset-xl-0 col-lg-3 offset-lg-9 col-md-4 col-sm-5 col-1">
                <a href="/cart" class="button button-cart">
              <span>
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.0232 19.1712H5.82824V17.8464H21.1679C21.7073 17.8464 22.1445 17.409 22.1445 16.8698V8.7117C22.1445 8.2589 21.8334 7.8656 21.3928 7.76127L5.82824 4.07894V2.89829C5.82824 2.52732 5.61786 2.18838 5.2856 2.02358L1.41044 0.10155C0.927119 -0.138395 0.341182 0.0592065 0.101619 0.542338C-0.137944 1.02547 0.0594662 1.6116 0.542598 1.85116L3.87512 3.50407V20.1478C3.87512 20.6872 4.31228 21.1243 4.85168 21.1243H6.93851C6.83303 21.4255 6.77486 21.7488 6.77486 22.0855C6.77486 23.6922 8.08216 24.9995 9.6889 24.9995C11.2958 24.9995 12.6031 23.6922 12.6031 22.0855C12.6031 21.7488 12.545 21.4255 12.4395 21.1243H17.4551C17.3496 21.4255 17.2914 21.7488 17.2914 22.0855C17.2914 23.6922 18.5987 24.9995 20.2056 24.9995C21.8124 24.9995 23.1197 23.6922 23.1197 22.0855C23.1197 21.7488 23.0615 21.4255 22.956 21.1243H24.0232C24.5626 21.1243 24.9998 20.6872 24.9998 20.1478C24.9998 19.6086 24.5626 19.1712 24.0232 19.1712ZM5.82824 6.08605L20.1913 9.48418V15.8933H5.82824V6.08605ZM9.6889 23.0464C9.15904 23.0464 8.72798 22.6153 8.72798 22.0855C8.72798 21.5556 9.15904 21.1243 9.6889 21.1243C10.219 21.1243 10.65 21.5556 10.65 22.0855C10.65 22.6153 10.219 23.0464 9.6889 23.0464ZM20.2056 23.0464C19.6756 23.0464 19.2445 22.6153 19.2445 22.0855C19.2445 21.5556 19.6756 21.1243 20.2056 21.1243C20.7355 21.1243 21.1666 21.5556 21.1666 22.0855C21.1666 22.6153 20.7355 23.0464 20.2056 23.0464Z" fill="white"/>
              </svg>
              <span class="button-cart__count"></span>
              </span>
                    <span class="button-cart__price"> руб.</span>
                </a>
                <div class="close" v-on:click="isActive = !isActive">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.2409 9.50014L18.6393 2.10154C19.1208 1.6203 19.1208 0.842184 18.6393 0.360936C18.1581 -0.120312 17.38 -0.120312 16.8987 0.360936L9.5001 7.75953L2.10172 0.360936C1.62024 -0.120312 0.842354 -0.120312 0.361106 0.360936C-0.120369 0.842184 -0.120369 1.6203 0.361106 2.10154L7.75949 9.50014L0.361106 16.8987C-0.120369 17.38 -0.120369 18.1581 0.361106 18.6393C0.600941 18.8794 0.916289 19 1.23141 19C1.54653 19 1.86166 18.8794 2.10172 18.6393L9.5001 11.2407L16.8987 18.6393C17.1388 18.8794 17.4539 19 17.769 19C18.0841 19 18.3993 18.8794 18.6393 18.6393C19.1208 18.1581 19.1208 17.38 18.6393 16.8987L11.2409 9.50014Z" fill="#202020"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</header>

