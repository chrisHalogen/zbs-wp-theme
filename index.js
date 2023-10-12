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
  // console.log(sub_menu);
}

// Clamping the texts
if (document.getElementById("blog-post-news")) {
  // Clamping the texts
  let blog_excerpts = document.getElementsByClassName("excerpt");

  for (let index = 0; index < blog_excerpts.length; index++) {
    const element = blog_excerpts[index];
    $clamp(element, { clamp: 6 });
  }

  // Rotating Blog Images
  let featured_images = document.querySelectorAll(".featured-image img");

  for (let index = 0; index < featured_images.length; index++) {
    const element = featured_images[index];

    // play normal
    element.addEventListener("mouseover", () => {
      element.classList.add("active");
    });

    // play in reverse
    element.addEventListener("mouseout", () => {
      //element.style.opacity = 0; // avoid showing the init style while switching the 'active' class

      element.classList.add("in-active");
      element.classList.remove("active");

      // force dom update
      setTimeout(() => {
        element.classList.add("active");
        element.style.opacity = "";
      }, 5);

      element.addEventListener("animationend", onanimationend);
    });

    function onanimationend() {
      element.classList.remove("active", "in-active");
      element.removeEventListener("animationend", onanimationend);
    }
  }

  // let item = document.querySelector(".item");

  // // play normal
  // item.addEventListener("mouseover", () => {
  //   item.classList.add("active");
  // });

  // // play in reverse
  // item.addEventListener("mouseout", () => {
  //   item.style.opacity = 0; // avoid showing the init style while switching the 'active' class

  //   item.classList.add("in-active");
  //   item.classList.remove("active");

  //   // force dom update
  //   setTimeout(() => {
  //     item.classList.add("active");
  //     item.style.opacity = "";
  //   }, 5);

  //   item.addEventListener("animationend", onanimationend);
  // });

  // function onanimationend() {
  //   item.classList.remove("active", "in-active");
  //   item.removeEventListener("animationend", onanimationend);
  // }
}

if (document.getElementById("sidebar-content")) {
  let sidebar = document.getElementsByClassName("sidebar")[0];
  let sidebar_content = document.getElementsByClassName("sidebar-content")[0];

  window.onscroll = () => {
    let scrollTop = window.scrollY; // current scroll position
    let viewportHeight = window.innerHeight; //viewport height
    let contentHeight = sidebar_content.getBoundingClientRect().height; // current content height
    let sidebarTop = sidebar.getBoundingClientRect().top + window.pageYOffset; //distance from top to sidebar

    // if (scrollTop >= contentHeight - viewportHeight + sidebarTop) {
    //   sidebar_content.style.transform = `translateY(-${
    //     contentHeight - viewportHeight + sidebarTop
    //   }px)`;
    //   sidebar_content.style.position = "fixed";
    // } else {
    //   sidebar_content.style.transform = "";
    //   sidebar_content.style.position = "";
    // }
  };
}
