/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

function validation() {
            let password = document.forms["register-form"]["password"].value;
            let confirmPass = document.forms["register-form"]["confirm-password"].value;
            let username = document.forms["register-form"]["username"].value;
            let email = document.forms["register-form"]["email"].value;

            if (password == "" || confirmPass == "" || email == "" || username == "none") {
                alert("Please filled in all the fields!");
            }
            else {

                if (password == confirmPass) {
                    alert("Sucessfully Registered");
                }
                else {
                    alert("Password did not match");
                }
            }
        }

        function postReview() {
            document.getElementById("post-review").style.display = "block";
        }
            
        function hideReview() {
            document.getElementById("post-review").style.display = "none";
         }
         
//<----------    Filter  ----------------->
var filterItems = document.querySelectorAll(".filter li");

// Add click event listeners to the filter items
filterItems.forEach(function(item) {
  item.addEventListener("click", function() {
    // Remove active class from all filter items
    filterItems.forEach(function(item) {
      item.classList.remove("active");
    });

    // Add active class to the clicked filter item
    this.classList.add("active");
  });
});

//<------ End of FIlter ---------->