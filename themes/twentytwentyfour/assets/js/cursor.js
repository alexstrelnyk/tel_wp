const cursor = document.querySelector("#cursor");
const cursorBorder = document.querySelector("#cursor-border");
const cursorPos = { x: 0, y: 0 };
const cursorBorderPos = { x: 0, y: 0 };

// FlashLight cursor effect for homepage
var windowWidth = window.innerWidth;
const flashSection = document.querySelector("#top_section");
const flashBlock = document.querySelector(".full-size.floor-2");
const floor3 = document.querySelector(".full-size.floor-3");

document.addEventListener("mousemove", (e) => {
  cursorPos.x = e.clientX;
  cursorPos.y = e.clientY;

  cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
});

function calculateB(A) {
  return 10 + (90 - 30) * (A / 100);
}

requestAnimationFrame(function loop() {
  const easting = 8;
  cursorBorderPos.x += (cursorPos.x - cursorBorderPos.x) / easting;
  cursorBorderPos.y += (cursorPos.y - cursorBorderPos.y) / easting;

  if (flashBlock) {
    var cursorFlashPosX = cursorPos.x / flashSection.offsetWidth * 100;
    var cursorFlashPosY = cursorPos.y / (flashSection.offsetHeight + 80) * 100;
    flashBlock.style = 'background-image: radial-gradient(circle at ' + cursorFlashPosX + '% ' + cursorFlashPosY + '%, rgba(3, 166, 90, 0.3) 0px, rgb(21, 45, 49) 600px)';

    floor3.style = 'background-position: ' + calculateB(cursorFlashPosX) + '% ' + calculateB(cursorFlashPosY) + '%;';
  }

  cursorBorder.style.transform = `translate(${cursorBorderPos.x}px, ${cursorBorderPos.y}px)`;
  requestAnimationFrame(loop);
});

document.querySelectorAll("[data-cursor]").forEach((item) => {
  item.addEventListener("mouseover", (e) => {
    if (item.dataset.cursor === "pointer") {
      cursorBorder.style.backgroundColor = "rgba(255, 255, 255, .6)";
      cursorBorder.style.setProperty("--size", "30px");
    }
    if (item.dataset.cursor === "pointer2") {
      cursorBorder.style.backgroundColor = "white";
      cursorBorder.style.mixBlendMode = "difference";
      cursorBorder.style.setProperty("--size", "80px");
    }
    if (item.dataset.cursor === "slider") {
      cursor.classList.add("slider");
      cursorBorder.classList.add("slider");
    }
    if (item.dataset.cursor === "slider-white") {
      cursor.classList.add("slider-white");
      cursorBorder.classList.add("slider-white");
    }
    if (item.dataset.cursor === "input-text") {
      cursor.classList.add("input-text");
      cursorBorder.classList.add("input-text");
    }
    if (item.dataset.cursor === "active") {
      cursor.classList.add("active");
      cursorBorder.classList.add("active");
    }
    if (item.dataset.cursor === "slider-img") {
      cursor.classList.add("slider-img");
      cursorBorder.classList.add("slider-img");
    }
  });
  item.addEventListener("mouseout", (e) => {
    cursor.classList.remove("slider-img");
    cursorBorder.classList.remove("slider-img");

    cursor.classList.remove("active");
    cursorBorder.classList.remove("active");

    cursor.classList.remove("input-text");
    cursorBorder.classList.remove("input-text");

    cursor.classList.remove("slider-white");
    cursorBorder.classList.remove("slider-white");

    cursor.classList.remove("slider");
    cursorBorder.classList.remove("slider");

    cursorBorder.style.backgroundColor = "unset";
    cursorBorder.style.mixBlendMode = "unset";
    cursorBorder.style.setProperty("--size", "50px");
  });
});
