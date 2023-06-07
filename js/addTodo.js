let title = document.querySelector("#todo_title");
let description = document.querySelector("#todo_decription");

function submitTodo() {
  const token = localStorage.getItem("token");
  const userID = localStorage.getItem("userId");
  console.log(userID);
  fetch("api/api-add-todo.php", {
    method: "POST",
    body: JSON.stringify({
      title_todo: title.value,
      description_todo: description.value,
      userID: userID,
      submitTodo: true,
    }),

    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      if (json.message) {
        location.assign("http://localhost/todo");
      }
    });
  });
}
