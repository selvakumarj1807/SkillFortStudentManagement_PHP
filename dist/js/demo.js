var my_skins = ["skin-blue", "skin-black", "skin-red", "skin-yellow", "skin-purple", "skin-green"];
$(function () {
  /* For demo purposes */
  var demo = $("<div />").css({
    position: "fixed",
    /*top: "100px",*/
    right: "0",
    background: "#fff",
    "border-radius": "5px 0px 0px 5px",
    padding: "10px 15px",
    "font-size": "16px",
    "z-index": "99999",
    cursor: "pointer",
    color: "#3c8dbc",
    "box-shadow": "0 1px 3px rgba(0,0,0,0.1)"
  }).html("<i class='fa fa-gear'></i>").addClass("no-print");

  var demo_settings = $("<div />").css({
    "padding": "10px",
    position: "fixed",
    top: "70px",
    right: "-250px",
    background: "#fff",
    border: "0px solid #ddd",
    "width": "250px",
    "z-index": "99999",
    "box-shadow": "0 1px 3px rgba(0,0,0,0.1)"
  }).addClass("no-print");
  demo_settings.append(
    "<h4 class='text-light-blue' style='margin: 0 0 5px 0; border-bottom: 1px solid #ddd; padding-bottom: 15px;'>Layout Options</h4>"
    //Fixed layout
    + "<div class='form-group'>"
    + "<div class='checkbox'>"
    + "<label>"
    + "<input type='checkbox' onchange='change_layout(\"fixed\");'/> "
    + "Fixed layout"
    + "</label>"
    + "</div>"
    + "</div>"
    //Boxed layout
    + "<div class='form-group'>"
    + "<div class='checkbox'>"
    + "<label>"
    + "<input type='checkbox' onchange='change_layout(\"layout-boxed\");'/> "
    + "Boxed Layout"
    + "</label>"
    + "</div>"
    + "</div>"
    //Sidebar Collapse
    + "<div class='form-group'>"
    + "<div class='checkbox'>"
    + "<label>"
    + "<input type='checkbox' onchange='change_layout(\"sidebar-collapse\");'/> "
    + "Collapsed Sidebar"
    + "</label>"
    + "</div>"
    + "</div>"
  );
  var skins_list = $("<ul />", { "class": 'list-unstyled' });
  var skin_blue =
    $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
      .append("<a href='#' onclick='change_skin(\"skin-blue\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
        + "<div><span style='display:block; width: 20%; float: left; height: 10px; background: #367fa9;'></span><span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
        + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
        + "<p class='text-center'>Skin Blue</p>"
        + "</a>");
  skins_list.append(skin_blue);
  var skin_black =
    $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
      .append("<a href='#' onclick='change_skin(\"skin-black\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
        + "<div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'><span style='display:block; width: 20%; float: left; height: 10px; background: #fefefe;'></span><span style='display:block; width: 80%; float: left; height: 10px; background: #fefefe;'></span></div>"
        + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
        + "<p class='text-center'>Skin Black</p>"
        + "</a>");
  skins_list.append(skin_black);
  var skin_purple =
    $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
      .append("<a href='#' onclick='change_skin(\"skin-purple\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
        + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-purple-active'></span><span class='bg-purple' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
        + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
        + "<p class='text-center'>Skin Purple</p>"
        + "</a>");
  skins_list.append(skin_purple);
  var skin_green =
    $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
      .append("<a href='#' onclick='change_skin(\"skin-green\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
        + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-green-active'></span><span class='bg-green' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
        + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
        + "<p class='text-center'>Skin Green</p>"
        + "</a>");
  skins_list.append(skin_green);
  var skin_red =
    $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
      .append("<a href='#' onclick='change_skin(\"skin-red\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
        + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-red-active'></span><span class='bg-red' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
        + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
        + "<p class='text-center'>Skin Red</p>"
        + "</a>");
  skins_list.append(skin_red);
  var skin_yellow =
    $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
      .append("<a href='#' onclick='change_skin(\"skin-yellow\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
        + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-yellow-active'></span><span class='bg-yellow' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
        + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
        + "<p class='text-center'>Skin Yellow</p>"
        + "</a>");
  skins_list.append(skin_yellow);

  demo_settings.append("<h4 class='text-light-blue' style='margin: 0 0 5px 0; border-bottom: 1px solid #ddd; padding-bottom: 15px;'>Skins</h4>");
  demo_settings.append(skins_list);

  demo.click(function () {
    if (!$(this).hasClass("open")) {
      $(this).animate({ "right": "250px" });
      demo_settings.animate({ "right": "0" });
      $(this).addClass("open");
    } else {
      $(this).animate({ "right": "0" });
      demo_settings.animate({ "right": "-250px" });
      $(this).removeClass("open");
    }
  });

  $("body").append(demo);
  $("body").append(demo_settings);

  setup();
});

