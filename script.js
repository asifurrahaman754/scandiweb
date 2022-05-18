function setProductType() {
    //hide all type element
    const allTypes = document.querySelectorAll(".type");
    allTypes.forEach((el) => el.style.display = "none")

    //show only selected element
    const type = document.getElementById("productType").value;
    if (type) {
        const selectedType = document.querySelector(`.${type}`);
        selectedType.style.display = "block";
    }
}

function validateForm() {
    //check any of the input field is empty or 0
    const baseElements = document.querySelectorAll("input:not(.attribute), select");
    for (let i = 0; i < baseElements.length; i++) {
        if (baseElements[i].value === "") {
            alert("Please, submit required data");
            return false;
        }else if(Number(baseElements[i].value) <= 0){
            alert("Please, provide the data of indicated type");
            return false;
        }
    }

    const productType = document.getElementById("productType").value;
    if (productType) {
        const typeElements = document.querySelectorAll(`.${productType} input`);
        for (let i = 0; i < typeElements.length; i++) {
            if (Number(typeElements[i].value) <= 0) {
                alert("Please, provide the data of indicated type");
                return false;
            }else if(typeElements[i].value === ""){
                alert("Please, submit required data");
                return false;
            }
        }
    }

    return true;
}

//check any product is selected to delete
function checkProductSelected() {
    //get all checkboxes
    const checkboxes = document.querySelectorAll("input[type=checkbox]");
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            return true;
        }
    }

    alert("No product selected");
    return false;
}