

async function  loadCategoryData(button) {
    var categoryId = button.getAttribute('data-id');  
    var xhr = new XMLHttpRequest();                  

    
    xhr.open('GET', '../controllers/categorieController.php?id=' + categoryId, true);

   
    xhr.onload = function() {
        if (xhr.status === 200) { 
            console.log(xhr.responseText)
            var category = JSON.parse(xhr.responseText); 
            document.getElementById('category_modal').value = category.name_categorie; 
            document.getElementById('category_id').value = category.id_categorie;      

        } else {
            alert('Error loading category data.');
        }
    };

    xhr.send();  


    // try {
    //     const response = await fetch(`../controllers/categorieController.php?id=${categoryId}`);
    //     const responseData = await response.json();
    //     console.log(responseData);
        
    //     document.getElementById('category_modal').value = responseData.name_categorie; 
    //     document.getElementById('category_id').value = responseData.id_categorie;      
    // } catch (error) {
    //     alert('Error loading category data.');
    // }
    



}
