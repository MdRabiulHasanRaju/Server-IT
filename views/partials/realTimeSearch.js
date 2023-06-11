const getID = (id) => document.getElementById(id);
let search = getID("searchid");
let showsearch = getID("showsearch");
let realtimesearch = getID("realtimesearch");

const searchHandler = (e) => {
  let value = search.value;
  let data = `searchValue=${value}`;

  runSpinner()

  let ajax = new XMLHttpRequest();

  ajax.open("POST", "/serverit/controllers/realTimeSearchController.php", true);

  function runSpinner() {
    showsearch.innerHTML =
      "<i style='font-size:30px;text-align:center;width:100%;' class='fas fa-spinner fa-spin'></i>";
    realtimesearch.style.display = "block";
  }

  ajax.onprogress = function () {
    showsearch.innerHTML = "<i class='fas fa-spinner fa-spin'></i>";
  };

  ajax.onload = function () {
    if (this.status === 200) {
      showsearch.innerHTML = this.responseText;
    }
  };

  if (value.length === 0) {
    realtimesearch.style.display = "none";
  }

  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  ajax.send(data);
};
search.addEventListener("input", searchHandler);
