const addToCartButton = document.getElementById("cart-add-button");
const searchInput = document.getElementById("search");

if(addToCartButton){
    addToCartButton.addEventListener("click", addToCart);
}

searchInput.addEventListener("input", onSearchHandler);

function addToCart(event) {
    let catId = event.currentTarget.dataset.catId;
    let url = event.currentTarget.dataset.ajaxUrl;
    axios.post(url, {
        id: catId
    })
        .then(function (response) {
            console.log(response);
        });
}

function onSearchHandler(event) {

    if(event.target.value.length >= 2){
        let url = event.currentTarget.dataset.ajaxUrl;

        axios.post(url, {
            content: event.target.value
        })
        .then(function (response) {
            console.log(response);
            for (i = 0; i < response.data.results.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function (e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
    }
}