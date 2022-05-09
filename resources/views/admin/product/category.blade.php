{{-- @php
 $json_array  =json_decode($category_smart_phone, true);
//  $elementCount  = count($json_array);
echo "<pre>";
print_r($json_array);
print_r(count($json_array));
echo "</pre>";

@endphp --}}

@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        カテゴリーごとに分類されています
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            @php
                                $t = -1;
                            @endphp
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">スマートフォン</th>
                                    <th scope="col">冷蔵庫</th>
                                    <th scope="col">カメラ</th>
                                    <th scope="col">洗濯機</th>
                                    <th scope="col">テレビ</th>
                                    <th scope="col">時計</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="product">
                                    @for ($i = 1; $i <= 10; $i++)
                                        @php
                                            $t++;
                                        @endphp
                                    <tr>
                                        <th scope="row">{{ $t+1 }}</th>
                                        <td> <a href="#">{{ $category_smart_phone[$t]->name }}</a></td>
                                        <td><a href="#">{{ $category_fridge[0]->name }}</a></td>
                                        <td><a href="#">{{ $category_camera[0]->name }}</a></td>
                                        <td><a href="#">{{ $category_washing_machine[0]->name }}</a></td>
                                        <td><a href="#">{{ $category_tv[0]->name }}</a></td>
                                        <td><a href="#">{{ $category_smart_watch[0]->name }}</a></td>

                                    </tr>
                                    @endfor

                                    <tr>
                                        <th scope="row">1</th>
                                        <td><a href="">{{ $category_smart_phone[1]->name }}</a></td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                </div>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
