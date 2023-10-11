// Run if you can detect mobile menu header
if (document.getElementById("mobile-menu-toggle")) {
  let child = document.getElementById("mobile-menu-toggle");
  let parent = child.parentElement;
  let close_icon = document.getElementById("close-icon-icon");
  let panel = document.getElementById("mobile-menu-panel");

  child.addEventListener("click", toggleMenu);
  close_icon.addEventListener("click", toggleMenu);

  function toggleMenu() {
    parent.classList.toggle("active");
    panel.classList.toggle("open");
  }

  let parent_menu = document.querySelector(
    ".mobile-menu nav > ul > li > a:not(:only-child)"
  );
  //   let sub_menu = parent_menu.querySelector("a:not(:only-child) + ul");
  parent_menu.addEventListener("click", function () {
    parent_menu.nextElementSibling.classList.toggle("open");

    if (parent_menu.nextElementSibling.classList.contains("open")) {
      parent_menu.nextElementSibling.style.maxHeight =
        parent_menu.nextElementSibling.scrollHeight + "px";
    } else {
      parent_menu.nextElementSibling.style.maxHeight = "0";
    }
  });
  //   console.log(sub_menu);
}
