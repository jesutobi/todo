// const token = localStorage.getItem("token");
// // console.log(token);
// const todoDetails = "";
// // JavaScript code to extract and use the URL
// const url = window.location.href;
// // console.log(url); // Output: The current URL of the page

// // Extracting the ID from the URL
// const params = new URLSearchParams(new URL(url).search);
// const id = params.get("id");
// // console.log(id); // Output: The value of the "q" parameter in the URL
// const data = {
//   // token: token,
//   todoId: id,
// };

// function deleteTodo() {
//   fetch("/todo/api/api-delete_todo.php", {
//     method: "POST",
//     body: JSON.stringify(data),
//     headers: {
//       Accept: "application/json",
//       Authorization: "Bearer " + token,
//     },
//   }).then((response) => {
//     response.json().then((json) => {
//       if (json.message) {
//         console.log(json.message);
//         // localStorage.setItem("token", json.token);
//         // localStorage.setItem("userId", json.id);
//         // location.assign("http://localhost/todo");
//       }
//     });
//   });
// }


