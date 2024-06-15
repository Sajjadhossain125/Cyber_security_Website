import { coursesData } from "./data.js";
const loading = document.getElementById("loading-container");
const show_loader = () => {
  if (loading) loading.style.display = "flex";
}
const hide_loader = () => {
  if (loading) loading.style.display = "none";
}
show_loader();


async function getData(params) {
  try {
    const url = location.href;
    const params = new URL(url);
    const courseId = params.searchParams.get("id");
    if(!courseId) throw new Error("id is required.")
    const API_END_POINT = `http://localhost/test/Cyber/api/course-details.php?id=${courseId}&fields=related_courses`;
    const data = await fetch(API_END_POINT).then((res) => res.json());
    return data;
  } catch (error) {

  } finally {
    hide_loader();
  }

}


function section_course_title(course={}) {
  const courseTitle = document.querySelector(".course_title");
  if (course) {
    const { name, short_desc, rating, reviews, students, instructor } = course;
    courseTitle.innerHTML = `<div class="course_summary">
<p class="breadcrumbs">
  <i class="fa-solid fa-house"></i>
  <a class="link" href="index.php">Home</a> > course-details
</p>
<h2>${name}</h2>
<p class="description">
  ${short_desc}
</p>
<span class="grad"></span>
<div class="flex_ratings">
  <p class="bestseller">Bestseller</p>
  <p>
    ${rating}
    <span class="icon_list"
      ><i class="fa-solid fa-star"></i
      ><i class="fa-solid fa-star"></i
      ><i class="fa-solid fa-star"></i
      ><i class="fa-solid fa-star"></i
      ><i class="fa-regular fa-star"></i
    ></span>
  </p>
  <p class="rating">${reviews} rating</p>
  <p class="students">${students} students</p>
</div>
<div class="instructor">
  <img src="./images/hasib.jpg" alt="Instructor" />
  <p>
    By <a href="#">${instructor.name}</a> In
    <a href="#">${instructor.profession}</a>
  </p>
</div>
<div class="valid_info">
  <div class="update">
    <i class="fa-regular fa-calendar"></i>
    <p>Last updated 12/2024</p>
  </div>
  <div class="language">
    <i class="fa-solid fa-globe"></i>
    <p>English</p>
  </div>
  <div class="certified">
    <i class="fa-solid fa-award"></i>
    <p>Certified Course</p>
  </div>
</div>
</div>`;
  } else {
    courseTitle.innerHTML = `<p>Course not found.</p>`;
  }
}

function section_related_courses(relatedCourses=[]) {
  
  if(!Array.isArray(relatedCourses) && !relatedCourses.length) return null;

  const relatedCoursesContent = document.querySelector(".related_courses_content");
  relatedCoursesContent.innerHTML =relatedCourses
  .map((relatedCourse) => {
    const { id, image, name, subtitle, rating, reviews, instructor } =
      relatedCourse;
    return `<div class="related-courses_body more-course_body">
<div class="related-courses_image more-course_image">
<img
  src=${image}
  alt="Courses"
  class="image"
/>
</div>
<div class="related-courses_details more-course_details">
<h5>${name}</h5>
<p class="small">${subtitle}</p class="small">
<div class="related-courses_instructor course_instructor">
  <img src=${instructor.image} alt="Instructor" />
  <p>${instructor.name}</p>
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
<h6>$12.99 <span class="strike">$47.99</span></h6>
<a href="./course-details.php?id=${id}" class="details_btn">Details &#8594;</a>
</div>
</div>
</div>`;
  })
  .join("");
  console.log(relatedCourses)
}

