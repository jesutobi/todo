// gettin token from local storage
const token = localStorage.getItem("token");
const userId = localStorage.getItem("userId");
if (!token) {
  // Redirect to login page or display an error message
  window.location.href = "/todo/authentication/login.php";
}
// initiallizing the variable
const todoDetails = "";

// JavaScript code to extract and use the URL
const url = window.location.href;

// Extracting the ID from the URL
const params = new URLSearchParams(new URL(url).search);
const id = params.get("id");
// console.log(id); // Output: The value of the "q" parameter in the URL

const data = {
  todoId: id,
};

function updateContent() {
  // getting value from input space

  fetch("/todo/api/api-update-todo.php", {
    method: "POST",
    body: JSON.stringify({
      // titleValue: titleValue,
      // description: descriptionValue,
      userID: userId,
      todoId: id,
      fetchContent: true,
    }),
    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      if (json.data) {
        const todoUpdate = json.data;

        document.getElementById("title").value = todoUpdate.task;
        document.getElementById("description").value = todoUpdate.descriptions;
      }
    });
  });
}

function submitUpdate() {
  alert("Updated succesfully");
  const titleValue = document.getElementById("title").value;
  const descriptionValue = document.getElementById("description").value;
  // console.log(titleValue);
  // console.log("working");
  fetch("/todo/api/api-updateButton-todo.php", {
    method: "POST",
    body: JSON.stringify({
      titleValue: titleValue,
      description: descriptionValue,
      userID: userId,
      todoId: id,
      updateContent: true,
    }),
    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      if (json.message) {
        location.assign("/todo");
      }
    });
  });
}

updateContent();
