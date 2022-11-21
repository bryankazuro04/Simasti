const sidebar = document.querySelector(".sidebar__navigation"),
  wrap = document.querySelector(".wrap__navigation"),
  sidebarIcon = document.querySelectorAll(".section__list-header .icon"),
  sectionList = document.getElementsByClassName("section__list"),
  sectionHeader = document.querySelectorAll(".section__list-header.wrap"),
  imgPreview = document.querySelector(".img-preview"),
  imgInput = document.querySelector("#picture");

sidebarIcon.forEach((icon) => {
  icon.addEventListener("click", () => {
    sidebar.classList.remove("hide");
  });
});

wrap.addEventListener("click", () => {
  sidebar.classList.toggle("hide");
});
// =================================================================

function childNav() {
  let itemClass = this.parentNode.className;

  for (i = 0; i < sectionList.length; i++) {
    sectionList[i].className = "section__list hide";
  }

  if (itemClass === "section__list hide") {
    this.parentNode.className = "section__list show";
  }
}

sectionHeader.forEach((list) => {
  list.addEventListener("click", childNav);
});

// =================================================================

function previewImg() {
  const fileGambar = new FileReader();
  fileGambar.readAsDataURL(imgInput.files[0]);

  fileGambar.onload = (e) => {
    imgPreview.src = e.target.result;
  };
}

// =================================================================

$(".btn-change-group").on("click", function () {
  const id = $(this).data("id");

  $(".id").val(id);
  $("#changeGroupModal").modal("show");
});

// =================================================================

$(document).ready(function () {
  $("#table_id").DataTable();
});
