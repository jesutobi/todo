// fetch api
const token = localStorage.getItem("token");
const userId = localStorage.getItem("userId");
const taskData = '';

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
      if (json.message) {
        console.log(json.data);
        const taskData = json.data;
        //   location.assign("http://localhost/todo");
      }
    });
  });
}

// call the function
fetchContent();
