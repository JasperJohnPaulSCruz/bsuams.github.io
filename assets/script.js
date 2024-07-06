document.addEventListener('DOMContentLoaded', function() { // For drag and drop image
    let dropArea = document.querySelector('.dropArea');
    let fileInput = document.querySelector('.fileInput');

    dropArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropArea.classList.add('border-4', 'border-solid','border-blue-300');
      });
    
      dropArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropArea.classList.remove('border-4', 'border-solid','border-blue-300');
      });
  
    if(fileInput){
          dropArea.addEventListener('drop', function(e) {
            e.preventDefault();
            dropArea.classList.remove('border-4', 'border-solid','border-green-300');
            fileInput.files = e.dataTransfer.files;
            previewFiles(fileInput.files);
          });

          fileInput.addEventListener('change', function(e) {
            previewFiles(fileInput.files);
          });
        
          function previewFiles(files) {
        
              let file = files[0];
              let reader = new FileReader();
        
              reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('absolute', 'w-full', 'h-full',);
                dropArea.appendChild(img);
              };
        
              reader.readAsDataURL(file);
            
          }
    }
  });

// function validateForm() { // For form validation
//   var fname = document.forms["form"]["fname"].value;
//   var mname = document.forms["form"]["mname"].value;
//   var lname = document.forms["form"]["lname"].value;
//   var idnumber = document.forms["form"]["idnumber"].value;

//   var lettersOnly = /^[A-Za-z]+$/;
//   var numbersOnly = /^[0-9]+$/;

//   console.log(idnumber);
//   console.log(fname);

//   if (!lettersOnly.test(fname)) {
//       document.querySelector('#fname').classList.add('border-4','border-red-300');
//       document.querySelector('#firstname p').classList.remove('opacity-0');
//       return false;
//   }
//   if (!lettersOnly.test(mname)) {
//     document.querySelector('#mname').classList.add('border-4','border-red-300');
//     document.querySelector('#middlename p').classList.remove('opacity-0');
//     return false;
//   }
//   if (!lettersOnly.test(lname)) {
//     document.querySelector('#lname').classList.add('border-4','border-red-300');
//     document.querySelector('#lastname p').classList.remove('opacity-0');
//     return false;
//   }
//   if (!numbersOnly.test(idnumber)) {
//     document.querySelector('#idnumber').classList.add('border-4','border-red-300');
//     document.querySelector('#studentidnumber p').classList.remove('opacity-0');
//     return false;
//   }else{
//     document.querySelector('#idnumber').classList.remove('border-4','border-red-300');
//     document.querySelector('#studentidnumber p').classList.add('opacity-0');
//   }
  
//   return true;
// }

// Add event listeners to input fields for real-time validation
document.addEventListener('DOMContentLoaded', function() {
  var fnameInput = document.forms["form"]["fname"];
  var mnameInput = document.forms["form"]["mname"];
  var lnameInput = document.forms["form"]["lname"];
  var idnumberInput = document.forms["form"]["idnumber"];
  
  fnameInput.addEventListener('input', function() {
    validateFirstName(fnameInput.value);
  });

  mnameInput.addEventListener('input', function() {
    validateMiddleName(mnameInput.value);
  });

  lnameInput.addEventListener('input', function() {
    validateLastName(lnameInput.value);
  });

  idnumberInput.addEventListener('input', function() {
    validateIDNumber(idnumberInput.value);
  });

  document.forms["form"].addEventListener('submit', function(event) {
    if (!validateFirstName(fnameInput.value) || !validateIDNumber(idnumberInput.value)) {
      event.preventDefault(); 
    }
  });
});

// Validation functions
function validateFirstName(fname) {
  var lettersOnly = /^[A-Za-z]+$/;
  var fnameElement = document.querySelector('#fname');
  var fnameErrorElement = document.querySelector('#firstname p');

  if (!lettersOnly.test(fname)) {
    fnameElement.classList.add('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    fnameErrorElement.classList.remove('opacity-0');
    return false;
  } else {
    fnameElement.classList.remove('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    fnameErrorElement.classList.add('opacity-0');
    return true;
  }
}

function validateMiddleName(mname) {
  var lettersOnly = /^[A-Za-z]+$/;
  var fnameElement = document.querySelector('#mname');
  var fnameErrorElement = document.querySelector('#middlename p');

  if (!lettersOnly.test(mname)) {
    fnameElement.classList.add('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    fnameErrorElement.classList.remove('opacity-0');
    return false;
  } else {
    fnameElement.classList.remove('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    fnameErrorElement.classList.add('opacity-0');
    return true;
  }
}

function validateLastName(lname) {
  var lettersOnly = /^[A-Za-z]+$/;
  var fnameElement = document.querySelector('#lname');
  var fnameErrorElement = document.querySelector('#lastname p');

  if (!lettersOnly.test(lname)) {
    fnameElement.classList.add('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    fnameErrorElement.classList.remove('opacity-0');
    return false;
  } else {
    fnameElement.classList.remove('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    fnameErrorElement.classList.add('opacity-0');
    return true;
  }
}

function validateIDNumber(idnumber) {
  var numbersOnly = /^[0-9]+$/;
  var idnumberElement = document.querySelector('#idnumber');
  var idnumberErrorElement = document.querySelector('#studentidnumber p');

  if (!numbersOnly.test(idnumber)) {
    idnumberElement.classList.add('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    idnumberErrorElement.classList.remove('opacity-0');
    return false;
  } else {
    idnumberElement.classList.remove('border-2', 'border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    idnumberErrorElement.classList.add('opacity-0');
    return true;
  }
}



  