@extends('layouts.front')

@section('content')
    <main class="discounts">
        <the-menu simple="simple"></the-menu>
        <div class="container">
            <h1>Акции</h1>
            <div class="row">
                @foreach($discounts as $discount)
                    @include('front.parts.discount-card')
                @endforeach
            </div>
        </div>
    </main>
@endsection
<script>
    import Menu from "../../js/components/parts/Menu";
    export default {
        components: {
            Menu
        },
    }
</script>
