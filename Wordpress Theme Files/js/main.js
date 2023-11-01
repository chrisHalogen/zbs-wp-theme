jQuery(document).ready(function ($) {
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

    let blog_excerpts = document.querySelectorAll("#blog-post-news p");

    for (let index = 0; index < blog_excerpts.length; index++) {
      const element = blog_excerpts[index];
      $clamp(element, { clamp: 4 });
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
    if (window.matchMedia("(min-width: 901px)").matches) {
      let sidebar = new StickySidebar("#right-sidebar", {
        containerSelector: ".inner-container",
        innerWrapperSelector: ".sidebar-content",
        topSpacing: 60,
        bottomSpacing: 60,
      });
    }
  }

  if (document.getElementsByClassName("bod-tabs")[0]) {
    let executives = document.getElementsByClassName("executive");
    let details = document.getElementsByClassName("executive-details");

    function openContent(count) {
      // Hide all details
      for (let index = 0; index < details.length; index++) {
        const element = details[index];
        element.classList.remove("active");
      }

      // Get all elements with class="executive" and remove the class "active"
      for (let index = 0; index < executives.length; index++) {
        const element = executives[index];
        element.classList.remove("active");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      executives[count].classList.add("active");
      details[count].classList.add("active");
    }

    for (let count = 0; count < executives.length; count++) {
      executives[count].addEventListener("click", function () {
        openContent(count);
      });
    }
  }

  if (document.getElementById("hero-slider")) {
    const myslide = document.querySelectorAll(".myslide"),
      dot = document.querySelectorAll(".dot");

    let counter = 1;

    slidefun(counter);

    let timer = setInterval(autoSlide, 8000);

    function autoSlide() {
      counter += 1;
      slidefun(counter);
    }

    function plusSlides(n) {
      counter += n;
      slidefun(counter);
      resetTimer();
    }

    function currentSlide(n) {
      counter = n;
      slidefun(counter);
      resetTimer();
    }

    function resetTimer() {
      clearInterval(timer);
      timer = setInterval(autoSlide, 8000);
    }

    function slidefun(n) {
      let i;
      for (i = 0; i < myslide.length; i++) {
        myslide[i].style.display = "none";
      }
      for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
      }
      if (n > myslide.length) {
        counter = 1;
      }
      if (n < 1) {
        counter = myslide.length;
      }
      myslide[counter - 1].style.display = "block";
      dot[counter - 1].className += " active";
    }

    document
      .getElementsByClassName("prev")[0]
      .addEventListener("click", () => plusSlides(-1));

    document
      .getElementsByClassName("next")[0]
      .addEventListener("click", () => plusSlides(1));

    for (let index = 0; index < dot.length; index++) {
      const single = dot[index];

      single.addEventListener("click", () => currentSlide(index + 1));
    }
  }

  if (document.getElementsByClassName("search-form")[0]) {
    let forms = document.getElementsByClassName("search-form");

    for (let i = 0; i < forms.length; i++) {
      const single_form = forms[i];

      single_form.addEventListener("submit", function (e) {
        e.preventDefault();

        let term = single_form.querySelector("#search-term").value;

        let url = `${script_data.search_url}${encodeURIComponent(term)}`;

        // console.log(url);

        window.location.assign(url);
      });
    }
  }

  if (document.getElementById("desktop-search")) {
    let close_icon = document.querySelector(".desktop-search > i");

    let parent = document.querySelector(".desktop-search");

    document
      .getElementById("search-icon-desktop")
      .addEventListener("click", toggle_search);

    close_icon.addEventListener("click", toggle_search);

    function toggle_search() {
      parent.classList.toggle("active");
    }
  }
});
