<link rel="stylesheet" href="public/css/oganizer/participants.css">
<div class="top-board">
    <div class="dashboard-wrapper mx-auto mt-2">
        <div class="container-fluid  dashboard-content">
            <div class="row">
                <!-- data table  -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header d-flex justify-content-between align-items-center">参加者一覧</h5>
                        <input type="text" value = "<?php echo $event_id; ?>" id="event_id" hidden>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row d-flex justify-content-center  align-items-center">
                                    <div class="col-md-4">
                                        <p class="m-3 bg-success fs-2 p-2 text-white w-100 text-center">開催日時</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" id="dateInput" class="form-control m-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-center  align-items-center">
                                <div class="row d-flex justify-content-center  align-items-center m-3">
                                    <div class="col-md-8">
                                        <input type="search" id="searchInput" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-dark " id="searchBtn">検索</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center  align-items-center m-3">
                                <button class="btn btn-dark" id="exportBtn">CSV出力</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row m-2" id="pagination-container">
                                <div class="col-md-6 d-flex justify-content-center  align-items-center">
                                    <div class="row">
                                        <p class="text-center text-dark m-3"> 表示数 </p>
                                        <select id="sel_pagenumber"></select>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center  align-items-center">
                                    <div class="row">
                                        <button id="prev-btn" disabled>&lt; 前</button>
                                        <div id="page-buttons"></div>
                                        <button id="next-btn">次 &gt;</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-2" id="table-container"></div>
                        </div>
                    </div>
                </div>
                <!-- end data table  -->
            </div>
        </div>
    </div>
</div>
<script src="public/js/oganizer/participants.js"></script>