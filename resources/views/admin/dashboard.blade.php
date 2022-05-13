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
                            <td>1212</td>
                            <td>
                                Phan Văn Cương <br>
                                0988859692
                            </td>
                            <td><a href="#">Samsung Galaxy A51 (8GB/128GB)</a></td>
                            <td>1</td>
                            <td>7.790.000₫</td>
                            <td><span class="badge badge-warning">処理中</span></td>
                            <td>26:06:2020 14:00</td>
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
                            <td>1213</td>
                            <td>
                                Minh Anh <br>
                                0868873382
                            </td>
                            <td><a href="#">Samsung Galaxy A51 (8GB/128GB)</a></td>
                            <td>1</td>
                            <td>7.790.000₫</td>
                            <td><span class="badge badge-warning">処理中</span></td>
                            <td>26:06:2020 14:00</td>
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
                            <td>1214</td>
                            <td>
                                Trần Thu Hằng <br>
                                0234343545
                            </td>
                            <td><a href="#">Điện thoại iPhone 11 Pro Max 64GB</a></td>
                            <td>1</td>
                            <td>29.490.000₫</td>
                            <td><span class="badge badge-success">完成</span></td>
                            <td>26:06:2020 14:00</td>
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
                            <th scope="row">4</th>
                            <td>1212</td>
                            <td>
                                Tuấn Anh <br>
                                091236768
                            </td>
                            <td><a href="#">Apple MacBook Pro Touch 2020 i5 512GB</a></td>
                            <td>1</td>
                            <td>47.990.000₫</td>
                            <td><span class="badge badge-warning">処理中</span></td>
                            <td>26:06:2020 14:00</td>
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
                            <td>1214</td>
                            <td>
                                Trần Thu Hằng <br>
                                0234343545
                            </td>
                            <td><a href="#">Điện thoại iPhone 11 Pro Max 64GB</a></td>
                            <td>1</td>
                            <td>29.490.000₫</td>
                            <td><span class="badge badge-success">完成</span></td>
                            <td>26:06:2020 14:00</td>
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
                            <th scope="row">4</th>
                            <td>1212</td>
                            <td>
                                Tuấn Anh <br>
                                091236768
                            </td>
                            <td><a href="#">Apple MacBook Pro Touch 2020 i5 512GB</a></td>
                            <td>1</td>
                            <td>47.990.000₫</td>
                            <td><span class="badge badge-success">完成</span></td>
                            <td>26:06:2020 14:00</td>
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">前へ</span>
                                <span class="sr-only">後</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
@endsection
