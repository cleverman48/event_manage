const data = [
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "ddd Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "eee Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 },
  { no: 1, event_id: "John Doe", start_time: 25,event_name:"ddd",attended_num:10,attenders:20,state:"finished",clicks:30,favorites:20 }
];

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

  let tableHTML = "<table>";
  tableHTML += `<tr><th>番号</th><th>イベントID</th><th>開催日時</th><th>イベント名</th><th>参加数</th><th>人数</th><th>状況</th>
  <th>クリック数</th><th>お気に入り数</th><th>詳細</th><th>参加者一覧</th></tr>`;
  currentData.forEach((item) => {
    tableHTML += `<tr><td>${item.no}</td><td>${item.event_id}</td><td>${item.start_time}</td><td>${item.event_name}</td><td>${item.attended_num}</td><td>${item.attenders}</td><td>${item.state}</td>
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
  // Use a library like SheetJS to generate an Excel file
  alert("ddfdf");
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

// Initial rendering
renderTable();
updatePagination();

var currentDate = new Date();
var formattedDate = currentDate.toISOString().slice(0, 10);
document.getElementById("dateInput").value = formattedDate;

function event_detail(event_id)
{
    alert(event_id);
}
function attenders(event_id)
{
    alert(event_id);
}

function regist_event()
{
    window.location.href = "index.php?action=event_regist";
}