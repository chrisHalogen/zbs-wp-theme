// Run if you can detect mobile menu header
if (document.getElementById("mobile-menu-toggle")) {
  let child = document.getElementById("mobile-menu-toggle");
  let parent = child.parentElement;

  child.addEventListener("click", function () {
    parent.classList.toggle("active");
  });

  let parent_menu = document.querySelector(
    ".mobile-menu nav > ul > li > a:not(:only-child)"
  );
  //   let sub_menu = parent_menu.querySelector("a:not(:only-child) + ul");
  parent_menu.addEventListener("click", function () {
    parent_menu.nextElementSibling.classList.toggle("open");
    console.log("ready");
  });
  //   console.log(sub_menu);
}
