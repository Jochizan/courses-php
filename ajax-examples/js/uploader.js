const d = document;

const $main = d.querySelector('main');
const $files = d.getElementById('files');

const uploader = (file) => {
  // console.log(file);
  const xhr = new XMLHttpRequest();
  const formData = new FormData();

  formData.append('file', file);

  xhr.addEventListener('readystatechange', (e) => {
    if (xhr.readyState !== 4) return;

    if (xhr.status >= 200 && xhr.status < 300) {
      let json = JSON.parse(xhr.responseText);
      console.log(json);
    } else {
      let message = xhr.statusText || 'Ocurrió un error';
      console.error(`Error ${xhr.status}: ${message}`);
    }
  });

  xhr.open('POST', 'assets/uploader.php');
  xhr.setRequestHeader('enc-type', 'multipart/form-data');
  xhr.send(formData);
};

d.addEventListener('change', (e) => {
  if (e.target == $files) {
    console.log(e.target.files);

    const files = Array.from(e.target.files);

    files.forEach((el) => uploader(el));
  }
});
