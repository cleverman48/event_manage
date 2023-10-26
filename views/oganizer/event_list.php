<link rel="stylesheet" href="public/css/oganizer/event_list.css">

<div class="top-board">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center  align-items-center">
            <div class="col-md-2">
                <button class="btn btn-brand m-3" onclick="regist_event()">イベント登録</button>
            </div>
            <div class="col-md-4">
                <div class="row d-flex justify-content-center  align-items-center">
                    <div class="col-md-4">
                        <p class="m-3 bg-success fs-2 p-2 text-white w-100 text-center">開催日時</p>
                    </div>
                    <div class="col-md-6"><input type="date" id="dateInput" class="form-control m-3"></div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark m-3" id="exportBtn">CSV出力</button>
            </div>
        </div>
        <div class="row " style="margin-bottom:70px;">
            <div class="card flex-grow-1 p-3">               
                <div class="row m-2" id="pagination-container">
                    <div class="col-md-6 d-flex justify-content-center  align-items-center">
                        <div class = "row">
                            <p class="text-center text-dark m-3"> 表示数 </p>
                            <select id="sel_pagenumber"></select>
                        </div>                        
                    </div>      
                    <div class="col-md-6 d-flex justify-content-center  align-items-center">
                        <div class = "row">
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
</div>

<script src="public/js/oganizer/event_list.js"></script>