// document.querySelector(".total_rating-value h2").innerHTML = average_rating;
document.addEventListener("DOMContentLoaded",async function () {

  const data = await getData();
  if(!data) console.log("No Data");
  const {related_courses,instructor_profile,...course}=data;
  section_course_title(course);
  section_related_courses(related_courses);

  const loadCourseDetails = () => {
    const courseId = "4"
    // showing single course based on id
    const course = coursesData.find((c) => c.id.toString() === courseId);

    // filtering all courses of instructor
    const instructorCourses = coursesData.filter(
      (filteredData) => filteredData.instructor.name === course.instructor.name
    );
    // console.log(instructorCourses);
    const courseContainer = document.querySelector(".course_container");

    if (course) {
      const {
        image,
        learningThings,
        instructor,
        courseContent,
        requirements,
        requireDesc,
        price,
        offPrice,
        skillL,
        enroll,
        lectures,
        quizzes,
        passPercent,
      } = course;
      courseContainer.innerHTML = `<article class="course_outline">
    <div class="course_image">
      <img
        src= ${image}
        alt="Course Banner"
      />
    </div>

    <!-- What you'll learn -->
    <div class="learnings">
      <div class="learning_body">
        <div class="learning_content"><h5>What you'll learn</h5>
          <hr
            style="
              border: none;
              height: 2px;
              background-color: rgba(255, 253, 253, 0.4);
              margin: 1.3rem 0;
            "
          />
          <p class="top_desc">
            ${learningThings.desc1}
          </p>
          <div class="speciality">
            <ul>
              ${learningThings.facilities1
          .map((facility) => {
            return `<li>
                <i class="fa-solid fa-check"></i>
                <p>
                  ${facility.faci}
                </p>
              </li>`;
          })
          .join("")}
            </ul>
            <ul>
              ${learningThings.facilities2
          .map((facility) => {
            return `<li>
                <i class="fa-solid fa-check"></i>
                <p>
                  ${facility.faci}
                </p>
              </li>`;
          })
          .join("")}
            </ul>
          </div>
          <p>
            ${learningThings.desc2}
          </p></div>
        <a class="show_more"> <span class="down"><i class="fa-solid fa-angle-down"></i></span><span class="up"><i class="fa-solid fa-angle-up"></i></span></a>
      </div>     
    </div>

    <!-- Course Content -->
    <div class="course_content">
      <div class="course_accordion">
        <h5>Course Content</h5>
        <hr
          style="
            border: none;
            height: 2px;
            background-color: rgba(255, 253, 253, 0.4);
            margin: 1.3rem 0;
          "
        />
        <div class="accordion_content">
          <h6 clas>Intro to Course</h6>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 1.3rem 0;
            "
          />
          <p>
            ${courseContent.intro}
          </p>
        </div>
        <div class="accordion_content">
          <h6>Course Fundamentals</h6>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 1.3rem 0;
            "
          />
          <p>
            ${courseContent.fundamentals}
          </p>
        </div>
        <div class="accordion_content">
          <h6>You can develop skill and setup</h6>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 1.3rem 0;
            "
          />
          <p>
            ${courseContent.skill}
          </p>
        </div>
        <div class="accordion_content">
          <h6>Course Description</h6>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 1.3rem 0;
            "
          />
          <p>
            ${courseContent.courseDesc}
          </p>
        </div>
      </div>
    </div>

    <!-- Requirements and Description -->
    <div class="requirements_and_desc">
      <div class="requirements_and_desc_body">
        <div class="requirements">
          <h5>Requirements</h5>
          <hr
            style="
              border: none;
              height: 2px;
              background-color: rgba(255, 253, 253, 0.4);
              margin: 1.3rem 0;
            "
          />
          <ul>
            ${requirements
          .map((requirement) => {
            return `<li>
            <i class="fa-solid fa-check"></i>
            <p>
              ${requirement.require}
            </p>
          </li>`;
          })
          .join("")}
        </ul>
        </div>
        <div class="description">
          <h5>Description</h5>
          <hr
            style="
              border: none;
              height: 2px;
              background-color: rgba(255, 253, 253, 0.4);
              margin: 1.3rem 0;
            "
          />
          <ul>
            ${requireDesc
          .map((description) => {
            return `<li>
            <i class="fa-solid fa-check"></i>
            <p>
            ${description.desc}
          </p>
           </li>`;
          })
          .join("")}
      </ul>
        </div>
      </div>
    </div>

    <!-- Instructor -->
    <div class="instructor_container">
      <div class="instructor_body">
        <h5>Instructor</h5>
        <hr
          style="
            border: none;
            height: 2px;
            background-color: rgba(255, 253, 253, 0.4);
            margin: 1.3rem 0;
          "
        />
        <div class="instructor_content">
          <img src=./images/sajjad.jpg alt="Instructor" />
          <div class="identity">
            <h5>${instructor.name}</h5>
            <p>${instructor.profession}</p>
            <div class="bio_ranking">
              <p class="reviews">
                <i class="fa-solid fa-star"></i>${instructor.reviews} Reviews
              </p>
              <p class="rating">${instructor.rating} Rating</p>
              <p class="students">
                <i class="fa-solid fa-user-group"></i>${instructor.students
        } Students
              </p>
              <p class="courses">
                <a href="#"
                  ><i class="fa-solid fa-video"></i> ${instructor.courses
        } Courses</a
                >
              </p>
            </div>
            <p class="desc">
            ${instructor.title}
            </p>
            <div class="socials">
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Review -->
    <div class="review_container">
      <div class="review_body">
        <h5>Review</h5>
        <hr
          style="
            border: none;
            height: 2px;
            background-color: rgba(255, 253, 253, 0.4);
            margin: 1.3rem 0;
          "
        />
        <div class="course_rating">
          <div class="total_rating">
            <div class="total_rating-value">
              <h2>5.0</h2>
              <span class="star"
                >&#9733;&#9733;&#9733;&#9733;&#9733;</span
              >
              <p>Course Rating</p>
            </div>
          </div>
          <div class="rating_progress">
            <!-- dynamic from javascript -->
          </div>
        </div>
      </div>
    </div>

    <!-- More Course by Instructor -->
    <div class="more-course">
      <p class="top_course">
        Top Course
      </p>
      <h4>More Course By <span class="name">${instructor.name}</span></h4>
      <div class="more-course_container">
        ${instructorCourses
          .map((instructorCourse) => {
            const { id, name, subtitle, instructor, image, rating, reviews } =
              instructorCourse;
            return `
          <div class="more-course_body">
            <div class="more-course_image">
              <img
                src=${image}
                alt="Courses"
                class="image"
              />
            </div>
            <div class="more-course_details">
                <h5>${name}</h5>
                <p class="small">${subtitle}</p class="small">
                <div class="course_instructor">
                 <img src=${instructor.image} alt="Instructor" />
                  <p>${instructor.name}</p>
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
                <h6>$12.99 <span class="strike">$47.99</span></h6>
                <button data-id="${id}" class="details_btn">Details &#8594;</button>
              </div>
          </div>
          </div>`;
          })
          .slice(0, 3)
          .join("")}
      </div>
  </article>
  <article class="parent_container">
      <div class="course_price-list">
      <div class="price-list_body">
        <div class="course_upper">
          <h6>$${price} <span class="strike">$${offPrice}</span></h6>
          <button class="cart_btn" disabled>Add to Cart</button>
          <button class="enroll-now_btn">Enroll Now</button>
          <p>
            <i class="fa-solid fa-rotate-left"></i> 30-Day Money-Back
            Guarantee
          </p>
        </div>
        <ul class="course_info">
          <li>Start Date<span>5 Hrs 20 Min</span></li>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 0.6rem 0;
            "
          />
          <li>Enrolled<span>${enroll}</span></li>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 0.6rem 0;
            "
          />
          <li>Lectures<span>${lectures}</span></li>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 0.6rem 0;
            "
          />
          <li>Skill Level<span>${skillL}</span></li>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 0.6rem 0;
            "
          />
          <li>Language<span>English</span></li>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 0.6rem 0;
            "
          />
          <li>Quizzes<span>${quizzes}</span></li>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 0.6rem 0;
            "
          />
          <li>Certificate<span>Yes</span></li>
          <hr
            style="
              border: none;
              height: 1px;
              background-color: rgba(255, 253, 253, 0.7);
              margin: 0.6rem 0;
            "
          />
          <li>Pass Percentage<span>${passPercent}</span></li>
        </ul>
      </div>
      <div class="detail_info">
        <div class="social_links">
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <hr
          style="
            border: none;
            height: 1px;
            background-color: rgba(255, 253, 253, 0.2);
            margin: 1.5rem 0;
          "
        />
        <p class="details">For details about the course</p>
        <p class="contact">
          Call Us: <a href="#">+880 1908064229</a>
        </p>
      </div>
    </div>
    </div>
        </article>`;

      // Show more/less functionality
      const showMoreButtons = document.querySelectorAll(".show_more");
      if (showMoreButtons) {
        showMoreButtons.forEach((button) => {
          button.addEventListener("click", () => {
            const learningBody = button.parentNode;
            learningBody.classList.toggle("active_show");
          });
        });
      }

      // For Accordion
      const accordionItems = document.querySelectorAll(".accordion_content");

      accordionItems.forEach((item) => {
        // Listen for clicks on each accordion item
        item.addEventListener("click", function (event) {
          const h6 = item.querySelector("h6");
          if (h6.contains(event.target)) {
            accordionItems.forEach((otherItem) => {
              if (otherItem !== item) {
                otherItem.classList.remove("active");
              }
            });
            item.classList.toggle("active");
          }
        });
      });

      // For Rating Progress Bar
      const data = [
        { star: 5, count: 514 },
        { star: 4, count: 71 },
        { star: 3, count: 312 },
        { star: 2, count: 11 },
        { star: 1, count: 64 },
      ];

      let total_rating = 0;
      let rating_based_on_stars = 0;

      data.forEach((rating) => {
        total_rating += rating.count;
        rating_based_on_stars += rating.count * rating.star;
      });

      const ratingProgressHTML = data
        .map((rating) => {
          const { star, count } = rating;
          const percentage = (count / total_rating) * 100;
          return `
            <div class="rating_progress-value">
              <p>${star}<span class="star">&#9733;</span></p>
              <div class="progress">
                <div class="bar" style="width:${percentage}%"></div>
              </div>
              <p>${percentage.toFixed()}%</p>
            </div>
          `;
        })
        .join("");

      courseContainer.querySelector(".rating_progress").innerHTML =
        ratingProgressHTML;

      // more course details page
      document.querySelectorAll(".details_btn").forEach((button) => {
        button.addEventListener("click", function () {
          const courseId = this.getAttribute("data-id");
          window.location.href = `/course-details.php?id=${courseId}`;
          console.log(window.location.href);
        });
      });
    } else {
      courseContainer.innerHTML = `<p>Course not found.</p>`;
    }

    // Enroll now button
    const enrollBtn = document.querySelector(".enroll-now_btn");
    if (enrollBtn) {
      enrollBtn.addEventListener("click", () => {
        window.location.href = "course-enroll.php";
        console.log(window.location.href);
      });
    }
  };

  loadCourseDetails();
});