function change_layout(cls) {
  $("body").toggleClass(cls);
  $.AdminLTE.layout.fixSidebar();
}
function change_skin(cls) {
  $.each(my_skins, function (i) {
    $("body").removeClass(my_skins[i]);
  });

  $("body").addClass(cls);
  store('skin', cls);
  return false;
}
function store(name, val) {
  if (typeof (Storage) !== "undefined") {
    localStorage.setItem(name, val);
  } else {
    alert('Please use a modern browser to properly view this template!');
  }
}
function get(name) {
  if (typeof (Storage) !== "undefined") {
    return localStorage.getItem(name);
  } else {
    alert('Please use a modern browser to properly view this template!');
  }
}

function setup() {
  var tmp = get('skin');
  if (tmp && $.inArray(tmp, my_skins))
    change_skin(tmp);
}

const enquiryList = document.getElementById("enquiryList");
const searchInput = document.getElementById("searchInput");
const resetBtn = document.getElementById("resetBtn");
const pagination = document.getElementById("pagination");
const enquiryCount = document.getElementById("enquiryCount");

const allCards = Array.from(enquiryList.querySelectorAll(".card"));
let filteredCards = [];
let currentPage = 1;
const itemsPerPage = 6;

applyFilters();

searchInput.addEventListener("input", applyFilters);
resetBtn.addEventListener("click", () => {
  searchInput.value = "";
  applyFilters();
});

function applyFilters() {
  const term = searchInput.value.toLowerCase();

  filteredCards = allCards.filter(card => {
    const name = card.querySelector("h3").textContent.toLowerCase();
    const enquiryId = card.querySelector(".enquiry-id").textContent.toLowerCase();
    const course = card.querySelector(".course-badge").textContent.toLowerCase();
    const time = card.querySelector("h4").textContent.toLowerCase();

    const startDateDiv = Array.from(card.querySelectorAll(".card-footer div"))
      .find(div => div.textContent.toLowerCase().includes("start date"));
    const endDateDiv = Array.from(card.querySelectorAll(".card-footer div"))
      .find(div => div.textContent.toLowerCase().includes("end date"));

    const joinDateDiv = Array.from(card.querySelectorAll(".card-footer div"))
      .find(div => div.textContent.toLowerCase().includes("join date"));
    const leaveDateDiv = Array.from(card.querySelectorAll(".card-footer div"))
      .find(div => div.textContent.toLowerCase().includes("leave date"));


    const startDate = startDateDiv ? startDateDiv.textContent.toLowerCase() : "";
    const endDate = endDateDiv ? endDateDiv.textContent.toLowerCase() : "";

    const joinDate = joinDateDiv ? joinDateDiv.textContent.toLowerCase() : "";
    const leaveDate = leaveDateDiv ? leaveDateDiv.textContent.toLowerCase() : "";

    return (
      name.includes(term) ||
      enquiryId.includes(term) ||
      course.includes(term) ||
      time.includes(term) ||
      startDate.includes(term) ||
      endDate.includes(term)||
      joinDate.includes(term) ||
      leaveDate.includes(term)
    );
  });

  currentPage = 1;
  render();
}


function render() {
  enquiryList.innerHTML = "";
  const start = (currentPage - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  const paginated = filteredCards.slice(start, end);

  enquiryCount.textContent = filteredCards.length;

  if (paginated.length === 0) {
    enquiryList.innerHTML = "<p>No enquiries found.</p>";
    pagination.innerHTML = "";
    return;
  }

  paginated.forEach(card => enquiryList.appendChild(card));
  renderPagination();
  attachMenuEvents();
}

function renderPagination() {
  pagination.innerHTML = "";
  const totalPages = Math.ceil(filteredCards.length / itemsPerPage);

  if (totalPages <= 1) return;

  const prevBtn = document.createElement("button");
  prevBtn.textContent = "Prev";
  prevBtn.disabled = currentPage === 1;
  prevBtn.onclick = () => {
    currentPage--;
    render();
  };
  pagination.appendChild(prevBtn);

  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button");
    btn.textContent = i;
    if (i === currentPage) btn.classList.add("active");
    btn.onclick = () => {
      currentPage = i;
      render();
    };
    pagination.appendChild(btn);
  }

  const nextBtn = document.createElement("button");
  nextBtn.textContent = "Next";
  nextBtn.disabled = currentPage === totalPages;
  nextBtn.onclick = () => {
    currentPage++;
    render();
  };
  pagination.appendChild(nextBtn);
}

function attachMenuEvents() {
  document.querySelectorAll(".menu-btn").forEach(btn => {
    btn.onclick = (e) => {
      e.stopPropagation();
      document.querySelectorAll(".dropdown-menu").forEach(menu => menu.style.display = "none");
      const menu = btn.nextElementSibling;
      menu.style.display = "flex";
    };
  });

  document.querySelectorAll(".edit-btn").forEach(btn => {
    btn.onclick = (e) => {
      e.stopPropagation();
      alert("Edit clicked for " + btn.closest(".card").querySelector("h3").textContent);
    };
  });

  document.querySelectorAll(".delete-btn").forEach(btn => {
    btn.onclick = (e) => {
      e.stopPropagation();
      alert("Delete clicked for " + btn.closest(".card").querySelector("h3").textContent);
    };
  });
}

// Close menus when clicking outside
document.addEventListener("click", () => {
  document.querySelectorAll(".dropdown-menu").forEach(menu => menu.style.display = "none");
});
