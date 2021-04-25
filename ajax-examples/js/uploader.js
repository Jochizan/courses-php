const d = document;

const $main = d.querySelector('main');
const $dropZone = d.querySelector('.drop-zone');
// const $files = d.getElementById('files');

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

const progressUpload = (file) => {
  const $progress = d.createElement('progress');
  const $span = d.createElement('span');

  $progress.value = 0;
  $progress.max = 100;

  $main.insertAdjacentElement('beforeend', $progress);
  $main.insertAdjacentElement('beforeend', $span);

  const fileReader = new FileReader();
  fileReader.readAsDataURL(file);

  fileReader.addEventListener('progress', (e) => {
    // console.log(e);
    let progress = parseInt((e.loaded * 100) / e.total);
    $progress.value = progress;
    $span.innerHTML = `<b>${file.name} - ${progress}%</b>`;
  });

  fileReader.addEventListener('loadend', (e) => {
    uploader(file);
    setTimeout(() => {
      $main.removeChild($progress);
      $main.removeChild($span);
      // $files.value = '';
    }, 3000);
  });
};

$dropZone.addEventListener('dragover', (e) => {
  // console.log(e);
  e.preventDefault();
  e.stopPropagation();
  e.target.classList.add('is-active');
});

$dropZone.addEventListener('dragleave', (e) => {
  // console.log(e);
  e.preventDefault();
  e.stopPropagation();
  e.target.classList.remove('is-active');
});

$dropZone.addEventListener('drop', (e) => {
  // console.log(e);
  e.preventDefault();
  e.stopPropagation();
  const files = Array.from(e.dataTransfer.files);
  files.forEach((el) => progressUpload(el));
  e.target.classList.remove('is-active');
});

// d.addEventListener('change', (e) => {
//   if (e.target == $files) {
//     console.log(e.target.files);

//     const files = Array.from(e.target.files);

//     files.forEach((el) => progressUpload(el));
//   }
// });
