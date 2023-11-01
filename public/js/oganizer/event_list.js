var data = [];
const tableContainer = document.getElementById("table-container");
const paginationContainer = document.getElementById("pagination-container");
const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");
const pageBtnsContainer = document.getElementById("page-buttons");

let currentPage = 1;
let rowsPerPage = 5;

function renderTable() {
    const startIndex = (currentPage - 1) * rowsPerPage;
    const endIndex = startIndex + rowsPerPage;
    const currentData = data.slice(startIndex, endIndex);

    let tableHTML = "<table id='myTable'>";
    tableHTML += `<tr><th>番号</th><th>イベントID</th><th>開催日時</th><th>イベント名</th><th>参加数</th><th>人数</th><th>状況</th>
                <th>クリック数</th><th>お気に入り数</th><th>詳細</th><th>参加者一覧</th></tr>`;
    currentData.forEach((item) => {
        tableHTML += `<tr><td>${item.no}</td><td>${item.event_id}</td><td>${item.event_date} ${item.event_time.slice(0, 5)}</td><td>${item.event_name}</td><td>${item.num_attend}</td><td>${item.num_participants}</td><td>${item.event_state}</td>
                    <td>${item.clicks}</td><td>${item.favorites}</td>
                    <td><button style='background-color: #c9ad3d;' onclick="event_detail('${item.event_id}')">詳細</button></td>
                    <td><button style='background-color: #c9ad3d;' onclick="attenders('${item.event_id}')">参加者一覧</button></td>
                    </tr>`;
    });
    tableHTML += "</table>";
    tableContainer.innerHTML = tableHTML;
}

function updatePagination() {
    const totalPages = Math.ceil(data.length / rowsPerPage);
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === totalPages;
    pageBtnsContainer.innerHTML = "";
    const maxPagesToShow = 5;
    let startPage = Math.max(currentPage - Math.floor(maxPagesToShow / 2), 1);
    let endPage = startPage + maxPagesToShow - 1;
    if (endPage > totalPages) {
        endPage = totalPages;
        startPage = Math.max(endPage - maxPagesToShow + 1, 1);
    }
    if (startPage > 1) {
        const prevPagesBtn = document.createElement("button");
        prevPagesBtn.textContent = "...";
        prevPagesBtn.addEventListener("click", () => {
            currentPage = startPage - 1;
            renderTable();
            updatePagination();
        });
        pageBtnsContainer.appendChild(prevPagesBtn);
    }
    for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement("button");
        btn.textContent = i;
        btn.addEventListener("click", () => {
            currentPage = i;
            renderTable();
            updatePagination();
        });
        if (i === currentPage) {
            btn.classList.add("active");
        }
        pageBtnsContainer.appendChild(btn);
    }
    if (endPage < totalPages) {
        const nextPagesBtn = document.createElement("button");
        nextPagesBtn.textContent = "...";
        nextPagesBtn.addEventListener("click", () => {
            currentPage = endPage + 1;
            renderTable();
            updatePagination();
        });
        pageBtnsContainer.appendChild(nextPagesBtn);
    }
}

function exportToExcel() {
    const table = document.getElementById('myTable');
    const rows = table.querySelectorAll('tr');
    const csvContent = [];

    // Add column headers to the CSV content
    const headers = Array.from(rows[0].querySelectorAll('th')).map(header => header.textContent);
    csvContent.push(headers.join(','));

    // Add table data rows to the CSV content
    for (let i = 1; i < data.length; i++) {
        // const rowData = Array.from(rows[i].querySelectorAll('td')).map(cell => cell.textContent);
        // csvContent.push(rowData.join(','));
        csvContent.push(Object.values(data[i]).join(','));
    }

    // Create a Blob object from the CSV content
    const csvData = csvContent.join('\n');
    const blob = new Blob([csvData], { type: 'text/csv;charset=utf-8;' });

    // Create a temporary link and trigger the download
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const dateTimeString = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    link.download = 'イベント一覧' + dateTimeString + '.csv';
    link.style.display = 'none';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function handleSelectChange() {
    rowsPerPage = parseInt(select.value);
    currentPage = 1;
    renderTable();
    updatePagination();
}

const select = document.getElementById("sel_pagenumber");
select.innerHTML =
    '<option value="5">5</option><option value="10">10</option><option value="20">20</option>';
select.addEventListener("change", handleSelectChange);

const exportBtn = document.getElementById("exportBtn");
exportBtn.addEventListener("click", exportToExcel);

prevBtn.addEventListener("click", () => {
    currentPage--;
    renderTable();
    updatePagination();
});

nextBtn.addEventListener("click", () => {
    currentPage++;
    renderTable();
    updatePagination();
});

var currentDate = new Date();
var formattedDate = currentDate.toISOString().slice(0, 10);
document.getElementById("dateInput").value = formattedDate;

function event_detail(event_id) {
    window.location.href = "index.php?action=event_detail&event_id=" + event_id;
}
function attenders(event_id) {
    window.location.href = "index.php?action=oganizer_participants&event_id=" + event_id;
}

function regist_event() {
    window.location.href = "index.php?action=event_regist";
}

$(document).ready(function () {
    // Your code here
    $.ajax({
        url: 'index.php',
        type: 'POST',
        data: {
            action: "get_eventlist",
        },
        success: function (response) {
            let res = JSON.parse(response);
            if (res.state == "success") {
                let no = 1;
                res.data.forEach((item) => {
                    item.no = no;
                    item.num_attend = no;
                    item.clicks = no;
                    item.favorites = no;
                    data.push(item);
                    no++;
                });
                renderTable();
                updatePagination();
            }
        },
        error: function (xhr, status, error) {
            // Handle error
            console.log('Error:', error);
        }
    });
});
