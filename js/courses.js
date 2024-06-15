import { coursesData } from "./data.js";

// JavaScript code
document.addEventListener("DOMContentLoaded", function () {
  const articles = document.querySelectorAll(".courses_container article");
  articles.forEach(function (article) {
    const courseBodies = article.querySelectorAll(".course_body");
    if (courseBodies.length > 0) {
      courseBodies[courseBodies.length - 1].classList.add("last-course-body");
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // dynamically add data for course body and hover element
  const loadCourses = () => {
    const API_END_POINT = "http://localhost/test/Cyber/api/courses.php";
    fetch(API_END_POINT).then((res)=>res.json())
    .then(data=>{
      const coursesContainer = document.querySelector(".courses_container");
    if (!coursesContainer) return;
    coursesContainer.innerHTML = `${data
      .map((coursesInfo) => {
        const {
          id,
          name,
          subtitle,
          short_desc,
          instructor,
          image,
          price,
          discount,
          instructor_img,
          rating,
          reviews,
        } = coursesInfo;
        return `<article>
      <div class="course_body">
    <div class="course_image">
      <img
        src=${image}
        alt="Courses"
        class="image"
      />
    </div>
    <div class="course_details">
      <h5>${name}</h5>
      <p class="small">${subtitle}</p>
      <div class="instructor">
        <img src=${instructor_img} alt="Instructor" />
        <p>${instructor}</p>
      </div>
      <p>
        ${rating}
        <span class="icon_list"
          ><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i
          ><i class="fa-solid fa-star"></i
          ><i class="fa-regular fa-star"></i
        ></span>
        <span class="total_review">(${reviews})</span>
      </p>
      <div class="item_flex">
      <h6>${price}<span class="strike">${discount}</span></h6>
      <a href="./course-details.php?id=${id}" data-id="${id}" class="details_btn">Details &#8594;</a>
      </div>
    </div>
    <!-- hover element -->
    <div class="hover_element">
      <h5>${name}</h5>
      <p class="small">${subtitle}</p>
      <p>${short_desc}</p>
      <div class="hover_button">
        <button class="btn enroll_now"><a href="course-enroll.php">Enroll Now</a></button>
      </div>
      <div class="select_sign"></div>
      <div class="vector-right1">
        <img src="./images/vector-right1.png" alt="vector" />
      </div>
    </div>
  </div></article>`;
      })
      .join("")}`;
    });

    document.querySelectorAll(".details_btn").forEach((button) => {
      button.addEventListener("click", function () {
        const courseId = this.getAttribute("data-id");
        console.log("Course id: ", courseId);
        const currentUrl = window.location.href;
        console.log("Current Url: ", currentUrl);
        const newUrl = currentUrl.replace(/\/[^\/]*$/, "/course-details.php");
        console.log("New Url: ", newUrl);
        window.location.href = `${newUrl}?id=${courseId}`;
      });
    });

    console.log(window.location.port);

    const enrollBtn = document.querySelectorAll(".enroll_now");
    if (enrollBtn) {
      enrollBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
          window.location.href = "course-enroll.php";
          console.log(window.location.href);
        });
      });
    }
  };

  loadCourses();
});
