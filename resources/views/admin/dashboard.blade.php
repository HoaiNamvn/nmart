@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"> オーダー済み</div>
                    <div class="card-body">
                        <h5 class="card-title">25万円</h5>
                        <p class="card-text">完成済のオーダー</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">処理中</div>
                    <div class="card-body">
                        <h5 class="card-title">10</h5>
                        <p class="card-text">処理中のオーダーの数</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">売り上げ</div>
                    <div class="card-body">
                        <h5 class="card-title">50万5千</h5>
                        <p class="card-text">システム売り上げ</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">キャンセールしたオーダー</div>
                    <div class="card-body">
                        <h5 class="card-title">12</h5>
                        <p class="card-text">キャンセールした数</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end analytic  -->
        <div class="card">
            <div class="card-header font-weight-bold">
                新しいオーダー
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CODE</th>
                            <th scope="col">CUSTOMER NAME</th>
                            <th scope="col">PRODUCT</th>
                            <th scope="col">NUMBER</th>
                            <th scope="col">BILL</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">TIME</th>
                            <th scope="col">CONTROL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>1211</td>
                            <td>
                                Đoan Hoai Nam <br>
                                0988859692
                            </td>
                            <td><a href="#">Samsung Galaxy A51 (8GB/128GB)</a></td>
                            <td>1</td>
                            <td>5万円</td>
                            <td><span class="badge badge-warning">処理中</span></td>
                            <td>26:04:2022 14:00</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>1212</td>
                            <td>
                                Minh Anh <br>
                                0868873382
                            </td>
                            <td><a href="#">Samsung Galaxy A51 (8GB/128GB)</a></td>
                            <td>1</td>
                            <td>4万５千円</td>
                            <td><span class="badge badge-warning">処理中</span></td>
                            <td>26:04:2022 14:00</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>1213</td>
                            <td>
                                Tran Thu Hang <br>
                                0234343545
                            </td>
                            <td><a href="#"> iPhone 11 Pro Max 64GB</a></td>
                            <td>1</td>
                            <td>９万円</td>
                            <td><span class="badge badge-success">完成</span></td>
                            <td>26:04:2022 14:05</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
