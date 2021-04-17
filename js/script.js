// The below function is to show and hide description on click
$(document).ready(function() {
    $(".prod-desc").hide();
    $(".show_hide").on("click", function() {
        var txt = $(".prod-desc").is(":visible") ?
            "Read Description" :
            "Hide Description";
        $(".show_hide").text(txt);
        $(this).next(".prod-desc").slideToggle(200);
    });
});

//this function is to get our product values using eventListener (click on add to cart button).
(function() {
    //Get all list of selectors which cotains the (add-to-cart) class
    const AddToCart = document.querySelectorAll(".add-to-cart");
    //Looping through all the selectors
    AddToCart.forEach(function(btn) {
        //We add our eventListner (when button is clicked)
        btn.addEventListener("click", function(event) {
            if (event.target.classList.contains("add-to-cart")) {
                /*Now, we will go throug our element inside the parent 
                div and get the required values and text content based on our need.
                For example, for now we only need image, title, price and id.
                */
                let pr_src = event.target.parentElement.children[0].src;

                let pr_title =
                    event.target.parentElement.children[2]
                    .textContent;

                let pr_price =
                    event.target.parentElement.children[6]
                    .textContent;

                let pr_id =
                    event.target.parentElement.children[7]
                    .textContent;

                //Now, we add our received items to and array
                let ProdArr = [pr_src, pr_title, pr_price];
                //Display our Array items in console
                console.log(ProdArr);

                //Here we need to pass our product details to the modal
                $(".modal-prod-img").attr("src", pr_src);

                let prodName = "Product:  " + pr_title;
                document.getElementById(
                    pr_title
                ).textContent = prodName;

                let prodPrice = "Price:  $" + pr_price;
                document.getElementById(pr_id).textContent = prodPrice;
            }
        });
    });
})();