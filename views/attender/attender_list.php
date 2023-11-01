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
                                        <p><span class="far fa-thumbs-up text-success flipped-icon"></span>
                                            マッチングオファー希望(自分←相手)</p>
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
                                    <?php $i = 1;
                                    foreach ($attenders as $attender): ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $attender['userID'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $attender['lastname'] . $attender['firstname'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isMatch($attender['matched'], $myevent['matched'], $attender['id']) ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="index.php?action=attenderPage&userID=<?= $attender['userID'] ?>&event=<?php echo $event_id; ?>"
                                                    class="btn btn-primary mt-1">詳細</a>
                                                <?php $limit = limitMatch($attender['id'], $myevent['matched'], $attender['matching_restrictions']); ?>
                                                <?php if ($limit == -2): ?>
                                                    <a href="#" class="btn btn-light mt-1" data-toggle="modal"
                                                        data-target="#limitAlertModal" data-limit="<?= $limit ?>">マッチング希望</a>
                                                <?php elseif ($limit == -1): ?>
                                                    <a href="#" class="btn btn-light mt-1" data-toggle="modal"
                                                        data-target="#limitAlertModal" data-limit="<?= $limit ?>">マッチング希望</a>
                                                <?php else: ?>
                                                    <a href="#" class="btn btn-warning mt-1" data-toggle="modal"
                                                        data-attender="<?= $attender['id'] ?>" data-target="#limitAlertModal"
                                                        data-limit="<?= $limit ?>"
                                                        data-event="<?php echo $event_id; ?>">マッチング希望</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
<div class="modal fade" id="limitAlertModal" tabindex="-1" role="dialog" aria-labelledby="limitAlertModalLabel"
    aria-hidden="true">
    <!-- Modal content -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="limitAlertModalLabel">制限アラート</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <div class="mx-auto">
                    <p id="limitValue" class="text-center m-2"></p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="closeModal" class="btn btn-primary" data-dismiss="modal">確認</a>
                <a href="" id="confirmMatch" class="btn btn-primary">確認</a>
            </div>
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
<script>
    $('#limitAlertModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var limit = button.data('limit'); // Extract the limit value from the button's data-limit attribute
        var attender = button.data('attender'); // Extract the attender value from the button's data-attender attribute
        var event = button.data('event'); // Extract the event value from the button's data-event attribute
        var modal = $(this);
        var limitText = '';
        var matchUrl = 'index.php?action=matchAttender&attender_id=' + attender + '&event=' + event;
        $('#confirmMatch').attr('href', matchUrl);

        if (limit == -2) {
            limitText = 'すでにマッチングが希望されています。';
            $('#confirmMatch').hide();
            $('#closeModal').show();
        } else if (limit == -1) {
            limitText = 'マッチング希望数が上限に達しました。当日、主催者が直接ご希望を承ります。';
            $('#confirmMatch').hide();
            $('#closeModal').show();
        } else {
            limitText = 'あと、' + limit + '件マッチング希望が出せます。';
            $('#confirmMatch').show();
            $('#closeModal').hide();
        }
        modal.find('#limitValue').text(limitText); // Update the modal's content with the limit value
    });
</script>