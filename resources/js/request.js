var form_get = document.getElementById('get-form');
var form_post = document.getElementById('post-form');
var form_update = document.getElementById('update-form');
var form_delete = document.getElementById('delete-form');
var site_frame = document.getElementById('site-frame');
const site_frame_url = site_frame.src;
const token = document.querySelector('meta[name="csrf-token"]').content;

/* API GET Request */
form_get.addEventListener('submit', function (e) {
  e.preventDefault();
  fetchRequest('GET', '', this.url.value, this.frame);
});
/* API POST Request */
form_post.addEventListener('submit', function (e) {
  e.preventDefault();
  var parameters = {'title': this.title.value, 'content': this.content.value};
  fetchRequest('POST', parameters, this.url.value, this.frame);
});
/* API PATCH Request */
form_update.addEventListener('submit', function (e) {
  e.preventDefault();
  var parameters = {'title': this.title.value, 'content': this.content.value};
  fetchRequest('PATCH', parameters, this.url.value, this.frame);
});
/* API DELETE Request */
form_delete.addEventListener('submit', function (e) {
  e.preventDefault();
  fetchRequest('DELETE', '', this.url.value, this.frame);
});

/* Fetch & Send result to the DOM */
function fetchRequest(requestMethod, parameters, url, frame) {
  const options = {
    method: requestMethod,
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": token
    }
  };
  if (requestMethod != 'GET') {
    options.body = JSON.stringify(parameters)
  }

  fetch(url,
    options
  ).then(response => {
    if (!response.ok) {
      frame.innerHTML = JSON.stringify({
        'fail': 'Something went wrong',
      }, undefined, 2)
      throw Error(response.statusText);
    }
    return response;
  }).then(response => {
    response.json().then(data => {
      frame.innerHTML = JSON.stringify(data, undefined, 2);
      site_frame.src = site_frame_url;
    })
  }).catch(error => {
    console.log(error);
  })
}
