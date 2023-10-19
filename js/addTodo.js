let title = document.querySelector("#todo_title");
let description = document.querySelector("#todo_decription");

function submitTodo() {
  alert("Added succesfully");

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
        document.getElementById("todo_title").value = "";
        document.getElementById("todo_decription").value = "";
        fetchContent();
        // location.assign("http://localhost/todo");
      }
    });
  });
}
