// fetch api
const token = localStorage.getItem("token");
if (!token) {
  // Redirect to login page or display an error message
  window.location.href = "/todo/authentication/login.php";
}
const userId = localStorage.getItem("userId");
const email = localStorage.getItem("email");
const username = localStorage.getItem("username");

const taskData = "";

// profile dropdown
const dropdown = `
 <!-- username -->
    <div class="py-1">
        <div>
            <span class="text-xs font-semibold">Username</span>
        </div>
        <div>
            <span>${username}</span>
        </div>
    </div>
    <!-- email -->
    <div class="py-1">
        <div>
            <span class="text-xs font-semibold">Email</span>
        </div>
        <div>
            <span>${email}</span>
        </div>
    </div>

`;
document.getElementById("dropdown").innerHTML = dropdown;

// Get the current hour
var currentHour = new Date().getHours();
// Get the greeting based on the current hour
var greeting = "";
if (currentHour >= 5 && currentHour < 12) {
  greeting = "morning";
} else if (currentHour >= 12 && currentHour < 18) {
  greeting = "afternoon";
} else {
  greeting = "evening";
}

// Update the HTML content
document.getElementById("greeting").innerHTML = greeting;

// getting the exact day
// Get the current day of the week
var weekdays = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];
var currentDate = new Date();
var currentDay = weekdays[currentDate.getDay()];

// Update the HTML content
document.getElementById("day").innerHTML = currentDay;

// Format the current date as "M d, Y"
var formattedDate = new Intl.DateTimeFormat("en-US", {
  month: "short",
  day: "numeric",
  year: "numeric",
}).format(currentDate);

// Update the HTML content
document.getElementById("date").innerHTML = formattedDate;

const data = {
  // token: token,
  userId: userId,
};
function fetchContent() {
  fetch("api/api-content-todo.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      if (json.data) {
        const taskData = json.data;

        const data = Object.assign({}, taskData);

        // Loop through the taskData array and use it in your HTML

        let todoHTML = ``;
        for (let key in data) {
          // console.log(data[key]);
          todoHTML += `
            <!-- content-card -->
             <div class="shadow-md p-2 bg-slate-50  h-40 relative rounded-xl">
                 <!-- title -->
                 <div>
                     <h3 class="font-semibold text-xl text-[#fbc72e]">${data[key].task}</h3>
                 </div>
                 <!-- date -->
                 <div class="text-gray-500 py-1 text-xs">
                     <span>${data[key].task_date}</span>
                 </div>

                 <!-- content
                <div>
                    <p class="antialiased font-medium text-sm py-1">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae sed assumenda aspernatur ratione! Debitis sint reiciendis nisi obcaecati, cupiditate deleniti?
                    </p>

                </div> -->
                 <!-- delete and edit icon -->
                 <div class="absolute bottom-0">
                     <div class="flex justify-between  cursor-pointer my-2">
                         <div title="preview" class="px-1">
                             <a href="/todo/previewPage.php?id=${data[key].id}"  >
                                 <svg class="hover:stroke-[#5d5398]" stroke="#292D32"  width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M9 12H15"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M9 15H15"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M17.8284 6.82843C18.4065 7.40649 18.6955 7.69552 18.8478 8.06306C19 8.4306 19 8.83935 19 9.65685L19 17C19 18.8856 19 19.8284 18.4142 20.4142C17.8284 21 16.8856 21 15 21H9C7.11438 21 6.17157 21 5.58579 20.4142C5 19.8284 5 18.8856 5 17L5 7C5 5.11438 5 4.17157 5.58579 3.58579C6.17157 3 7.11438 3 9 3H12.3431C13.1606 3 13.5694 3 13.9369 3.15224C14.3045 3.30448 14.5935 3.59351 15.1716 4.17157L17.8284 6.82843Z"  stroke-width="2" stroke-linejoin="round" />
                                 </svg>
                             </a>
                         </div>
                         <div class="flex ">
                             <!-- edit -->
                             <div class="px-1" title="edit">
                                 <a href="/todo/update.php?id=${data[key].id}" >
                                     <svg class="hover:stroke-[#5d5398]" stroke="#292D32"  width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path  d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                         <path  d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z"  stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                         <path  d="M14.91 4.1499C15.58 6.5399 17.45 8.4099 19.85 9.0899"  stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </a>
                             </div>
                             <!-- delete-->
                              <div class="px-1" title="delete">
                                 <a onclick=" deleteTodo(${data[key].id})" >
                                <svg class="hover:stroke-[#5d5398]" stroke="#292D32"  width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12V17"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 12V17"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 7H20"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                 </a>
                             </div>
                          
                         </div>
                     </div>
                 </div>
             </div>
          `;

          // }
        }
        // Append the taskHtml to your desired element in the DOM
        document.getElementById("tasksContainer").innerHTML = todoHTML;
      }
    });
  });
}
function logout() {
  const response = confirm("Are you sure you want to logout?");

  if (response) {
    fetch("api/api-logout-todo.php", {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        Accept: "application/json",
        Authorization: "Bearer " + token,
      },
    }).then((response) => {
      response.json().then((json) => {
        if (json.message) {
          console.log(json.message);
          localStorage.removeItem("token");
          localStorage.removeItem("userId");
          localStorage.removeItem("email");
          localStorage.removeItem("username");
          location.assign("/todo/authentication/login.php");
        }
      });
    });
  }
}
function deleteTodo(dataId) {
  const data = {
    // token: token,
    todoId: dataId,
  };

  fetch("/todo/api/api-delete_todo.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      if (json.message) {
        // alert
        fetchContent();
      }
    });
  });
}

// call function
// logout();
fetchContent();
