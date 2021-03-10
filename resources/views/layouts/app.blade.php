<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Админ-панель</title>

    <!-- Fonts -->
    <link href="{{ asset('fonts/stylesheet.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

</head>
<body>
    <div id="app">
        <nav class="admin-navbar">
            <div class="admin-navbar__menu">
                <a href="{{ url('/') }}" class="custom-logo">
                    <img src="/img/common/logo.png">
                </a>
                @auth
                <ul>
                    <li>
                        <a href="{{route('admin.menu-products.index')}}"
                           class="admin-navbar__link
                    {{ (request()->is('admin/menu-products') ||
                        request()->is('admin/menu-products/*/edit') ||
                        request()->is('admin/menu-products/create') ||
                        request()->is('admin/menu-product-variants') ||
                        request()->is('admin/menu-product-variants/*/edit') ||
                        request()->is('admin/menu-product-variants/create') ||
                        request()->is('admin/menu-categories') ||
                        request()->is('admin/menu-categories/*/edit') ||
                        request()->is('admin/menu-filters') ||
                        request()->is('admin/menu-filters/*/edit') ||
                        request()->is('admin/menu-filters/create') ||
                        request()->is('admin/menu-ingredient-groups') ||
                        request()->is('admin/menu-ingredient-groups/*/edit') ||
                        request()->is('admin/menu-ingredient-groups/create') ||
                        request()->is('admin/menu-ingredients') ||
                        request()->is('admin/menu-ingredients/*/edit') ||
                        request()->is('admin/menu-ingredients/create'))
                        ? 'active' : '' }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.15842 3.79114C4.04393 3.79114 3.24283 5.10025 3.24283 6.35466C3.24283 7.39381 3.81197 8.22002 4.63108 8.46959V13.6814C4.63108 13.9727 4.86719 14.2088 5.15842 14.2088C5.44966 14.2088 5.68577 13.9727 5.68577 13.6814V8.46963C6.50487 8.22002 7.07402 7.39384 7.07402 6.3547C7.07402 5.09108 6.26563 3.79114 5.15842 3.79114ZM5.15842 7.49313C4.65154 7.49313 4.29752 7.02499 4.29752 6.3547C4.29752 5.55626 4.77895 4.84586 5.15842 4.84586C5.5379 4.84586 6.01933 5.5563 6.01933 6.3547C6.01933 7.02499 5.66531 7.49313 5.15842 7.49313Z" fill="black" opacity="0.4"/>
                                <path d="M1.31686 18H16.6831C16.9743 18 17.2104 17.7639 17.2104 17.4727V0.527344C17.2104 0.236109 16.9743 0 16.6831 0H11.4718C10.4471 0 9.54121 0.516832 8.99998 1.30321C8.45875 0.516832 7.55281 0 6.52814 0H1.31686C1.02563 0 0.78952 0.236109 0.78952 0.527344V17.4727C0.78952 17.7639 1.02563 18 1.31686 18ZM11.4718 1.05469H16.1558V16.9453H9.52732V2.99918C9.52732 1.92698 10.3996 1.05469 11.4718 1.05469ZM1.84421 1.05469H6.52814C7.60034 1.05469 8.47264 1.92698 8.47264 2.99918V16.9453H1.84421V1.05469Z" fill="black" opacity="0.4"/>
                                <path d="M11.1093 8.09547H14.5737C14.8649 8.09547 15.1011 7.85936 15.1011 7.56813V4.10376C15.1011 3.81253 14.8649 3.57642 14.5737 3.57642H11.1093C10.8181 3.57642 10.582 3.81253 10.582 4.10376V7.56813C10.582 7.85936 10.8181 8.09547 11.1093 8.09547ZM11.6367 4.6311H14.0464V7.04078H11.6367V4.6311Z" fill="black" opacity="0.4"/>
                                <path d="M11.1093 10.2048H14.5737C14.8649 10.2048 15.1011 9.96872 15.1011 9.67749C15.1011 9.38626 14.8649 9.15015 14.5737 9.15015H11.1093C10.8181 9.15015 10.582 9.38626 10.582 9.67749C10.582 9.96872 10.8181 10.2048 11.1093 10.2048Z" fill="black" opacity="0.4"/>
                                <path d="M11.1093 12.3142H14.5737C14.8649 12.3142 15.1011 12.0781 15.1011 11.7869C15.1011 11.4956 14.8649 11.2595 14.5737 11.2595H11.1093C10.8181 11.2595 10.582 11.4956 10.582 11.7869C10.582 12.0781 10.8181 12.3142 11.1093 12.3142Z" fill="black" opacity="0.4"/>
                                <path d="M11.1093 14.4236H14.5737C14.8649 14.4236 15.1011 14.1875 15.1011 13.8962C15.1011 13.605 14.8649 13.3689 14.5737 13.3689H11.1093C10.8181 13.3689 10.582 13.605 10.582 13.8962C10.582 14.1875 10.8181 14.4236 11.1093 14.4236Z" fill="black" opacity="0.4"/>
                            </svg>
                            Меню
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders.index')}}" class="admin-navbar__link
                        {{ (request()->is('admin/orders') ||
                        request()->is('admin/orders/*/edit') ||
                        request()->is('admin/orders/create'))
                        ? 'active' : '' }}">
                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.4" clip-path="url(#clip0)">
                                    <path d="M11.523 11.4764L14.3472 9.84596C14.5995 9.70034 14.6859 9.37785 14.5403 9.12561C14.3947 8.8734 14.0722 8.78688 13.8199 8.9326L10.9957 10.563C10.7435 10.7087 10.6571 11.0311 10.8027 11.2834C10.9252 11.4957 11.233 11.6439 11.523 11.4764Z" fill="black"/>
                                    <path d="M16.6013 4.80699L9.26366 0.570664C9.10046 0.476445 8.89947 0.476445 8.73631 0.570664L1.39871 4.80699C1.23555 4.90121 1.13504 5.07527 1.13504 5.26367V13.7363C1.13504 13.9247 1.23555 14.0988 1.39871 14.193L8.73631 18.4293C8.81788 18.4764 8.90893 18.5 8.99998 18.5C9.09104 18.5 9.18209 18.4764 9.26366 18.4293L16.6013 14.193C16.7644 14.0988 16.8649 13.9247 16.8649 13.7363V5.26367C16.8649 5.07527 16.7644 4.90118 16.6013 4.80699ZM12.8397 3.85299L6.55673 7.48041L5.16563 6.6772L11.4485 3.04978L12.8397 3.85299ZM6.02939 8.39377V9.99556L4.63632 9.19119L4.63762 7.59021L6.02939 8.39377ZM8.99998 1.63625L10.3938 2.44094L4.11084 6.06836L2.71707 5.26367L8.99998 1.63625ZM8.47264 17.0593L2.18973 13.4319V6.17703L3.58343 6.98165L3.58142 9.49504C3.58128 9.68355 3.68179 9.85785 3.84509 9.95214L6.29309 11.3657C6.5677 11.5242 6.81534 11.3686 6.82044 11.3657C6.98363 11.2715 7.08411 11.0974 7.08411 10.909V9.00278L8.47264 9.80445V17.0593ZM8.99998 8.89109L7.61135 8.08939L13.8943 4.46197L15.2829 5.26367L8.99998 8.89109ZM15.8102 13.4319L9.52733 17.0593V9.80445L15.8102 6.17703V13.4319Z" fill="black"/>
                                    <path d="M13.8199 11.7568L10.9957 13.3872C10.7435 13.5328 10.6571 13.8553 10.8027 14.1075C10.9266 14.3221 11.2349 14.467 11.523 14.3006L14.3472 12.6702C14.5995 12.5246 14.6859 12.2021 14.5403 11.9499C14.3947 11.6977 14.0722 11.6112 13.8199 11.7568Z" fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="18" height="18" fill="white" transform="translate(0 0.5)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            Заказы
                            @if($ordersCount > 0)
                                <span>{{$ordersCount}}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.discounts.index')}}" class="admin-navbar__link
                        {{ (request()->is('admin/discounts') ||
                        request()->is('admin/discounts/*/edit') ||
                        request()->is('admin/discounts/create') ||
                        request()->is('admin/main-banners') ||
                        request()->is('admin/main-banners/*/edit') ||
                        request()->is('admin/main-banners/create'))
                        ? 'active' : '' }}">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.4">
                                    <path d="M3.99997 1.50006C2.34578 1.50006 1 2.84585 1 4.50003C1 6.15421 2.34578 7.49999 3.99997 7.49999C5.65415 7.49999 6.99993 6.15421 6.99993 4.50003C6.99993 2.84585 5.65415 1.50006 3.99997 1.50006ZM3.99997 5.50002C3.44857 5.50002 2.99998 5.05142 2.99998 4.50003C2.99998 3.94863 3.44857 3.50004 3.99997 3.50004C4.55136 3.50004 4.99995 3.94863 4.99995 4.50003C4.99995 5.05142 4.55136 5.50002 3.99997 5.50002Z" fill="#202020"/>
                                    <path d="M12 9.5C10.3458 9.5 9 10.8458 9 12.5C9 14.1541 10.3458 15.4999 12 15.4999C13.6541 15.4999 14.9999 14.1541 14.9999 12.5C14.9999 10.8458 13.6541 9.5 12 9.5ZM12 13.5C11.4486 13.5 11 13.0514 11 12.5C11 11.9486 11.4486 11.5 12 11.5C12.5514 11.5 13 11.9486 13 12.5C13 13.0514 12.5514 13.5 12 13.5Z" fill="#202020"/>
                                    <path d="M12.5546 1.668C12.0952 1.36174 11.4742 1.48587 11.1679 1.9454L3.16797 13.9453C2.86164 14.4047 2.98584 15.0256 3.44537 15.332C3.90483 15.6382 4.52569 15.5142 4.83208 15.0546L12.832 3.05472C13.1383 2.59519 13.0141 1.97433 12.5546 1.668Z" fill="#202020"/>
                                </g>
                            </svg>
                            Акции
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.pages.index')}}" class="admin-navbar__link
                        {{ (request()->is('admin/pages') ||
                        request()->is('admin/pages/*/edit') ||
                        request()->is('admin/pages/create'))
                        ? 'active' : '' }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.4" clip-path="url(#clip0)">
                                    <path d="M16.2052 11.9879V8.99999C16.2052 8.61165 15.8904 8.29686 15.5021 8.29686H9.70312V6.01209C10.7391 5.70761 11.4979 4.74882 11.4979 3.6156C11.4979 2.23825 10.3774 1.11768 9 1.11768C7.62265 1.11768 6.50208 2.23825 6.50208 3.6156C6.50208 4.74879 7.26086 5.70757 8.29688 6.01209V8.29686H2.49792C2.10959 8.29686 1.7948 8.61165 1.7948 8.99999V11.9879C0.758777 12.2924 0 13.2512 0 14.3843C0 15.7617 1.12057 16.8823 2.49792 16.8823C3.87527 16.8823 4.99584 15.7617 4.99584 14.3843C4.99584 13.2512 4.23707 12.2924 3.20105 11.9878V9.70311H8.29688V11.9879C7.26089 12.2924 6.50208 13.2512 6.50208 14.3844C6.50208 15.7617 7.62265 16.8823 9 16.8823C10.3774 16.8823 11.4979 15.7617 11.4979 14.3844C11.4979 13.2512 10.7391 12.2924 9.70312 11.9879V9.70311H14.799V11.9879C13.763 12.2924 13.0042 13.2512 13.0042 14.3844C13.0042 15.7617 14.1247 16.8823 15.5021 16.8823C16.8794 16.8823 18 15.7617 18 14.3843C18 13.2512 17.2412 12.2924 16.2052 11.9879ZM7.90833 3.61563C7.90833 3.01369 8.39806 2.52396 9 2.52396C9.60194 2.52396 10.0917 3.01369 10.0917 3.61563C10.0917 4.21758 9.60194 4.7073 9 4.7073C8.39806 4.7073 7.90833 4.21758 7.90833 3.61563ZM3.58959 14.3843C3.58959 14.9863 3.09987 15.476 2.49792 15.476C1.89598 15.476 1.40625 14.9863 1.40625 14.3843C1.40625 13.7824 1.89598 13.2927 2.49792 13.2927C3.09987 13.2927 3.58959 13.7824 3.58959 14.3843ZM10.0917 14.3843C10.0917 14.9863 9.60194 15.476 9 15.476C8.39806 15.476 7.90833 14.9863 7.90833 14.3843C7.90833 13.8042 8.36332 13.3284 8.93521 13.2948C8.95655 13.2967 8.9781 13.2981 8.99996 13.2981C9.02183 13.2981 9.04338 13.2967 9.06472 13.2948C9.63664 13.3284 10.0917 13.8042 10.0917 14.3843ZM15.5021 15.476C14.9001 15.476 14.4104 14.9863 14.4104 14.3843C14.4104 13.7824 14.9001 13.2927 15.5021 13.2927C16.104 13.2927 16.5938 13.7824 16.5938 14.3843C16.5938 14.9863 16.104 15.476 15.5021 15.476Z" fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            Страницы
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.payment-methods.index')}}" class="admin-navbar__link
                        {{ (request()->is('admin/payment-methods') ||
                        request()->is('admin/payment-methods/*/edit') ||
                        request()->is('admin/payment-methods/create') ||
                        request()->is('admin/delivery-methods') ||
                        request()->is('admin/delivery-methods/*/edit') ||
                        request()->is('admin/delivery-methods/create'))
                        ? 'active' : '' }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.4" clip-path="url(#clip0)">
                                    <path d="M13.5945 10.7017C12.3434 10.7017 11.3256 11.7195 11.3256 12.9706C11.3256 14.2217 12.3434 15.2395 13.5945 15.2395C14.8459 15.2395 15.8635 14.2217 15.8635 12.9706C15.8635 11.7195 14.8456 10.7017 13.5945 10.7017ZM13.5945 14.105C12.9689 14.105 12.4601 13.5962 12.4601 12.9706C12.4601 12.3449 12.9689 11.8361 13.5945 11.8361C14.2202 11.8361 14.729 12.3449 14.729 12.9706C14.729 13.5962 14.2202 14.105 13.5945 14.105Z" fill="black"/>
                                    <path d="M5.84246 10.7017C4.59136 10.7017 3.57355 11.7195 3.57355 12.9706C3.57355 14.2217 4.59136 15.2395 5.84246 15.2395C7.09357 15.2395 8.11138 14.2217 8.11138 12.9706C8.11138 11.7195 7.09357 10.7017 5.84246 10.7017ZM5.84246 14.105C5.21682 14.105 4.708 13.5962 4.708 12.9706C4.708 12.3449 5.21682 11.8361 5.84246 11.8361C6.46793 11.8361 6.97692 12.3449 6.97692 12.9706C6.97692 13.5962 6.4681 14.105 5.84246 14.105Z" fill="black"/>
                                    <path d="M15.1225 4.20735C15.026 4.01582 14.83 3.89499 14.6155 3.89499H11.6281V5.02945H14.2657L15.8103 8.10155L16.8241 7.59178L15.1225 4.20735Z" fill="black"/>
                                    <path d="M11.8929 12.4223H7.60086V13.5567H11.8929V12.4223Z" fill="black"/>
                                    <path d="M4.14072 12.4223H2.17436C1.86105 12.4223 1.60715 12.6762 1.60715 12.9895C1.60715 13.3028 1.86108 13.5567 2.17436 13.5567H4.14075C4.45407 13.5567 4.70796 13.3028 4.70796 12.9895C4.70796 12.6762 4.45403 12.4223 4.14072 12.4223Z" fill="black"/>
                                    <path d="M17.8809 8.95461L16.7652 7.51763C16.658 7.37922 16.4925 7.29829 16.3173 7.29829H12.1954V3.32771C12.1954 3.0144 11.9415 2.7605 11.6282 2.7605H2.17436C1.86105 2.7605 1.60715 3.01443 1.60715 3.32771C1.60715 3.64099 1.86108 3.89492 2.17436 3.89492H11.0609V7.8655C11.0609 8.17881 11.3149 8.43271 11.6281 8.43271H16.0395L16.8655 9.49682V12.4222H15.2962C14.9829 12.4222 14.729 12.6761 14.729 12.9894C14.729 13.3027 14.9829 13.5566 15.2962 13.5566H17.4328C17.7461 13.5566 18 13.3027 18 12.9894V9.30251C18 9.17658 17.958 9.05406 17.8809 8.95461Z" fill="black"/>
                                    <path d="M4.10293 9.54834H1.49366C1.18035 9.54834 0.926453 9.80227 0.926453 10.1156C0.926453 10.4289 1.18039 10.6828 1.49366 10.6828H4.10289C4.4162 10.6828 4.6701 10.4288 4.6701 10.1156C4.67014 9.80227 4.4162 9.54834 4.10293 9.54834Z" fill="black"/>
                                    <path d="M5.40756 7.3172H0.567211C0.253934 7.3172 0 7.57113 0 7.88445C0 8.19776 0.253934 8.45166 0.567211 8.45166H5.40756C5.72087 8.45166 5.97477 8.19772 5.97477 7.88445C5.97477 7.57117 5.72087 7.3172 5.40756 7.3172Z" fill="black"/>
                                    <path d="M6.33401 5.08612H1.49366C1.18035 5.08612 0.926453 5.34005 0.926453 5.65333C0.926453 5.96664 1.18039 6.22054 1.49366 6.22054H6.33401C6.64732 6.22054 6.90122 5.96661 6.90122 5.65333C6.90126 5.34005 6.64732 5.08612 6.33401 5.08612Z" fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            Оплата и доставка
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.contacts.index')}}" class="admin-navbar__link
                        {{ (request()->is('admin/contacts') ||
                        request()->is('admin/contacts/*/edit'))
                        ? 'active' : '' }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.4" clip-path="url(#clip0)">
                                    <path d="M9.00092 0C4.03836 0 0.00100708 4.03735 0.00100708 8.99991C0.00100708 13.9627 4.03836 18.0001 9.00092 18.0001C9.37228 18.0001 9.67318 17.6991 9.67318 17.3278C9.67318 16.9566 9.37228 16.6556 9.00092 16.6556C4.77973 16.6556 1.34554 13.2213 1.34554 8.99991C1.34553 4.77872 4.77973 1.34453 9.00092 1.34453C13.2221 1.34453 16.6563 4.77872 16.6563 8.99991V11.0821C16.6563 11.8595 16.0238 12.4918 15.2464 12.4918C14.4691 12.4918 13.8367 11.8595 13.8367 11.0821V8.99991C13.8367 6.33326 11.6674 4.16382 9.00083 4.16382C6.33418 4.16382 4.16474 6.33326 4.16474 8.99991C4.16474 11.6667 6.33418 13.8364 9.00083 13.8364C10.4808 13.8364 11.8069 13.1674 12.6946 12.1167C13.1044 13.124 14.0935 13.8364 15.2464 13.8364C16.7651 13.8364 18.0008 12.6008 18.0008 11.0821V8.99991C18.0008 4.03735 13.9635 0 9.00092 0ZM9.00092 12.4918C7.07564 12.4918 5.50936 10.9254 5.50936 8.99991C5.50936 7.07464 7.07573 5.50835 9.00092 5.50835C10.9261 5.50835 12.4923 7.07464 12.4923 8.99991C12.4923 10.9254 10.9261 12.4918 9.00092 12.4918Z" fill="#202020"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            Контакты
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.settings.index')}}" class="admin-navbar__link
                        {{ (request()->is('admin/settings') ||
                        request()->is('admin/settings/*/edit'))
                        ? 'active' : '' }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.4">
                                    <path d="M9 6.1875C7.44915 6.1875 6.1875 7.44919 6.1875 9C6.1875 10.5508 7.44919 11.8125 9 11.8125C10.5508 11.8125 11.8125 10.5508 11.8125 9C11.8125 7.44919 10.5508 6.1875 9 6.1875ZM9 10.4062C8.22459 10.4062 7.59375 9.77541 7.59375 9C7.59375 8.22459 8.22459 7.59375 9 7.59375C9.77541 7.59375 10.4062 8.22459 10.4062 9C10.4062 9.77541 9.77541 10.4062 9 10.4062Z" fill="black"/>
                                    <path d="M17.6542 11.0966L15.8335 9.70151C15.8847 9.21899 15.8816 8.75159 15.8335 8.29853L17.6542 6.90342C17.9365 6.68714 18.0128 6.29416 17.832 5.98792L16.0689 3.00041C15.8932 2.70278 15.5273 2.57692 15.2057 2.70359L13.0455 3.55437C12.651 3.27203 12.2287 3.03279 11.7833 2.83925L11.459 0.602262C11.4089 0.2565 11.1125 0 10.7631 0H7.23683C6.88748 0 6.59111 0.2565 6.54102 0.602297L6.21673 2.83929C5.77127 3.03286 5.34901 3.27206 4.95448 3.5544L2.79431 2.70362C2.47263 2.57692 2.10676 2.70281 1.93112 3.00045L0.167926 5.98792C-0.0128125 6.29416 0.0635469 6.68714 0.345781 6.90342L2.16649 8.29849C2.1153 8.78101 2.11843 9.24841 2.16649 9.70147L0.345816 11.0966C0.0635468 11.3129 -0.0128126 11.7058 0.167961 12.0121L1.93108 14.9996C2.10672 15.2972 2.47263 15.4231 2.79427 15.2964L4.95448 14.4457C5.34894 14.7279 5.77123 14.9672 6.2167 15.1607L6.54098 17.3977C6.59111 17.7435 6.88748 18 7.23683 18H10.7631C11.1125 18 11.4089 17.7435 11.459 17.3978L11.7833 15.1608C12.2287 14.9672 12.651 14.728 13.0455 14.4457L15.2057 15.2964C15.5273 15.4231 15.8932 15.2972 16.0689 14.9996L17.832 12.0121C18.0128 11.7059 17.9364 11.3129 17.6542 11.0966ZM15.1628 13.7681L13.1924 12.9921C12.9563 12.8992 12.6886 12.9405 12.4917 13.1003C12.0163 13.486 11.4826 13.7878 10.9057 13.9973C10.6621 14.0857 10.487 14.3009 10.4498 14.5573L10.1546 16.5938H7.84535L7.55021 14.5573C7.51302 14.3009 7.33787 14.0857 7.09431 13.9973C6.51732 13.7878 5.98368 13.486 5.50827 13.1003C5.31132 12.9405 5.04357 12.8992 4.8076 12.9921L2.8372 13.7681L1.69564 11.8338L3.34658 10.5688C3.55407 10.4098 3.65627 10.1488 3.61183 9.89118C3.50833 9.29088 3.51174 8.68929 3.61183 8.10879C3.65627 7.85116 3.55407 7.59016 3.34658 7.43119L1.69564 6.16612L2.8372 4.23186L4.8076 5.00787C5.04368 5.10086 5.31132 5.05944 5.50827 4.89969C5.98372 4.51396 6.51736 4.21218 7.09431 4.00271C7.33787 3.9143 7.51302 3.69911 7.55021 3.44268L7.84538 1.40625H10.1546L10.4498 3.44268C10.487 3.69911 10.6621 3.9143 10.9057 4.00271C11.4826 4.21218 12.0163 4.51396 12.4917 4.89969C12.6886 5.05948 12.9564 5.10082 13.1924 5.00787L15.1628 4.23186L16.3043 6.16612L14.6534 7.43119C14.4459 7.5902 14.3437 7.85116 14.3881 8.10879C14.4916 8.70908 14.4882 9.31068 14.3881 9.89118C14.3437 10.1488 14.4459 10.4098 14.6534 10.5688L16.3043 11.8338L15.1628 13.7681Z" fill="black"/>
                                </g>
                            </svg>
                            Настройки
                        </a>
                    </li>
                </ul>
                @endauth
            </div>
            <div class="admin-navbar__user">
                <ul>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}">Войти</a>
                            </li>
                        @endif

                        {{--@if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}">Зарегистрироваться</a>
                            </li>
                        @endif--}}
                    @else
                        <div class="user-logout">
                            <span>{{ Auth::user()->name }}</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="button-logout">
                                    <img src="/img/common/logout.svg">
                                </button>
                            </form>
                        </div>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="admin-panel">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ef7cuwjey0nzcp1h6d50hie2rqksq9raq2gqyhchwunviujq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/js/admin.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        });
    </script>
</body>
</html>
