const getID = (id) => document.getElementById(id);
const formData = (input) => input.value;

let contactSubmit = getID("contactSubmit");
let resubmit = getID("resubmit");
let formID = getID("formID");
let all_input = [...(document.getElementsByClassName('form-control'))];

let spinner = getID("spinner");
let successMessage = getID("successMessage");
let alertMessage = getID("alertMessage");

const admissionFormHandler = (e) => {
    e.preventDefault();
    runSpinner();

    let customerName = getID("customerName").value;
					
    let email = getID("email").value;
    
    let mobile = getID("mobile").value;
    
    let courseName = getID("courseName").value;

    let ajax = new XMLHttpRequest();

    ajax.open('POST','/serverit/controllers/generalAdmissionController.php',true);

    function runSpinner() {
        spinner.style.display = "block";
        contactSubmit.style.display = "none";
        successMessage.style.display = "none";
        resubmit.style.display = "none";
    }

    function showResubmit() {
        spinner.style.display = "none";
        contactSubmit.style.display = "none";
        successMessage.style.display = "none";
        resubmit.style.display = "block";
    }

    function success() {
        successMessage.style.display = "block";
        contactSubmit.style.display = "none";
        spinner.style.display = "none";
        resubmit.style.display = "none";
    }

    ajax.onprogress = function(){
        runSpinner();
    }

    ajax.onload = function(){
        if(ajax.status==200){
            success();
            let obj = JSON.parse(this.responseText);
            alertMessage.innerHTML = obj.success;
            alertMessage.style.color = '#1578c1';
            alertMessage.style.fontWeight = 'bold';
            alertMessage.style.fontSize = '13px';
            all_input.map((data)=>{
                data.value=""
            })
        }
        if(ajax.status==403){
            console.log(this.responseText)
            let obj = JSON.parse(this.responseText);
            alertMessage.innerHTML = obj.err;
            alertMessage.style.color = 'red';
            alertMessage.style.fontWeight = 'bold';
            alertMessage.style.fontSize = '12px';
            showResubmit();
        }
    }

    ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    let data = 'name='+customerName+'&email='+email+'&mobile='+mobile+'&getCourseName='+courseName;

    ajax.send(data);
 
};
  
formID.addEventListener("submit", admissionFormHandler);
