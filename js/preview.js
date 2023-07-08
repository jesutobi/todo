const token = localStorage.getItem("token");
if (!token) {
  // Redirect to login page or display an error message
  window.location.href = "/todo/authentication/login.php";
}
console.log(token);
const todoDetails = "";
// JavaScript code to extract and use the URL
const url = window.location.href;
console.log(url); // Output: The current URL of the page

// Extracting the ID from the URL
const params = new URLSearchParams(new URL(url).search);
const id = params.get("id");
console.log(id); // Output: The value of the "q" parameter in the URL
const data = {
  // token: token,
  todoId: id,
};

function fetchContent() {
  fetch("api/api-preview-todo.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      if (json.data) {
        const todoDetails = json.data;
        console.log(todoDetails);

        const todoDetailsHtml = `

                        <!-- title of task -->
                        <div class="text-3xl text-[#fbc72e]">
                            <h1>${todoDetails.task}</h1>

                        </div>
                        <!-- created at -->
                        <div class="py-2">
                            <!-- title -->
                            <div class="py-1 text-sm font-semibold">
                                <h6>created at</h6>
                            </div>
                            <!-- date -->
                            <div class="text-gray-500 py-1 text-xs">
                                <span>${todoDetails.task_date}</span>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="text-sm leading-relaxed ">
                            <p>${todoDetails.descriptions}</p>
                        </div>
                        `;
        document.getElementById("detailsContainer").innerHTML = todoDetailsHtml;
      }
    });
  });
}

fetchContent();
