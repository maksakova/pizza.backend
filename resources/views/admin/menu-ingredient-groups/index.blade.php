@extends('layouts.app')

@section('content')
    @include('admin.parts.navigation-menu')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h2>
                            <a href="{{route('admin')}}"><i class="fas fa-chevron-left"></i> Ингредиенты</a>
                        </h2>
                    </div>
                </div>
                <div class="table-outer">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menuIngredientGroups as $key=>$item)
                        @php /** @var \App\Models\ViewSetting */ @endphp
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                <a href="{{route('admin.menu-ingredient-groups.edit', $item->id)}}">{{ $item->name }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
