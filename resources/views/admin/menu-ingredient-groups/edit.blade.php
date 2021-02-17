@extends('layouts.app')

@section('content')
    @if($menuIngredientGroup->exists)
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form class="js-validation-form" action="{{route('admin.menu-ingredient-groups.update', ['menu_ingredient_group' => $menuIngredientGroup])}}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-sm-6">
                                <h1><a href="{{route('admin.menu-ingredient-groups.index')}}"><i class="fas fa-chevron-left"></i> {{ $menuIngredientGroup->name }}</a></h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <label>
                            <input type="text" name="name" value="{{$menuIngredientGroup->name}}">
                        </label>
                        <label>
                            <input type="text" name="min_price" value="{{$menuIngredientGroup->min_price}}">
                        </label>
                        <label>
                            <input type="text" name="mid_price" value="{{$menuIngredientGroup->mid_price}}">
                        </label>
                        <label>
                            <input type="text" name="max_price" value="{{$menuIngredientGroup->max_price}}">
                        </label>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menuIngredients as $key=>$item)
                            @php /** @var \App\Models\ViewSetting */ @endphp
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    <a href="{{route('admin.menu-ingredients.edit', $item->id)}}">{{ $item->name }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