document.addEventListener("DOMContentLoaded", function () {
  // get id from url
  const getCourseId = () => {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get("id");
  };

  // related courses functionality
  const loadRelatedCourses = () => {

    // showing single course based on id
    const course = coursesData.find((c) => c.id.toString() === courseId);
    if (!course) {
      console.error("Course not found for the given ID: ", courseId);
      return;
    }

    // filtering all related courses without current id
    const relatedCourses = coursesData.filter(
      (filteredData) => filteredData.id !== course.id
    );
    console.log("Related Courses: ", relatedCourses);

    // console.log(relatedCourses);
    const relatedCoursesContent = document.querySelector(
      ".related_courses_content"
    );

    if (relatedCoursesContent && relatedCourses.length > 0) {
      relatedCoursesContent.innerHTML = `${relatedCourses
        .map((relatedCourse) => {
          const { id, image, name, subtitle, rating, reviews, instructor } =
            relatedCourse;
          return `<div class="related-courses_body more-course_body">
    <div class="related-courses_image more-course_image">
      <img
        src=${image}
        alt="Courses"
        class="image"
      />
    </div>
    <div class="related-courses_details more-course_details">
      <h5>${name}</h5>
      <p class="small">${subtitle}</p class="small">
      <div class="related-courses_instructor course_instructor">
        <img src=${instructor.image} alt="Instructor" />
        <p>${instructor.name}</p>
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
    <h6>$12.99 <span class="strike">$47.99</span></h6>
    <button data-id="${id}" class="details_btn">Details &#8594;</button>
    </div>
    </div>
  </div>`;
        })
        .slice(3, 7)
        .join("")}`;

      // more course details page
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
    } else {
      relatedCoursesContent.innerHTML = `<p>Related courses not found.</p>`;
    }
  };

  // loadRelatedCourses();
});
