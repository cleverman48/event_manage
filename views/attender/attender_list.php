<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
<div class="dashboard-wrapper mx-auto mt-2">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <!-- data table  -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header d-flex justify-content-between align-items-center">参加者一覧<a href="#"
                            class="btn btn-success mr-4" data-toggle="modal" data-target="#iconExplainModal">アイコン説明</a>
                    </h5>
                    <!-- Modal -->
                    <div class="modal fade" id="iconExplainModal" tabindex="-1" role="dialog"
                        aria-labelledby="iconExplainModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="iconExplainModalLabel">アイコン説明</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="mx-auto" style="width: max-content;">
                                        <p><span class="far fa-thumbs-up text-primary"></span> マッチング希望(自分→相手)</p>
                                        <p><span class="far fa-thumbs-up text-success flipped-icon"></span> マッチングオファー希望(自分←相手)</p>
                                        <p><span class="far fa-star text-warning"></span> 双方マッチング</p>
                                        <p><span class="far fa-heart text-danger"></span> 招待した人</p>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-primary" data-dismiss="modal">確認</a>
                                    <!-- <a href="#" class="btn btn-primary">Save changes</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first" id="table_data">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="max-width: 30px;">No</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">性　名</th>
                                        <th class="text-center">区分</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">dfsdfs</td>
                                        <td class="text-center">dfsdfs</td>
                                        <td class="text-center">
                                            <span class="far fa-thumbs-up text-primary"></span>
                                            <span class="far fa-heart text-danger"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-thumbs-up text-success flipped-icon"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-star text-warning"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-thumbs-up text-primary"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-thumbs-up text-primary"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-thumbs-up text-success flipped-icon"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-star text-warning"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-thumbs-up text-primary"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">11</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">12</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-star text-warning"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">13</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-thumbs-up text-success flipped-icon"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">14</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">ased</td>
                                        <td class="text-center">
                                            <span class="far fa-star text-warning"></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary mt-1">詳細</button>
                                            <button class="btn btn-warning mt-1">マッチング希望</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end data table  -->
        </div>
    </div>
</div>
<script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendor/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="assets/vendor/datatables/js/data-table.js"></script>
<script src="assets/vendor/datatables.net/js/dataTables.select.min.js"></script>
<script src="assets/vendor/datatables.net/js/dataTables.fixedHeader.min.js"></script>