const addToCartButton = document.getElementById("cart-add-button");

if(addToCartButton){
    addToCartButton.addEventListener("click", addToCart);
}

const searchInput = document.getElementById("keyword");
const resultsDiv = document.getElementById("results");
searchInput.addEventListener("input", searchByKeyword);


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

function searchByKeyword(event){
    let keyword = event.currentTarget.value;

    if (keyword.length < 2){
        resultsDiv.innerHTML = "";
        return;
    }

    let url = event.currentTarget.dataset.ajaxUrl;
    axios.get(url, {params: {keyword: keyword}})
        .then(function(response){
            resultsDiv.innerHTML = "";
            response.data.cats.forEach(cat => {
                let link = document.createElement('a');
                link.href = cat.url;
                link.innerHTML = cat.name;

                resultsDiv.appendChild(link);
            });
        });
}