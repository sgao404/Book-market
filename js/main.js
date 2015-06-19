/**
 * Created by Sida on 6/19/2015.
 */

function checkForm(form) {
    re = /^\w+$/;

    if (!re.test(form.username.value)) {
        printFail('Error: Username must contain only letters and numbers! Try again!');
        form.username.focus();
        return false;
    }

    if (!re.test(form.password.value)) {
        printFail('Error: Password must contain only letters and numbers! Try again!');
        form.username.focus();
        return false;
    }
};

function printFail(str) {
    document.getElementById("console").innerHTML = "<div class='alert alert-danger'> " +
    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>" +
    "×</button> <h3>" + str +"</h3> </div>";
};

function printSuccess(str) {
    document.getElementById("console").innerHTML = "<div class='alert alert-success'>" +
    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>" +
    "×</button> <h3>" + str +"</h3> </div>";
};

